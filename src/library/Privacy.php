<?php

namespace WeChat\library;

use CURLFile;
use Exception;
use WeChat\UrlConfig;


class  Privacy

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 配置小程序用户隐私保护指引
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:setPrivacySetting
     * status:
     * User: Mr.liang
     * Date: 2021/11/19
     * Time: 15:40
     * Email:1695699447@qq.com
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/privacy_config/set_privacy_setting.html
     * @param       $access_token  :第三方平台接口调用令牌authorizer_access_token
     * @param       $owner_setting :收集方（开发者）信息配置
     * @param int   $privacy_ver   :用户隐私保护指引的版本，1表示现网版本；2表示开发版。默认是2开发版。
     * @param array $setting_list  :要收集的用户信息配置，可选择的用户信息类型参考下方详情。当privacy_ver传2或者不传是必填；当privacy_ver传1时，该参数不可传，否则会报错
     * @return mixed
     */
    public function setPrivacySetting($access_token, $owner_setting, $privacy_ver = 2, $setting_list = [])
    {
        return $this->curl->post(
            UrlConfig::setPrivacySetting . $access_token,
            json_encode(['privacy_ver' => $privacy_ver, 'owner_setting' => $owner_setting, 'setting_list' => $setting_list],JSON_UNESCAPED_UNICODE)
        );
    }

    /**
     * 查询小程序用户隐私保护指引
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getPrivacySetting
     * status:
     * User: Mr.liang
     * Date: 2021/11/19
     * Time: 15:43
     * Email:1695699447@qq.com
     * @param     $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param int $privacy_ver  :1表示现网版本，即，传1则该接口返回的内容是现网版本的；2表示开发版，即，传2则该接口返回的内容是开发版本的。默认是2。
     * @return mixed
     */
    public function getPrivacySetting($access_token, $privacy_ver = 2)
    {
        return $this->curl->post(
            UrlConfig::getPrivacySetting . $access_token,
            json_encode(['privacy_ver' => $privacy_ver])
        );
    }

    /**
     * 上传小程序用户隐私保护指引
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:uploadPrivacyextFile
     * status:
     * User: Mr.liang
     * Date: 2021/11/19
     * Time: 15:44
     * Email:1695699447@qq.com
     * @param $access_token:第三方平台接口调用令牌authorizer_access_token
     * @param $file:只支持传txt文件
     * @return mixed
     */
    public function uploadPrivacyextFile($access_token, $file)
    {
        return $this->curl->patch(
            UrlConfig::uploadPrivacyextFile . $access_token,
            [
                'file' => new CURLFile($file),
            ]
        );
    }
}