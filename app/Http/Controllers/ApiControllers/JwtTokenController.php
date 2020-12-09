<?php

namespace App\Http\Controllers\ApiControllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WechatService;
use Illuminate\Http\Request;

class JwtTokenController extends Controller
{
    /**
     * get token

     * @input string method optional The method to fetch generate token, default to wx_session.
     * @input string code   optional If method is wx_session, this is required.
     *
     * @response success {"access_token": str, "user": $ref\User}
     */
    public function create(Request $request)
    {
        //no need to check method now
        $code = $request->input('code');
        $mp = WechatService::mp();
        $session = $code === 'mock' ? ['openid' => 'mock', 'session_key' => 'mock'] : $mp->auth->session($code);
        $user = User::fetchByWechatSession($session);

        $token = $user->getRememberToken();

        return response()->json([
            'access_token' => $token,
            'user' => $user
        ]);
    }
}
