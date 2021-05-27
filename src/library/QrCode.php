<?php

namespace WeChat\library;

use WeChat\UrlConfig;

/**
 * Class QrCode
 * @package WeChat\library
 */
class  QrCode

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 获取已设置的二维码规则
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:qrCodeJumpGet
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:33
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function qrCodeJumpGet($access_token)
    {
        return $this->curl->post(UrlConfig::qrCodeJumpGet . $access_token, json_encode(["access_token" => $access_token]));
    }

    /**
     * 获取校验文件名称及内容
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:qrCodeJumpDownload
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:35
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function qrCodeJumpDownload($access_token)
    {
        return $this->curl->post(UrlConfig::qrCodeJumpDownload . $access_token, json_encode(["access_token" => $access_token]));
    }

    /**
     * 增加或修改二维码规则
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:qrCodeJumpAdd
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:41
     * Email:1695699447@qq.com
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/qrcode/qrcodejumpadd.html
     * @param $access_token    :第三方平台接口调用令牌authorizer_access_token
     * @param $prefix          :二维码规则
     * @param $permit_sub_rule :是否独占符合二维码前缀匹配规则的所有子规 1 为不占用，2 为占用;
     * @param $path            :小程序功能页面
     * @param $open_version    :测试范围
     * @param $debug_url       :测试链接，至多 5 个用于测试的二维码完整链接，此链接必须符合已填写的二维码规则。
     * @param $is_edit         :编辑标志位，0 表示新增二维码规则，1 表示修改已有二维码规则
     * @return mixed
     */
    public function qrCodeJumpAdd($access_token, $prefix, $permit_sub_rule, $path, $open_version, $debug_url, $is_edit)
    {
        return $this->curl->post(
            UrlConfig::qrCodeJumpAdd . $access_token,
            json_encode(
                [
                    "prefix" => $prefix,
                    'permit_sub_rule' => $permit_sub_rule,
                    'path' => $path,
                    'open_version' => $open_version,
                    "debug_url" => $debug_url,
                    "is_edit" => $is_edit
                ]
            )
        );
    }

    /**
     * 发布已设置的二维码规则
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:qrCodeJumpPublish
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:44
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $prefix       :二维码规则
     * @return mixed
     */
    public function qrCodeJumpPublish($access_token, $prefix)
    {
        return $this->curl->post(
            UrlConfig::qrCodeJumpPublish . $access_token,
            json_encode(
                [
                    "prefix" => $prefix,
                ]
            )
        );
    }

    /**
     * 删除已设置的二维码规则
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:qrCodeJumpDelete
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:46
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $prefix       :二维码规则
     * @return mixed
     */
    public function qrCodeJumpDelete($access_token, $prefix)
    {
        return $this->curl->post(
            UrlConfig::qrCodeJumpDelete . $access_token,
            json_encode(
                [
                    "prefix" => $prefix,
                ]
            )
        );
    }

    /**
     * 将二维码长链接转成短链接
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:shortUrl
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:48
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $action       :此处填long2short，代表长链接转短链接
     * @param $long_url     :需要转换的长链接，支持http://、https://、weixin://wxpay 格式的url
     * @return mixed
     */
    public function shortUrl($access_token, $action, $long_url)
    {
        return $this->curl->post(
            UrlConfig::shortUrl . $access_token,
            json_encode(
                [
                    "action" => $action,
                    'long_url' => $long_url
                ]
            )
        );
    }

    /**
     * 获取unlimited小程序码
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getWxaCodeUnLimit
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:52
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $scene        :最大32个可见字符，只支持数字，大小写英文以及部分特殊字符：!#$&'()*+,/:;=?@-._~，其它字符请自行编码为合法字符（因不支持%，中文无法使用 urlencode 处理，请使用其他编码方式）
     * @param $page         :必须是已经发布的小程序存在的页面（否则报错），例如 pages/index/index, 根路径前不要填加 /,不能携带参数（参数请放在scene字段里），如果不填写这个字段，默认跳主页面
     * @param $width        :二维码的宽度，单位 px，最小 280px，最大 1280px
     * @param $auto_color   :自动配置线条颜色，如果颜色依然是黑色，则说明不建议配置主色调，默认 false
     * @param $line_color   :auto_color 为 false 时生效，使用 rgb 设置颜色 例如 {"r":"xxx","g":"xxx","b":"xxx"} 十进制表示
     * @param $is_hyaline   :是否需要透明底色，为 true 时，生成透明底色的小程序
     * @return mixed
     */
    public function getWxaCodeUnLimit($access_token, $scene, $page, $width, $auto_color, $line_color, $is_hyaline)
    {
        return $this->curl->post(
            UrlConfig::getWxaCodeUnLimit . $access_token,
            json_encode(
                [
                    "scene" => $scene,
                    'page' => $page,
                    "width" => $width,
                    'auto_color' => $auto_color,
                    "line_color" => $line_color,
                    'is_hyaline' => $is_hyaline,
                ]
            )
        );
    }

    /**
     * 获取小程序码
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getWxaCode
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:54
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $page         :扫码进入的小程序页面路径，最大长度 128 字节，不能为空；对于小游戏，可以只传入 query 部分，来实现传参效果，如：传入 "?foo=bar"，即可在 wx.getLaunchOptionsSync 接口中的 query 参数获取到 {foo:"bar"}。
     * @param $width        :二维码的宽度，单位 px。最小 280px，最大 1280px
     * @param $auto_color   :    自动配置线条颜色，如果颜色依然是黑色，则说明不建议配置主色调
     * @param $line_color   :auto_color 为 false 时生效，使用 rgb 设置颜色 例如 {"r":"xxx","g":"xxx","b":"xxx"} 十进制表示
     * @param $is_hyaline   :是否需要透明底色，为 true 时，生成透明底色的小程序码
     * @return mixed
     */
    public function getWxaCode($access_token, $page, $width, $auto_color, $line_color, $is_hyaline)
    {
        return $this->curl->post(
            UrlConfig::getWxaCode . $access_token,
            json_encode(
                [
                    'page' => $page,
                    "width" => $width,
                    'auto_color' => $auto_color,
                    "line_color" => $line_color,
                    'is_hyaline' => $is_hyaline,
                ]
            )
        );
    }

    /**
     * 获取小程序二维码
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:createWxaQrCode
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:58
     * Email:1695699447@qq.com
     * @param     $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param     $page         :扫码进入的小程序页面路径，最大长度 128 字节，不能为空；对于小游戏，可以只传入 query 部分，来实现传参效果，如：传入 "?foo=bar"，即可在 wx.getLaunchOptionsSync 接口中的 query 参数获取到 {foo:"bar"}。
     * @param int $width        :二维码的宽度，单位 px。最小 280px，最大 1280px
     * @return mixed
     */
    public function createWxaQrCode($access_token, $page, $width = 430)
    {
        return $this->curl->post(
            UrlConfig::createWxaQrCode . $access_token,
            json_encode(
                [
                    'page' => urldecode($page),
                    "width" => $width,
                ]
            )
        );
    }

}