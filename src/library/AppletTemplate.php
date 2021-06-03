<?php

namespace WeChat\library;

use Curl\Curl;
use DOMDocument;
use WeChat\UrlConfig;

/**
 * 小程序模板
 * Class AppletTemplate
 * @package WeChat\library
 */
class  AppletTemplate

{
    use Initialize;

    /**
     * AppletTemplate constructor.
     */
    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 获取代码草稿列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getTemplateDraftList
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 10:36
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台令牌 component_access_token
     * @return mixed
     */
    public function getTemplateDraftList($access_token)
    {
        return $this->curl->get(
            UrlConfig::getTemplateDraftList . $access_token
        );
    }

    /**
     * 将草稿添加到代码模板库
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:addToTemplate
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 10:45
     * Email:1695699447@qq.com
     * @param     $access_token  :第三方平台令牌 component_access_token
     * @param     $draft_id      :草稿 ID
     * @param int $template_type :默认值是0，对应普通模板；可选1，对应标准模板库，关于标准模板库和普通模板库的区别可以查看小程序模板库介绍
     * @return mixed
     */
    public function addToTemplate($access_token, $draft_id, $template_type = 0)
    {
        return $this->curl->post(
            UrlConfig::addToTemplate . $access_token,
            json_encode(['draft_id' => $draft_id, 'template_type' => $template_type])
        );
    }

    /**
     * 获取代码模板列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getTemplateList
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 10:45
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台令牌 component_access_token
     * @return mixed
     */
    public function getTemplateList($access_token, $template_type = null)
    {
        return $this->curl->get(
            UrlConfig::getTemplateList . $access_token . '&template_type=' . $template_type
        );
    }

    /**
     * 删除指定代码模板
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:deleteTemplate
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 10:45
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台令牌 component_access_token
     * @param $template_id  :要删除的模板 ID ，可通过获取代码模板列表接口获取。
     * @return mixed
     */
    public function deleteTemplate($access_token, $template_id)
    {
        return $this->curl->post(
            UrlConfig::deleteTemplate . $access_token,
            json_encode(['template_id' => $template_id])
        );
    }
}