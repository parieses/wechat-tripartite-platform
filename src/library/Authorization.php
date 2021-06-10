<?php

namespace WeChat\library;

use Curl\Curl;
use DOMDocument;
use WeChat\UrlConfig;

/**
 * 授权
 * Class Authorization
 * @package WeChat\library
 */
class Authorization
{
    use Initialize;
    //第三方平台 appid
    private $componentAppId;
    //第三方平台 appsecret
    private $componentAppSecret;
    //消息校验Token
    private $token;
    //消息加解密Key
    private $encodingAesKey;

    /**
     * Authorization constructor.
     * @param $componentAppId
     * @param $componentAppSecret
     * @param $token
     * @param $encodingAesKey
     */
    public function __construct($componentAppId, $componentAppSecret, $token, $encodingAesKey)
    {
        $this->componentAppId = $componentAppId;
        $this->componentAppSecret = $componentAppSecret;
        $this->token = $token;
        $this->encodingAesKey = $encodingAesKey;
        $this->initializeCurl();
    }

    /**
     * 授权事件接收
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:getAuthorizationEvents
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 9:20
     * Email:1695699447@qq.com
     * @param $msg_signature :微信推送获取的验证串
     * @param $timestamp     :微信推送获取的时间戳
     * @param $nonce         :微信推送获取的随机数
     * @param $encryptMsg    :微信推送获取的加密xml
     * @return bool|string|string[]|null
     */
    public function getAuthorizationEvents($msg_signature, $timestamp, $nonce, $encryptMsg)
    {
        $message = $this->getDecryptMsg($msg_signature, $timestamp, $nonce, $encryptMsg);
        if ($message !== false) {
            $xml = new DOMDocument();
            $xml->loadXML($message);
            $infoType = $xml->getElementsByTagName('InfoType')->item(0)->nodeValue;
            $data = ['type' => $infoType];
            switch ($infoType) {
                case "component_verify_ticket":
                    $componentVerifyTicket = $xml->getElementsByTagName('ComponentVerifyTicket')->item(0)->nodeValue;
                    $component_verify_ticket = preg_replace("/ticket@@@/", "", $componentVerifyTicket);//处理解密后的字符串
                    $data['data'] = $component_verify_ticket;
                    break;
                default:
                    $data['data'] = $xml->getElementsByTagName('AuthorizerAppid')->item(0)->nodeValue;
                    break;
            }
            return $data;
        }
        return false;
    }

    /**
     * 启动ticket推送服务
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:apiStartPushTicket
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 10:29
     * Email:1695699447@qq.com
     * @return mixed
     */
    public function apiStartPushTicket()
    {
        return $this->curl->post(
            UrlConfig::apiStartPushTicket,
            json_encode(['component_appid' => $this->componentAppId, 'component_secret' => $this->componentAppSecret])
        );
    }

    /**
     * 获取令牌
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:getComponentAccessToken
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 9:21
     * Email:1695699447@qq.com
     * @param $component_verify_ticket :微信后台推送的 ticket
     * @return mixed
     */
    public function apiComponentToken($component_verify_ticket)
    {
        return $this->curl->post(
            UrlConfig::apiComponentToken,
            json_encode(['component_appid' => $this->componentAppId, 'component_appsecret' => $this->componentAppSecret, 'component_verify_ticket' => $component_verify_ticket])
        );
    }

    /**
     * 获取预授权码
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:getPreauthCode
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 14:04
     * Email:1695699447@qq.com
     * @param $component_access_token :第三方平台component_access_token，不是authorizer_access_token
     * @return mixed
     */
    public function apiCreatePreauthcode($component_access_token)
    {
        return $this->curl->post(
            UrlConfig::apiCreatePreauthcode . $component_access_token,
            json_encode(['component_appid' => $this->componentAppId])
        );
    }

    /**
     * 构建PC端授权链接的方法
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:componentLoginPage
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 14:30
     * Email:1695699447@qq.com
     * @param      $pre_auth_code :    预授权码
     * @param      $redirect_uri  :回调 URI
     * @param null $auth_type     :要授权的帐号类型：1 则商户点击链接后，手机端仅展示公众号、2 表示仅展示小程序，3 表示公众号和小程序都展示。如果为未指定，则默认小程序和公众号都展示。第三方平台开发者可以使用本字段来控制授权的帐号类型。
     * @param null $biz_appid     :指定授权唯一的小程序或公众号 和$auth_type 互斥
     * @return string
     */
    public function componentLoginPage($pre_auth_code, $redirect_uri, $auth_type = null, $biz_appid = null)
    {
        $data = ['component_appid' => $this->componentAppId, 'pre_auth_code' => $pre_auth_code, 'redirect_uri' => $redirect_uri, 'auth_type' => $auth_type, 'biz_appid' => $biz_appid];
        return UrlConfig::componentLoginPage . '?' . http_build_query($data);
    }

    /**
     * 构建移动端授权链接的方法
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:bindComponent
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 14:33
     * Email:1695699447@qq.com
     * @param      $pre_auth_code :    预授权码
     * @param      $redirect_uri  :回调 URI
     * @param null $auth_type     :要授权的帐号类型：1 则商户点击链接后，手机端仅展示公众号、2 表示仅展示小程序，3 表示公众号和小程序都展示。如果为未指定，则默认小程序和公众号都展示。第三方平台开发者可以使用本字段来控制授权的帐号类型。
     * @param null $biz_appid     :指定授权唯一的小程序或公众号 和$auth_type 互斥
     * @return string
     */
    public function bindComponent($pre_auth_code, $redirect_uri, $auth_type = null, $biz_appid = null)
    {
        $data = ['component_appid' => $this->componentAppId, 'pre_auth_code' => $pre_auth_code, 'redirect_uri' => $redirect_uri, 'auth_type' => $auth_type, 'biz_appid' => $biz_appid];
        return UrlConfig::bindComponent . '?' . http_build_query($data) . '#wechat_redirect';
    }

