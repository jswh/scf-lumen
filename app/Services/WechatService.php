<?php

namespace App\Services;

use EasyWeChat\Factory;
use Illuminate\Support\Facades\Config;

class WechatService
{
    /**
     * @return \EasyWeChat\MiniProgram\Application
     */
    public static function mp($name = 'default')
    {
        return Factory::miniProgram(Config::get('app.wechat.mini_program.' . $name, []));
    }
}
