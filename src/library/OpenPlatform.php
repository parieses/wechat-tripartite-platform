<?php

namespace WeChat\library;


use WeChat\UrlConfig;

/**
 * 开放平台
 * Class OpenPlatform
 * @package WeChat\library
 */
class OpenPlatform
{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 创建开放平台帐号并绑定公众号/小程序
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:create
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 16:47
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $appid        :授权公众号或小程序的 appid
     * @return mixed
     */
    public function create($access_token, $appid)
    {
        return $this->curl->post(
            UrlConfig::create . $access_token,
            json_encode(['appid' => $appid])
        );
    }

    /**
     * 将公众号/小程序绑定到开放平台帐号下
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:bind
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 16:47
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $appid        :授权公众号或小程序的 appid
     * @param $open_appid   :开放平台帐号 appid，由创建开发平台帐号接口返回
     * @return mixed
     */
    public function bind($access_token, $appid, $open_appid)
    {
        return $this->curl->post(
            UrlConfig::create . $access_token,
            json_encode(['appid' => $appid, 'open_appid' => $open_appid])
        );
    }

    /**
     * 将公众号/小程序从开放平台帐号下解绑
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:unbind
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 16:48
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $appid        :授权公众号或小程序的 appid
     * @param $open_appid   :开放平台帐号 appid，由创建开发平台帐号接口返回
     * @return mixed
     */
    public function unbind($access_token, $appid, $open_appid)
    {
        return $this->curl->post(
            UrlConfig::unbind . $access_token,
            json_encode(['appid' => $appid, 'open_appid' => $open_appid])
        );
    }

    /**
     * 获取公众号/小程序所绑定的开放平台帐号
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:get
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 16:48
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $appid        :授权公众号或小程序的 appid
     * @return mixed
     */
    public function get($access_token, $appid)
    {
        return $this->curl->post(
            UrlConfig::get . $access_token,
            json_encode(['appid' => $appid])
        );
    }
}