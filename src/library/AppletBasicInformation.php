<?php

namespace WeChat\library;

use WeChat\UrlConfig;

/**
 * Class AppletBasicInformation
 * @package WeChat\library
 */
class  AppletBasicInformation

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 获取基本信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getAccountBasicInfo
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 16:34
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台调用口令authorizer_access_token
     * @return mixed
     */
    public function getAccountBasicInfo($access_token)
    {
        return $this->curl->get(UrlConfig::getAccountBasicInfo . $access_token);
    }

    /**
     * 设置服务器域名
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:modifyDomain
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 16:46
     * Email:1695699447@qq.com
     * @param       $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param       $action :[add|delete|set|get]
     * @param array $requestdomain :request 合法域名；当 action 是 get 时不需要此字段
     * @param array $wsrequestdomain :socket 合法域名；当 action 是 get 时不需要此字段
     * @param array $uploaddomain :uploadFile 合法域名；当 action 是 get 时不需要此字段
     * @param array $downloaddomain :downloadFile 合法域名；当 action 是 get 时不需要此字段
     * @return mixed
     */
    public function modifyDomain($access_token, $action, $requestdomain = [], $wsrequestdomain = [], $uploaddomain = [], $downloaddomain = [])
    {
        return $this->curl->post(
            UrlConfig::modifyDomain . $access_token,
            json_encode(
                [
                    'action' => $action,
                    'requestdomain' => $requestdomain,
                    'wsrequestdomain' => $wsrequestdomain,
                    'uploaddomain' => $uploaddomain,
                    'downloaddomain' => $downloaddomain
                ]
            )
        );
    }

    /**
     * 设置业务域名
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:setWebViewDomain
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 16:48
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $action :操作类型，如果没有指定 action，则默认将第三方平台登记的小程序业务域名全部添加到该小程序[add|delete|set|get]
     * @param $webviewdomain :小程序业务域名，当 action 参数是 get 时不需要此字段
     * @return mixed
     */
    public function setWebViewDomain($access_token, $action, $webviewdomain)
    {
        return $this->curl->post(
            UrlConfig::setWebViewDomain . $access_token,
            json_encode(
                [
                    'action' => $action,
                    'webviewdomain' => $webviewdomain
                ]
            )
        );
    }

    /**
     * 设置名称
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:setNickname
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 16:53
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $nick_name :昵称，不支持包含“小程序”关键字的昵称
     * @param $id_card :身份证照片 mediaid
     * @param $license :组织机构代码证或营业执照 mediaid
     * @param $naming_other_stuff_1 :其他证明材料 mediaid
     * @param $naming_other_stuff_2 :其他证明材料 mediaid
     * @param $naming_other_stuff_3 :其他证明材料 mediaid
     * @param $naming_other_stuff_4 :其他证明材料 mediaid
     * @param $naming_other_stuff_5 :其他证明材料 mediaid
     * @return mixed
     */
    public function setNickname($access_token, $nick_name, $id_card, $license, $naming_other_stuff_1, $naming_other_stuff_2, $naming_other_stuff_3, $naming_other_stuff_4, $naming_other_stuff_5)
    {
        return $this->curl->post(
            UrlConfig::setNickname . $access_token,
            json_encode(
                [
                    'nick_name' => $nick_name,
                    'id_card' => $id_card,
                    'license' => $license,
                    'naming_other_stuff_1' => $naming_other_stuff_1,
                    'naming_other_stuff_2' => $naming_other_stuff_2,
                    'naming_other_stuff_3' => $naming_other_stuff_3,
                    'naming_other_stuff_4' => $naming_other_stuff_4,
                    'naming_other_stuff_5' => $naming_other_stuff_5
                ]
            )
        );
    }

    /**
     * 微信认证名称检测
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:checkWxVerifyNickname
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 16:56
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @param $nick_name :名称（昵称）
     * @return mixed
     */
    public function checkWxVerifyNickname($access_token, $nick_name)
    {
		return $this->curl->post(UrlConfig::checkWxVerifyNickname . $access_token, json_encode(['nick_name' => $nick_name],JSON_UNESCAPED_UNICODE));
	}

    /**
     * 查询改名审核状态
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:apiWxaQueryNickname
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 16:58
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $audit_id :审核单 id，由设置名称接口返回
     * @return mixed
     */
    public function apiWxaQueryNickname($access_token, $audit_id)
    {
        return $this->curl->post(UrlConfig::apiWxaQueryNickname . $access_token, json_encode(['audit_id' => $audit_id,]));
    }

    /**
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:modifyHeadImage
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 17:00
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $head_img_media_id :头像素材 media_id
     * @param $x1 :裁剪框左上角 x 坐标（取值范围：[0, 1]）
     * @param $y1 :裁剪框左上角 y 坐标（取值范围：[0, 1]）
     * @param $x2 :裁剪框右下角 x 坐标（取值范围：[0, 1]）
     * @param $y2 :裁剪框右下角 y 坐标（取值范围：[0, 1]）
     * @return mixed
     */
    public function modifyHeadImage($access_token, $head_img_media_id, $x1, $y1, $x2, $y2)
    {
        return $this->curl->post(
            UrlConfig::modifyHeadImage . $access_token,
            json_encode(
                [
                    'head_img_media_id' => $head_img_media_id,
                    'x1' => $x1,
                    'y1' => $y1,
                    'x2' => $x2,
                    'y2' => $y2,
                ]
            )
        );
    }

    /**
     * 修改功能介绍
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:modifySignature
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 17:03
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $signature :功能介绍（简介）
     * @return mixed
     */
    public function modifySignature($access_token, $signature)
    {
        return $this->curl->post(UrlConfig::modifySignature . $access_token, json_encode(['signature' => $signature], JSON_UNESCAPED_UNICODE));
    }

    /**
     * 查询隐私设置
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getWxaSearchStatus
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 17:04
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function getWxaSearchStatus($access_token)
    {
        return $this->curl->get(UrlConfig::getWxaSearchStatus . $access_token);
    }

    /**
     * 修改隐私设置
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:changeWxaSearchStatus
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 17:05
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $status :1 表示不可搜索，0 表示可搜索
     * @return mixed
     */
    public function changeWxaSearchStatus($access_token, $status)
    {
        return $this->curl->post(UrlConfig::changeWxaSearchStatus . $access_token, json_encode(['status' => $status,]));
    }

    /**
     * 获取数据拉取配置|设置预拉取数据|设置周期性拉取数据
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:fetchDataSetting
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 17:11
     * Email:1695699447@qq.com
     * @param      $access_token :第三方平台令牌 authorizer_access_token
     * @param      $action :get|set_pre_fetch|set_period_fetch
     * @param null $is_pre_fetch_open :周期性拉取数据是否开启，true开启，false关闭
     * @param null $pre_fetch_type :数据来源，0: 开发者服务器；1：云函数
     * @param null $pre_fetch_url :数据下载地址，当period_fetch_type=0必填1、需要将域名先添加到第三方平台的业务域名；2、然后将该域名添加到小程序业务域名；才可以成功设置
     * @param null $pre_env :环境ID，当period_fetch_type=1必填
     * @param null $pre_function_name :函数名，当period_fetch_type=1必填
     * @return mixed
     */
    public function fetchDataSetting($access_token, $action, $is_pre_fetch_open = null, $pre_fetch_type = null, $pre_fetch_url = null, $pre_env = null, $pre_function_name = null)
    {
        return $this->curl->post(
            UrlConfig::fetchDataSetting . $access_token,
            json_encode(
                [
                    'action' => $action,
                    'is_pre_fetch_open' => $is_pre_fetch_open,
                    'pre_fetch_type' => $pre_fetch_type,
                    'pre_fetch_url' => $pre_fetch_url,
                    'pre_env' => $pre_env,
                    'pre_function_name' => $pre_function_name,
                ]
            )
        );
    }
}