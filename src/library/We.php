<?php

namespace WeChat\library;

use WeChat\UrlConfig;

/**
 * We分析
 */
class  We

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }


    /**
     * Remark:查询登陆配置
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:19
     * Name: weDataGetLoginConfig
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用component_access_token
     * @return mixed
     */
    public function weDataGetLoginConfig($access_token)
    {
        return $this->curl->post(UrlConfig::qrCodeJumpGet . $access_token, json_encode(["access_token" => $access_token]));
    }

    /**
     * Remark:设置登录配置
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:19
     * Name: weDataSetLoginConfig
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用component_access_token
     * @param $set_type :1: 配置反查地址 ; 2:配置关联appid
     * @param string $recheck_url :反查地址，set_type =1时生效，若为空表示删除
     * @param array $associate_appid :关联appid，set_type=2时生效，若为空表示删除
     * @return mixed
     */
    public function weDataSetLoginConfig($access_token, $set_type, $recheck_url = '', $associate_appid = [])
    {
        return $this->curl->post(UrlConfig::weDataSetLoginConfig . $access_token, json_encode(["access_token" => $access_token, 'set_type' => $set_type, 'recheck_url' => $recheck_url, 'associate_appid' => $associate_appid]));
    }

    /**
     * Remark:获取商家We分析权限集列表
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:22
     * Name: weDataGetPermList
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用authorizer_access_token
     * @return mixed
     */
    public function weDataGetPermList($access_token)
    {
        return $this->curl->post(UrlConfig::weDataGetPermList . $access_token, json_encode(["access_token" => $access_token]));
    }

    /**
     * Remark:设置用户We分析权限集
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:23
     * Name: weDataSetUserPerm
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用authorizer_access_token
     * @param $uid :用户在服务商系统的唯一标识，可以是手机号、邮箱、员工编号等等
     * @param array $perm :权限集
     * @url: https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/we-analysis/weDataSetUserPerm.html
     * @return mixed
     */
    public function weDataSetUserPerm($access_token, $uid, $perm = [])
    {
        return $this->curl->post(UrlConfig::weDataSetUserPerm . $access_token, json_encode(["access_token" => $access_token, "uid" => $uid, "perm" => $perm]));
    }

    /**
     * Remark:查询用户绑定列表
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:55
     * Name: weDataQueryBindList
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用authorizer_access_token
     * @return mixed
     */
    public function weDataQueryBindList($access_token)
    {
        return $this->curl->post(UrlConfig::weDataQueryBindList . $access_token);
    }

    /**
     * Remark:用户解绑
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:56
     * Name: weDataUnbindUser
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用authorizer_access_token
     * @param $uid :户在服务商系统的唯一标识，可以是手机号、邮箱、员工ID 等等
     * @return mixed
     */
    public function weDataUnbindUser($access_token, $uid)
    {
        return $this->curl->post(UrlConfig::weDataUnbindUser . $access_token, json_encode(["access_token" => $access_token, "uid" => $uid]));
    }

    /**
     * Remark:用户PC端登录
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 15:56
     * Name: weDataLogin
     * @param $access_token :接口调用凭证，该参数为 URL 参数，非 Body 参数。使用authorizer_access_token
     * @param $user_session :服务商session，用户访问服务商系统的session
     * @param $uid :用户在服务商系统的唯一标识，可以是手机号、邮箱、员工ID等等
     * @param $client_ip :用户的外网ip
     * @param $user_agent :用户的user_agen
     * @return mixed
     */
    public function weDataLogin($access_token, $user_session, $uid, $client_ip, $user_agent)
    {
        return $this->curl->post(UrlConfig::weDataLogin . $access_token, json_encode(["access_token" => $access_token, "user_session" => $user_session, "uid" => $uid, "client_ip" => $client_ip, "user_agent" => $user_agent]));
    }

}