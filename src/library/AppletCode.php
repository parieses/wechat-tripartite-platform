<?php

namespace WeChat\library;

use http\Exception\RuntimeException;
use WeChat\UrlConfig;

/**
 * 小程序代码管理
 * Class AppletCode
 * @package WeChat\library
 */
class  AppletCode

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 上传小程序代码
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:commit
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:14
     * Email:1695699447@qq.com
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/commit.html
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $template_id :代码库中的代码模板 ID
     * @param $ext_json :第三方自定义的配置
     * @param $user_version :代码版本号，开发者可自定义（长度不要超过 64 个字符）
     * @param $user_desc :代码描述，开发者可自定义
     * @return mixed
     */
    public function commit($access_token, $template_id, $ext_json, $user_version, $user_desc)
    {
        return $this->curl->post(
            UrlConfig::commit . $access_token,
            json_encode(['template_id' => $template_id, 'ext_json' => $ext_json, 'user_version' => $user_version, 'user_desc' => $user_desc])
        );
    }

    /**
     * 获取已上传的代码的页面列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getPage
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:16
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function getPage($access_token)
    {
        return $this->curl->get(UrlConfig::getPage . $access_token);
    }

    /**
     * 获取体验版二维码
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getQrcode
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:25
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $path :指定二维码扫码后直接进入指定页面并可同时带上参数）
     * @return mixed
     */
    public function getQrCode($access_token, $path)
    {
        return $this->curl->get(UrlConfig::getQrCode . $access_token . '&path=' . urlencode($path));
    }

    /**
     * 提交审核
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:submitAudit
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:32
     * Email:1695699447@qq.com
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/submit_audit.html
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $item_list :审核项列表（选填，至多填写 5 项）
     * @param $preview_info :预览信息（小程序页面截图和操作录屏）
     * @param $version_desc :小程序版本说明和功能解释
     * @param $ugc_declare :反馈内容，至多 200 字
     * @param $feedback_info :用 | 分割的 media_id 列表，至多 5 张图片, 可以通过新增临时素材接口上传而得到
     * @param $feedback_stuff :用户生成内容场景（UGC）信息安全声明
     * @return mixed
     */
    public function submitAudit($access_token, $item_list, $preview_info, $version_desc, $ugc_declare, $feedback_info, $feedback_stuff)
    {
        return $this->curl->post(
            UrlConfig::submitAudit . $access_token,
            json_encode(
                [
                    'item_list' => $item_list,
                    'preview_info' => $preview_info,
                    'version_desc' => $version_desc,
                    'feedback_info' => $feedback_info,
                    'feedback_stuff' => $feedback_stuff,
                    'ugc_declare' => $ugc_declare
                ]
            )
        );
    }

    /**
     * 查询指定发布审核单的审核状态
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getAuditStatus
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:35
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $auditid :提交审核时获得的审核 id
     * @return mixed
     */
    public function getAuditStatus($access_token, $auditid)
    {
        return $this->curl->post(
            UrlConfig::getAuditStatus . $access_token,
            json_encode(['auditid' => $auditid])
        );
    }

    /**
     * 查询最新一次提交的审核状态
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getLatestAuditStatus
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:38
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function getLatestAuditStatus($access_token)
    {
        return $this->curl->get(UrlConfig::getLatestAuditStatus . $access_token);
    }

    /**
     * 小程序审核撤回
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:undoCodeAudit
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:40
     * Email:1695699447@qq.com
     * @param $access_token ::第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function undoCodeAudit($access_token)
    {
        return $this->curl->get(UrlConfig::undoCodeAudit . $access_token);
    }

    /**
     * 发布已通过审核的小程序
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:release
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:42
     * Email:1695699447@qq.com
     * @param $access_token ::第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function release($access_token)
    {
        return $this->curl->post(UrlConfig::release . $access_token, "{}");
    }

    /**
     * 版本回退
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:revertCodeRelease
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:46
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $app_version :默认是回滚到上一个版本；也可回滚到指定的小程序版本，可通过get_history_version获取app_version
     * @return mixed
     */
    public function revertCodeRelease($access_token, $app_version)
    {
        return $this->curl->get(UrlConfig::revertCodeRelease . $access_token . '&app_version=' . $app_version);
    }

    /**
     * 获取可回退的小程序版本
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getHistoryVersion
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:49
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $action :只能填get_history_version
     * @return mixed
     */
    public function getHistoryVersion($access_token, $action = 'get_history_version')
    {
        return $this->curl->get(UrlConfig::revertCodeRelease . $access_token . '&action=' . $action);
    }

    /**
     * 分阶段发布
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:grayRelease
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:52
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $gray_percentage :灰度的百分比 1 ~ 100 的整数
     * @return mixed
     */
    public function grayRelease($access_token, $gray_percentage)
    {
        return $this->curl->post(
            UrlConfig::grayRelease . $access_token,
            json_encode(['gray_percentage' => $gray_percentage])
        );
    }

    /**
     * 查询当前分阶段发布详情
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getGrayReleasePlan
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:54
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function getGrayReleasePlan($access_token)
    {
        return $this->curl->get(UrlConfig::getGrayReleasePlan . $access_token);
    }

    /**
     * 取消分阶段发布
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:revertGrayRelease
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:55
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function revertGrayRelease($access_token)
    {
        return $this->curl->get(UrlConfig::revertGrayRelease . $access_token);
    }

    /**
     * Remark:查询小程序服务状态
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 9:55
     * Name: getVisitStatus:第三方平台接口调用令牌authorizer_access_token
     * @param $access_token
     * @return mixed
     */
    public function getVisitStatus($access_token)
    {
        return $this->curl->post(UrlConfig::getVisitStatus . $access_token);
    }

    /**
     * 修改小程序服务状态
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:changeVisitStatus
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 14:58
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $action :设置可访问状态，发布后默认可访问，close 为不可见，open 为可见
     * @return mixed
     */
    public function changeVisitStatus($access_token, $action)
    {
        return $this->curl->post(
            UrlConfig::changeVisitStatus . $access_token,
            json_encode(['action' => $action])
        );
    }

    /**
     * 查询当前设置的最低基础库版本及各版本用户占比
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getWeappSupportVersion
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 15:00
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function getWeappSupportVersion($access_token)
    {
        return $this->curl->post(
            UrlConfig::getWeappSupportVersion . $access_token,
            "{}"
        );
    }

    /**
     * 设置最低基础库版本
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:setWeappSupportVersion
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 15:05
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $version :为已发布的基础库版本号
     * @return mixed
     */
    public function setWeappSupportVersion($access_token, $version)
    {
        return $this->curl->post(
            UrlConfig::setWeappSupportVersion . $access_token,
            json_encode(['version' => $version])
        );
    }

    /**
     * 查询服务商的当月提审限额（quota）和加急次数
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:queryQuota
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 15:06
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @return mixed
     */
    public function queryQuota($access_token)
    {
        return $this->curl->get(UrlConfig::queryQuota . $access_token);
    }

    /**
     * 加急审核申请
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:speedUpAudit
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 15:06
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $auditid :审核单ID
     * @return mixed
     */
    public function speedUpAudit($access_token, $auditid)
    {
        return $this->curl->post(
            UrlConfig::speedUpAudit . $access_token,
            json_encode(['auditid' => $auditid])
        );
    }

    /**
     * Remark:查询小程序版本信息
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 9:57
     * Name: getVersionInfo
     * @param $access_token
     * @return mixed
     */
    public function getVersionInfo($access_token)
    {
        return $this->curl->post(UrlConfig::getVersionInfo . $access_token, "{}");
    }

    /**
     * Remark:上传提审素材
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 9:59
     * Name: uploadMediaToCodeAudit
     * @param $access_token
     * @param $path
     * @return mixed
     */
    public function uploadMediaToCodeAudit($access_token, $path)
    {
        if (!file_exists($path) || !is_readable($path)) {
            throw new RuntimeException("文件不存在，或者文件不可读: '$path'");
        }
        $url = UrlConfig::uploadMediaToCodeAudit . $access_token;
        $file = new \CURLFile($path);
        return $this->curl->post($url, ['media' => $file]);
    }

    /**
     * Remark:获取隐私接口检测结果
     * Created by PhpStorm.
     * User: liang
     * Date: 2023/5/8 10:00
     * Name: getCodePrivacyInfo
     * @param $access_token
     * @return mixed
     */
    public function getCodePrivacyInfo($access_token)
    {
        return $this->curl->get(UrlConfig::getCodePrivacyInfo . $access_token);
    }
}