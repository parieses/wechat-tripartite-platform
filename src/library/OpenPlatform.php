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
     * @param $appid :授权公众号或小程序的 appid
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
     * @param $appid :授权公众号或小程序的 appid
     * @param $open_appid :开放平台帐号 appid，由创建开发平台帐号接口返回
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
     * @param $appid :授权公众号或小程序的 appid
     * @param $open_appid :开放平台帐号 appid，由创建开发平台帐号接口返回
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
     * @param $appid :授权公众号或小程序的 appid
     * @return mixed
     */
    public function get($access_token, $appid)
    {
        return $this->curl->post(
            UrlConfig::get . $access_token,
            json_encode(['appid' => $appid])
        );
    }

    /**
     * Remark:设置第三方平台服务器域名
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/6 16:04
     * Name: modifyThirdpartyServerDomain
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用component_access_token
     * @param $action :[add|delete|set|get]
     * @param string $wxa_server_domain :最多可以添加1000个服务器域名，以;隔开。注意：域名不需带有http:// 等协议内容，也不能在域名末尾附加详细的 URI 地址，严格按照类似 www.qq.com 的写法。
     * @param false $is_modify_published_together :是否同时修改“全网发布版本的值”。（false：只改“测试版”；true：同时改“测试版”和“全网发布版”）省略时，默认为false。
     * @return mixed
     */
    public function modifyThirdpartyServerDomain($access_token, $action, $wxa_server_domain = '', $is_modify_published_together = false)
    {
        return $this->curl->post(
            UrlConfig::modifyThirdpartyServerDomain . $access_token,
            json_encode(['action' => $action, 'wxa_server_domain' => $wxa_server_domain, 'is_modify_published_together' => $is_modify_published_together])
        );
    }

    /**
     * Remark:获取第三方平台业务域名校验文件
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/6 16:06
     * Name: getThirdpartyJumpDomainConfirmFile
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用component_access_token
     * @return mixed
     */
    public function getThirdpartyJumpDomainConfirmFile($access_token)
    {
        return $this->curl->post(
            UrlConfig::getThirdpartyJumpDomainConfirmFile . $access_token
        );
    }

    /**
     * Remark:设置第三方平台业务域名
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/6 16:07
     * Name: modifyThirdpartyJumpDomain
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用component_access_token
     * @param $action :[add|delete|set|get]
     * @param string $wxa_jump_h5_domain :最多可以添加200个小程序业务域名，以;隔开。注意：域名不需带有http:// 等协议内容，也不能在域名末尾附加详细的 URI 地址，严格按照类似 www.qq.com 的写法。
     * @param false $is_modify_published_together :是否同时修改“全网发布版本的值”。（false：只改“测试版”；true：同时改“测试版”和“全网发布版”）省略时，默认为false。
     * @return mixed
     */
    public function modifyThirdpartyJumpDomain($access_token, $action, $wxa_jump_h5_domain = '', $is_modify_published_together = false)
    {
        return $this->curl->post(
            UrlConfig::modifyThirdpartyJumpDomain . $access_token,
            json_encode(['action' => $action, 'wxa_jump_h5_domain' => $wxa_jump_h5_domain, 'is_modify_published_together' => $is_modify_published_together])
        );
    }
}