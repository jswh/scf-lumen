<?php

namespace App\Http\Controllers\ApiControllers;

use App\Exceptions\HttpException;
use App\Http\Controllers\ResourceController;
use App\Models\User;
use App\Services\WechatService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class Http\Controllers\ApiControllers
 * @author jswh
 */
class UserController extends ResourceController
{
    public function model(): Model
    {
        return new User;
    }

    public function show($id, Request $request) {
        $user = $id === 'me' ? $request->user() : User::find($id);

        return $user;
    }

    public function update($id, Request $request) {
        $user = $id === 'me' ? $request->user() : User::find($id);
        throw_if(!$user, new HttpException(404, 'user not exist'));
        //$method = $request->input('method');
        $userInfo = $request->input('user_info', []);
        $userInfo = array_merge($this->parseWxInfo($user, $request), $userInfo);
        $user->phone = $userInfo['phoneNumber'];
        $user->name = $userInfo['nickName'];
        $user->avatar = $userInfo['avatarUrl'];
        $user->save();

        return $user;

    }

    protected function parseWxInfo(User $user, Request $request) {
        $iv = $request->input('iv');
        $data = $request->input('encrypted_data');
        if ($iv && $data) {
            try {
                return WechatService::mp()->encryptor->decryptData($user->getMpSessionKey(), $iv, $data);
            } catch(\Throwable $e) {
                return [];
                //TODO log only
            }
        }
    }
}
