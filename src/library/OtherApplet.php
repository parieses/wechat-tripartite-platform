<?php

namespace WeChat\library;

use Curl\Curl;
use DOMDocument;
use WeChat\UrlConfig;


class  OtherApplet

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 小程序登录
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:jsCode2session
     * status:
     * User: Mr.liang
     * Date: 2021/6/10
     * Time: 19:40
     * Email:1695699447@qq.com
     * @param $appid                  :小程序的 AppID
     * @param $js_code                :wx.login 获取的 code
     * @param $component_appid        :第三方平台 appid
     * @param $component_access_token :第三方平台的component_access_token
     * @return mixed
     */
    public function jsCode2session($appid, $js_code, $component_appid, $component_access_token)
    {
        $url = sprintf(UrlConfig::jsCode2session, $appid, $js_code, $component_appid, $component_access_token);
        return $this->curl->get($url);
    }

    /**
     * 支付后获取用户 Unionid 接口 微信订单号
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getPaidUnionIdOne
     * status:
     * User: Mr.liang
     * Date: 2021/6/10
     * Time: 19:48
     * Email:1695699447@qq.com
     * @param $access_token   :第三方平台接口调用令牌authorizer_access_token
     * @param $openid         :支付用户唯一标识
     * @param $transaction_id :微信订单号
     * @return mixed
     */
    public function getPaidUnionIdOne($access_token, $openid, $transaction_id)
    {
        $url = sprintf(UrlConfig::getPaidUnionIdOne, $access_token, $openid, $transaction_id);
        return $this->curl->get($url);
    }

    /**
     * 支付后获取用户 Unionid 接口 商户订单号
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getPaidUnionIdTwo
     * status:
     * User: Mr.liang
     * Date: 2021/6/10
     * Time: 19:50
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $openid       :支付用户唯一标识
     * @param $mch_id       :商户号，和商户订单号配合使用
     * @param $out_trade_no :商户订单号，和商户号配合使用
     * @return mixed
     */
    public function getPaidUnionIdTwo($access_token, $openid, $mch_id, $out_trade_no)
    {
        $url = sprintf(UrlConfig::getPaidUnionIdTwo, $access_token, $openid, $mch_id, $out_trade_no);
        return $this->curl->get($url);
    }

    /**
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:generateUrlLink
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 9:57
     * Email:1695699447@qq.com
     * @param      $access_token    :接口调用凭证
     * @param      $path            :通过 URL Link 进入的小程序页面路径，必须是已经发布的小程序存在的页面，不可携带 query 。path 为空时会跳转小程序主页
     * @param      $query           :通过 URL Link 进入小程序时的query，最大1024个字符，只支持数字，大小写英文以及部分特殊字符：!#$&'()*+,/:;=?@-._~
     * @param      $expire_type     :小程序 URL Link 失效类型，失效时间：0，失效间隔天数：1
     * @param      $expire_time     :到期失效的 URL Link 的失效时间，为 Unix 时间戳。生成的到期失效 URL Link 在该时间前有效。最长有效期为1年。expire_type 为 0 必填
     * @param      $expire_interval :    到期失效的URL Link的失效间隔天数。生成的到期失效URL Link在该间隔时间到达前有效。最长间隔天数为365天。expire_type 为 1 必填
     * @param bool $is_expire       :生成的 URL Link 类型，到期失效：true，永久有效：false
     * @param null $cloud_base      :云开发静态网站自定义 H5 配置参数，可配置中转的云开发 H5 页面。不填默认用官方 H5 页面
     * @return mixed
     */
    public function generateUrlLink($access_token, $path, $query, $expire_type, $expire_time, $expire_interval, $is_expire = true, $cloud_base = null)
    {
        return $this->curl->post(
            UrlConfig::generateUrlLink . $access_token,
            json_encode(
                [
                    'path' => $path,
                    'query' => $query,
                    'is_expire' => $is_expire,
                    'expire_type' => $expire_type,
                    'expire_time' => $expire_time,
                    'expire_interval' => $expire_interval,
                    'cloud_base' => $cloud_base
                ]
            )
        );
    }

    /**
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:generateScheme
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:06
     * Email:1695699447@qq.com
     * @param      $access_token :接口调用凭证
     * @param null $jump_wxa     :    跳转到的目标小程序信息。
     * @param bool $is_expire    :生成的 scheme 码类型，到期失效：true，永久有效：false。
     * @param null $expire_time  :    到期失效的 scheme 码的失效时间，为 Unix 时间戳。生成的到期失效 scheme 码在该时间前有效。最长有效期为1年。生成到期失效的scheme时必填。
     * @return mixed
     */
    public function generateScheme($access_token, $jump_wxa = null, $is_expire = false, $expire_time = null)
    {
        return $this->curl->post(
            UrlConfig::generateScheme . $access_token,
            json_encode(['jump_wxa' => $jump_wxa, 'is_expire' => $is_expire, 'expire_time' => $expire_time])
        );
    }

    /**
     * 获取当前帐号所设置的类目信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:subscribeMessageGetCategory
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:17
     * Email:1695699447@qq.com
     * @param $access_token :接口调用凭证
     * @return mixed
     */
    public function subscribeMessageGetCategory($access_token)
    {
        return $this->curl->get(UrlConfig::subscribeMessageGetCategory . $access_token);
    }

    /**
     * 获取模板标题列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getPubTemplateTitles
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:24
     * Email:1695699447@qq.com
     * @param     $access_token :接口调用凭证
     * @param     $ids          :类目 id，多个用逗号隔开
     * @param int $start        :    用于分页，表示从 start 开始。从 0 开始计数。
     * @param int $limit        :用于分页，表示拉取 limit 条记录。最大为 30。
     * @return mixed
     */
    public function getPubTemplateTitles($access_token, $ids, $start = 0, $limit = 30)
    {
        $url = sprintf(UrlConfig::getPubTemplateTitles, $access_token, $ids, $start, $limit);
        return $this->curl->get($url);
    }

    /**
     * 获取模板标题下的关键词库
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getPubTemplateKeywords
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:33
     * Email:1695699447@qq.com
     * @param $access_token :接口调用凭证
     * @param $tid          :模板标题 id，可通过接口获取
     * @return mixed
     */
    public function getPubTemplateKeywords($access_token, $tid)
    {
        $url = sprintf(UrlConfig::getPubTemplateKeywords, $access_token, $tid);
        return $this->curl->get($url);
    }

    /**
     * 组合模板并添加到个人模板库
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:addTemplate
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:37
     * Email:1695699447@qq.com
     * @param $access_token :接口调用凭证
     * @param $tid          :模板标题 id，可通过接口获取，也可登录小程序后台查看获取
     * @param $kidList      :开发者自行组合好的模板关键词列表，关键词顺序可以自由搭配（例如 [3,5,4] 或 [4,5,3]），最多支持5个，最少2个关键词组合
     * @param $sceneDesc    :服务场景描述，15个字以内
     * @return mixed
     */
    public function addTemplate($access_token, $tid, $kidList, $sceneDesc)
    {
        return $this->curl->post(
            UrlConfig::addTemplate . $access_token,
            json_encode(['tid' => $tid, 'kidList' => $kidList, 'sceneDesc' => $sceneDesc])
        );
    }

    /**
     * 获取帐号下的模板列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getTemplate
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:40
     * Email:1695699447@qq.com
     * @param $access_token :接口调用凭证
     * @return mixed
     */
    public function getTemplate($access_token)
    {
        return $this->curl->get(UrlConfig::getTemplate . $access_token);
    }

    /**
     * 删除帐号下的某个模板
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:delTemplate
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:52
     * Email:1695699447@qq.com
     * @param $access_token :接口调用凭证
     * @param $priTmplId    :要删除的模板id
     * @return mixed
     */
    public function delTemplate($access_token, $priTmplId)
    {
        return $this->curl->post(
            UrlConfig::delTemplate . $access_token,
            json_encode(['priTmplId' => $priTmplId])
        );
    }

    /**
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:send
     * status:
     * User: Mr.liang
     * Date: 2021/6/11
     * Time: 10:56
     * Email:1695699447@qq.com
     * @param        $access_token      :接口调用凭证
     * @param        $touser            :    接收者（用户）的 openid
     * @param        $template_id       :所需下发的订阅模板id
     * @param        $data              :    模板内容，格式形如 { "key1": { "value": any }, "key2": { "value": any } }
     * @param string $page              :点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数,（示例index?foo=bar）。该字段不填则模板无跳转。
     * @param string $miniprogram_state :跳转小程序类型：developer为开发版；trial为体验版；formal为正式版；默认为正式版
     * @param string $lang              :进入小程序查看”的语言类型，支持zh_CN(简体中文)、en_US(英文)、zh_HK(繁体中文)、zh_TW(繁体中文)，默认为zh_CN
     * @return mixed
     */
    public function send($access_token, $touser, $template_id, $data, $page = '', $miniprogram_state = 'developer', $lang = 'zh_CN')
    {
        return $this->curl->post(
            UrlConfig::send . $access_token,
            json_encode(['touser' => $touser, 'template_id' => $template_id, 'data' => $data, 'page' => $page, 'miniprogram_state' => $miniprogram_state, 'lang' => $lang])
        );
    }
}