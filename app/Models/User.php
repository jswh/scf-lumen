<?php

namespace App\Models;

use Firebase\JWT\JWT;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $display_name
 * @property string $city
 * @property string $open_id
 * @property string|null $avatar
 * @property string|null $union_id
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOpenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUnionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Model implements Authenticatable
{
    use SoftDeletes;

    public static function getByOpenId($openId)
    {
        return User::findOne(['open_id' => $openId]);
    }

    public static function fetchByWechatSession($session)
    {
        $openId = $session['openid'];
        $sessionKey = $session['session_key'];
        $user = User::where('open_id', $openId)->first();
        if (!$user) {
            $user = new User();
            $user->username = $sessionKey;
            $user->display_name = $sessionKey;
            $user->open_id = $openId;
            $user->city = '';
            $user->save();
        }
        $user->setMpSessionKey($sessionKey);

        return $user;
    }

    public static function getByJwt($jwt)
    {
        $jwtInfo = JWT::decode($jwt, env('JWT_SECRET'), ['HS256']);

        return User::find($jwtInfo->uid ?? null);
    }

    public function jwt()
    {
        $payload = array(
            "uid" => $this->id
        );
        return JWT::encode($payload, env('JWT_SECRET'));
    }

    protected $sessionKeyPre = 'wxs:';
    public function setMpSessionKey(string $sessionKey) : void
    {
        \Cache::put($this->sessionKeyPre . $this->id, $sessionKey);
    }

    public function getMpSessionKey() : string
    {
        return \Cache::get($this->sessionKeyPre . $this->id);
    }

    public function getAuthIdentifierName() {
        return 'id';
    }

    public function getAuthIdentifier() {
        return $this->id;
    }

    public function getAuthPassword() {
        throw new \Exception('no password implemention');
    }

    public function getRememberToken() {
        return $this->jwt();
    }

    public function setRememberToken($value) {
        throw new \Exception('jwt token implemention');
    }

    public function getRememberTokenName() {
        throw new \Exception('jwt token implemention');
    }
}
