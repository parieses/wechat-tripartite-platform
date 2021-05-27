<?php

namespace WeChat\library;

use Curl\Curl;
use DOMDocument;
use WeChat\UrlConfig;


/**
 * Class ConcernComponent
 * @package WeChat\library
 */
class  ConcernComponent

{
    use Initialize;

    /**
     * ConcernComponent constructor.
     */
    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 获取展示的公众号信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getShowWxaItem
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 9:39
     * Email:1695699447@qq.com
     * @param $access_token :小程序接口调用令牌
     * @return mixed
     */
    public function getShowWxaItem($access_token)
    {
        return $this->curl->get(UrlConfig::getShowWxaItem . $access_token);
    }

    /**
     * 获取可以用来设置的公众号列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getWxaMpLinkForShow
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 9:40
     * Email:1695699447@qq.com
     * @param $access_token :小程序接口调用令牌
     * @param $page         :
     * @param $num          :页码，从 0 开始
     * @return mixed:每页记录数，最大为 20
     */
    public function getWxaMpLinkForShow($access_token, $page, $num)
    {
        return $this->curl->get(UrlConfig::getWxaMpLinkForShow . $access_token . '&page=' . $page . '&num=' . $num);
    }

    /**
     * 设置展示的公众号信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:updateShowWxaItem
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 9:40
     * Email:1695699447@qq.com
     * @param $access_token           :小程序接口调用令牌
     * @param $wxa_subscribe_biz_flag :是否打开扫码关注组件，0 关闭，1 开启
     * @param $appid                  :如果开启，需要传新的公众号 appid
     * @return mixed
     */
    public function updateShowWxaItem($access_token, $wxa_subscribe_biz_flag, $appid)
    {
        return $this->curl->post(
            UrlConfig::updateShowWxaItem . $access_token,
            json_encode(
                [
                    'wxa_subscribe_biz_flag' => $wxa_subscribe_biz_flag,
                    'appid' => $appid
                ]
            )
        );
    }

}