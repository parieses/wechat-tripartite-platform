<?php

namespace WeChat\library;

use WeChat\UrlConfig;

/**
 * Class TrialApplet
 * @package WeChat\library
 */
class  TrialApplet

{
	use Initialize;
	
	public function __construct()
	{
		$this->initializeCurl();
	}
	
	/**
	 * 创建试用小程序
	 * Created by Mr.亮先生.
	 * program: Wechat_Tripartite_Platform
	 * FuncName:fastRegisterBetaWeapp
	 * status:
	 * User: Mr.liang
	 * Date: 2021/5/24
	 * Time: 16:49
	 * Email:1695699447@qq.com
	 * @param $access_token :第三方平台令牌component_access_token
	 * @param $name :小程序名称，昵称半自动设定，强制后缀“的体验小程序”。且该参数会进行关键字检查，如果命中品牌关键字则会报错。如遇到品牌大客户要用试用小程序，建议用户先换个名字，认证后再修改成品牌名。只支持4-30个字符
	 * @param $openid :微信用户的openid（不是微信号），试用小程序创建成功后会默认将该用户设置为小程序管理员。
	 * @return mixed
	 */
	public function fastRegisterBetaWeapp($access_token, $name, $openid)
	{
		return $this->curl->post(
			UrlConfig::fastRegisterBetaWeapp . $access_token,
			json_encode(['name' => $name, 'openid' => $openid])
		);
	}
	
	/**
	 * 试用小程序快速认证
	 * Created by Mr.亮先生.
	 * program: Wechat_Tripartite_Platform
	 * FuncName:verifyBetaWeapp
	 * status:
	 * User: Mr.liang
	 * Date: 2021/5/24
	 * Time: 16:51
	 * Email:1695699447@qq.com
	 * @param $access_token :第三方平台接口调用令牌authorizer_access_token
	 * @param $verify_info :企业法人认证需要的信息(https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/beta_Mini_Programs/fastverify.html)
	 * @return mixed
	 */
	public function verifyBetaWeapp($access_token, $verify_info)
	{
		return $this->curl->post(
			UrlConfig::verifyBetaWeapp . $access_token,
			json_encode(['verify_info' => $verify_info])
		);
	}
	
	/**
	 * 修改试用小程序名称
	 * Created by Mr.亮先生.
	 * program: Wechat_Tripartite_Platform
	 * FuncName:setBetaWeappNickName
	 * status:
	 * User: Mr.liang
	 * Date: 2021/5/24
	 * Time: 16:55
	 * Email:1695699447@qq.com
	 * @param $access_token
	 * @param $name
	 * @return mixed
	 */
	public function setBetaWeappNickName($access_token, $name)
	{
		return $this->curl->post(
			UrlConfig::setBetaWeappNickName . $access_token,
			json_encode(['name' => $name])
		);
	}
	
	/**
	 * 获取公众号管理员授权
	 * Created by Mr.亮先生.
	 * program: Wechat_Tripartite_Platform
	 * FuncName:getMpAdminAuth
	 * status:
	 * User: Mr.liang
	 * Date: 2021/5/24
	 * Time: 16:58
	 * Email:1695699447@qq.com
	 * @param $access_token :第三方平台接口调用令牌authorizer_access_token
	 * @param $mp_appid :公众号的appid、微信id以及原始id都可以
	 * @param $same_admin :    小程序管理员和公众号管理员是否同一个；0表示否，1表示是
	 * @return mixed
	 */
	public function getMpAdminAuth($access_token, $mp_appid, $same_admin)
	{
		return $this->curl->post(
			UrlConfig::getMpAdminAuth . $access_token,
			json_encode(['mp_appid' => $mp_appid, 'same_admin' => $same_admin])
		);
	}
	
	/**
	 * 复用公众号主体认证小程序
	 * Created by Mr.亮先生.
	 * program: Wechat_Tripartite_Platform
	 * FuncName:mpVerifyBetaWeapp
	 * status:
	 * User: Mr.liang
	 * Date: 2021/5/24
	 * Time: 17:07
	 * Email:1695699447@qq.com
	 * @param $access_token :第三方平台接口调用令牌authorizer_access_token
	 * @param $mp_appid :公众号的appid、微信id以及原始id都可以
	 * @param $ticket :公众号管理员授权成功后推送的tickt，ticket有效期为2小时
	 * @return mixed
	 */
	public function mpVerifyBetaWeapp($access_token, $mp_appid, $ticket)
	{
		return $this->curl->post(
			UrlConfig::mpVerifyBetaWeapp . $access_token,
			json_encode(['mp_appid' => $mp_appid, 'ticket' => $ticket])
		);
	}
	
	/**
	 * Remark:快速注册企业小程序
	 * Created by PhpStorm.
	 * User: liang
	 * Date: 2024/1/10 14:23
	 * Version:
	 * Name: fastregisterweapp
	 * @param $component_access_token
	 * @param array $data
	 * name    string    是    企业名（需与工商部门登记信息一致）；如果是“无主体名称个体工商户”则填“个体户+法人姓名”，例如“个体户张三”
	 * code    string    是    企业代码
	 * code_type    number    是    企业代码类型 1：统一社会信用代码（18 位） 2：组织机构代码（9 位 xxxxxxxx-x） 3：营业执照注册号(15 位)
	 * legal_persona_wechat    string    是    法人微信号
	 * legal_persona_name    string    是    法人姓名（绑定银行卡）
	 * component_phone    string    否    第三方联系电话
	 * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/register-management/fast-registration-ent/registerMiniprogram.html
	 * @return mixed
	 */
	public function fastregisterweapp($component_access_token, array $data = [], $action = 'create')
	{
		return $this->curl->post(
			UrlConfig::fastregisterweapp . $component_access_token . '&action=' . $action,
			json_encode($data)
		);
	}
	
	/**
	 * Remark:复用公众号主体快速注册小程序
	 * Created by PhpStorm.
	 * User: liang
	 * Date: 2024/1/10 14:38
	 * Version:
	 * Name: fastregister
	 * @param $access_token
	 * @param $ticket :公众号扫码授权的凭证(公众平台扫码页面回跳到第三方平台时携带)，要看复用公众号主体快速注册小程序使用说明
	 * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/register-management/fast-registration-officalaccount/registerMiniprogramByOffiaccount.html
	 * @return mixed
	 */
	public function fastregister($access_token, $ticket)
	{
		return $this->curl->post(
			UrlConfig::fastregister . $access_token,
			json_encode(['ticket' => $ticket])
		);
	}
	public function fastregisterpersonalweapp($access_token,$data = [],$action = 'create' )
	{
		$url = sprintf(UrlConfig::fastregisterpersonalweapp, $action, $access_token);
		return $this->curl->post(
			$url,
			json_encode($data)
		);
	}
	
}