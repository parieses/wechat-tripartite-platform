<?php

namespace WeChat\library;

use WeChat\UrlConfig;


class  OpenApi

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 清空api的调用quota
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:clearQuota
     * status:
     * User: Mr.liang
     * Date: 2021/11/19
     * Time: 14:22
     * Email:1695699447@qq.com
     * @url:https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/clear_quota.html
     * @param $access_token :依据需要查询的接口属于的账号类型不同而使用不同的token，详情查看注上述注意事项
     * @param $appid        :要被清空的账号的appid
     * @return mixed
     */
    public function clearQuota($access_token, $appid)
    {
        return $this->curl->post(
            UrlConfig::clearQuota . $access_token,
            json_encode(['appid' => $appid])
        );
    }

    /**
     * 查询openAPI调用quota
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getQuota
     * status:
     * User: Mr.liang
     * Date: 2021/11/19
     * Time: 14:23
     * Email:1695699447@qq.com
     * @param $access_token:依据需要查询的接口属于的账号类型不同而使用不同的token，详情查看注上述注意事项
     * @param $cgi_path:api的请求地址，例如"/cgi-bin/message/custom/send";不要前缀“https://api.weixin.qq.com” ，也不要漏了"/",否则都会76003的报错
     * @return mixed
     */
    public function getQuota($access_token, $cgi_path)
    {
        return $this->curl->post(
            UrlConfig::getQuota . $access_token,
            json_encode(['cgi_path' => $cgi_path])
        );
    }

    /**
     * 查询rid信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getRid
     * status:
     * User: Mr.liang
     * Date: 2021/11/19
     * Time: 14:26
     * Email:1695699447@qq.com
     * @param $access_token
     * @param $rid
     * @return mixed
     */
    public function getRid($access_token, $rid){
        return $this->curl->post(
            UrlConfig::getRid . $access_token,
            json_encode(['rid' => $rid])
        );
    }

}