<?php

namespace WeChat\library;

use Curl\Curl;
use DOMDocument;
use WeChat\UrlConfig;


/**
 * Class AppletCategory
 * @package WeChat\library
 */
class  AppletCategory

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 获取可以设置的所有类目
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getAllCategories
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:31
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @return mixed
     */
    public function getAllCategories($access_token)
    {
        return $this->curl->get(UrlConfig::getAllCategories . $access_token);
    }

    /**
     * 获取已设置的所有类目
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getHasBeenSetCategory
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:34
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @return mixed
     */
    public function getHasBeenSetCategory($access_token)
    {
        return $this->curl->get(UrlConfig::getHasBeenSetCategory . $access_token);
    }

    /**
     * 获取不同主体类型的类
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getCategoriesByType
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:34
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @param $verify_type  :如果不填，默认传0；个人主体是0；企业主体是1；政府是2；媒体是3；其他组织是4
     * @return mixed
     */
    public function getCategoriesByType($access_token, $verify_type)
    {
        return $this->curl->post(
            UrlConfig::getCategoriesByType . $access_token,
            json_encode(['verify_type' => $verify_type])
        );
    }

    /**
     * 添加类目
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:addCategory
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:36
     * Email:1695699447@qq.com
     * @param $access_token :接口调用令牌
     * @param $categories   :类目信息列表
     * @return mixed
     */
    public function addCategory($access_token, $categories)
    {
        return $this->curl->post(
            UrlConfig::addCategory . $access_token,
            json_encode(['categories' => $categories])
        );
    }

    /**
     * 删除类目
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:deleteCategory
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:37
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @param $first        :一级类目 ID
     * @param $second       :二级类目 ID
     * @return mixed
     */
    public function deleteCategory($access_token, $first, $second)
    {
        return $this->curl->post(
            UrlConfig::deleteCategory . $access_token,
            json_encode(['first' => $first, 'second' => $second])
        );
    }

    /**
     * 修改类目资质信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:modifyCategory
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:39
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @param $first        :一级类目 ID
     * @param $second       :二级类目 ID
     * @param $certicates   :[资质信息]列表
     * @return mixed
     */
    public function modifyCategory($access_token, $first, $second, $certicates)
    {
        return $this->curl->post(
            UrlConfig::modifyCategory . $access_token,
            json_encode(['first' => $first, 'second' => $second, 'certicates' => $certicates])
        );
    }

    /**
     * 获取审核时可填写的类目信息
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getCategory
     * status:
     * User: Mr.liang
     * Date: 2021/5/27
     * Time: 14:40
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌
     * @return mixed
     */
    public function getCategory($access_token)
    {
        return $this->curl->get(UrlConfig::getCategory . $access_token);
    }
}