    /**
     * 使用授权码获取授权信息
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:usePreauthCode
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 11:57
     * Email:1695699447@qq.com
     * @param $component_access_token
     * @param $authorization_code
     * @return mixed
     */
    public function apiQueryAuth($component_access_token, $authorization_code)
    {
        return $this->curl->post(
            UrlConfig::apiQueryAuth . $component_access_token,
            json_encode(['component_appid' => $this->componentAppId, 'authorization_code' => $authorization_code])
        );
    }

    /**
     * 获取/刷新接口调用令牌
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:apiAuthorizerToken
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 15:23
     * Email:1695699447@qq.com
     * @param $component_access_token   :第三方平台component_access_token
     * @param $authorizer_appid         :授权方 appid
     * @param $authorizer_refresh_token :刷新令牌，获取授权信息时得到
     * @return mixed
     */
    public function apiAuthorizerToken($component_access_token, $authorizer_appid, $authorizer_refresh_token)
    {
        return $this->curl->post(
            UrlConfig::apiAuthorizerToken . $component_access_token,
            json_encode(['component_appid' => $this->componentAppId, 'authorizer_appid' => $authorizer_appid, 'authorizer_refresh_token' => $authorizer_refresh_token])
        );
    }

    /**
     * 获取授权方帐号信息
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:apiGetAuthorizerInfo
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 15:24
     * Email:1695699447@qq.com
     * @param $component_access_token :第三方平台component_access_token，不是authorizer_access_token
     * @param $authorizer_appid       :授权方 appid
     * @return mixed
     */
    public function apiGetAuthorizerInfo($component_access_token, $authorizer_appid)
    {
        return $this->curl->post(
            UrlConfig::apiGetAuthorizerInfo . $component_access_token,
            json_encode(['component_appid' => $this->componentAppId, 'authorizer_appid' => $authorizer_appid])
        );
    }

    /**
     * 拉取所有已授权的帐号信息
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:api_get_authorizer_list
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 15:24
     * Email:1695699447@qq.com
     * @param     $component_access_token :第三方平台component_access_token，不是authorizer_access_token
     * @param int $count                  :拉取数量，最大为 500
     * @param int $offset                 :偏移位置/起始位置
     * @return mixed
     */
    public function api_get_authorizer_list($component_access_token, $count = 10, $offset = 0)
    {
        return $this->curl->post(
            UrlConfig::api_get_authorizer_list . $component_access_token,
            json_encode(['offset' => $offset, 'component_appid' => $this->componentAppId, 'count' => $count])
        );
    }

    /**
     * 获取授权方选项信息
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:api_get_authorizer_option
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 15:24
     * Email:1695699447@qq.com
     * @param $component_access_token :第三方平台component_access_token，不是authorizer_access_token
     * @param $authorizer_appid       :授权公众号或小程序的 appid
     * @param $option_name            :option_name
     * @return mixed
     */
    public function api_get_authorizer_option($component_access_token, $authorizer_appid, $option_name)
    {
        return $this->curl->post(
            UrlConfig::api_get_authorizer_option . $component_access_token,
            json_encode(['component_appid' => $this->componentAppId, 'authorizer_appid' => $authorizer_appid, 'option_name' => $option_name])
        );
    }

    /**
     * 设置授权方选项信息
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:api_set_authorizer_option
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 15:25
     * Email:1695699447@qq.com
     * @param $component_access_token :第三方平台component_access_token，不是authorizer_access_token
     * @param $authorizer_appid       :    授权公众号或小程序的 appid
     * @param $option_name            :    选项名称
     * @param $option_value           :    设置的选项值
     * @return mixed
     */
    public function api_set_authorizer_option($component_access_token, $authorizer_appid, $option_name, $option_value)
    {
        return $this->curl->post(
            UrlConfig::api_set_authorizer_option . $component_access_token,
            json_encode(['component_appid' => $this->componentAppId, 'authorizer_appid' => $authorizer_appid, 'option_name' => $option_name, 'option_value' => $option_value])
        );
    }

    /**
     * 消息与事件接收
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getMessagesAndEvents
     * status:
     * User: Mr.liang
     * Date: 2021/6/10
     * Time: 11:19
     * Email:1695699447@qq.com
     * @param $msg_signature
     * @param $timestamp
     * @param $nonce
     * @param $encryptMsg
     * @return bool|string
     */
    public function getMessagesAndEvents($msg_signature, $timestamp, $nonce, $encryptMsg)
    {
        $message = $this->getDecryptMsg($msg_signature, $timestamp, $nonce, $encryptMsg);
        return $message;
    }

    private function getDecryptMsg($msg_signature, $timestamp, $nonce, $encryptMsg)
    {
        $pc = new wxBizMsgCrypt($this->token, $this->encodingAesKey, $this->componentAppId);
        $xml_tree = new DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        $encrypt = $array_e->item(0)->nodeValue;
        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);
        $message = '';
        $errCode = $pc->decryptMsg($msg_signature, $timestamp, $nonce, $from_xml, $message);
        return $errCode == 0 ? $message : false;
    }
}