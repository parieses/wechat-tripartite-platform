<?php

namespace WeChat\library;

use Exception;
use RuntimeException;
use WeChat\UrlConfig;

/**
 * 小程序成员管理
 * Class AppletMember
 * @package WeChat\library
 */
class  AppletMember

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     *绑定微信用户为体验者
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:bindTester
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 11:41
     * Email:1695699447@qq.com
     * @param $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param $wechatid     :微信号
     * @return mixed
     */
    public function bindTester($access_token, $wechatid)
    {
        return $this->curl->post(
            UrlConfig::bindTester . $access_token,
            json_encode(['wechatid' => $wechatid])
        );
    }
	
	/**
	 * Created by Mr.亮先生.
	 * program: wechat-tripartite-platform
	 * FuncName:unbindTester
	 * status:
	 * User: Mr.liang
	 * Date: 2021/5/25
	 * Time: 11:42
	 * Email:1695699447@qq.com
	 * @param $access_token :第三方平台接口调用令牌authorizer_access_token
	 * @param $wechatid :微信号
	 * @param $userstr :人员对应的唯一字符串， 可通过获取已绑定的体验者列表获取人员对应的字符串
	 * @return mixed
	 */
    public function unbindTester($access_token, $wechatid = '', $userstr = '')
    {
		$data = [];
		if ($wechatid){
			$data['wechatid'] = $wechatid;
		}
		if ($userstr){
			$data['userstr'] = $userstr;
		}
		if (count($data) === 2){
			throw new RuntimeException('参数错误');
		}
        return $this->curl->post(
            UrlConfig::unbindTester . $access_token,
            json_encode($data)
        );
    }

    /**
     * 获取体验者列表
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:memberAuth
     * status:
     * User: Mr.liang
     * Date: 2021/5/25
     * Time: 11:44
     * Email:1695699447@qq.com
     * @param        $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param string $action       :填 "get_experiencer" 即可
     * @return mixed
     */
    public function memberAuth($access_token, $action = 'get_experiencer')
    {
        return $this->curl->post(
            UrlConfig::memberAuth . $access_token,
            json_encode(['action' => $action])
        );
    }
}