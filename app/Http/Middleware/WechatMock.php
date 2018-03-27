<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Overtrue\Socialite\User as SocialiteUser;

class WechatMock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (env('APP_ENV') === 'local') {
            $user = new SocialiteUser([
                'openid' => 'odh7zsgI75iT8FRh0fGlSojc9PWM',
                // 以下字段为 scope 为 snsapi_userinfo 时需要
                'nickname' => 'overtrue',
                'sex' => '1',
                'province' => '北京',
                'city' => '北京',
                'country' => '中国',
                'headimgurl' => 'http://wx.qlogo.cn/mmopen/C2rEUskXQiblFYMUl9O0G05Q6pKibg7V1WpHX6CIQaic824apriabJw4r6EWxziaSt5BATrlbx1GVzwW2qjUCqtYpDvIJLjKgP1ug/0',
                'unionid' => 'o6_bmasdasdsad6_2sgVt7hMZOPfL',

                //mini program登录返回信息
                'session_key' => 'wechat_session_key',
            ]);

            $miniProgramAuthCode = md5($user->openid . Carbon::today()->timestamp);
            $request->merge(['auth_code' => $miniProgramAuthCode]);
            session([$miniProgramAuthCode => $user]);           //mini_program登录码
            session(['wechat.oauth_user.default' => $user]);    //公众号授权登录
        }

        return $next($request);
    }
}
