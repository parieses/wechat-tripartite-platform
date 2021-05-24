<?php


use WeChat\library\Authorization;
use WeChat\library\OpenPlatform;
use WeChat\library\TrialApplet;
use WeChat\WeChatServer;

require __DIR__ . '/vendor/autoload.php';


$componentAppId = 'wx9f42dd7989abd9d9';
$componentAppSecret = 'c6f44578a0d99bd54ffe7b9ecb5b26fa';
//消息校验Token
$token = 'xingfuli';
//消息加解密Key
$encodingAesKey = '1CD37E73D5D74B439A167DE3014FD882521XINGFULI';
$weChat = new WeChatServer(Authorization::class, ['componentAppId' => $componentAppId, 'componentAppSecret' => $componentAppSecret, 'token' => $token, 'encodingAesKey' => $encodingAesKey]);
$data = ['ticket' => 'iVoPSWRoEAjGuqhT3viDJmv4H3k9C0n2jSPwE9GVZ_e21TNp128R1KQJybxUpIwHyNq_ed6Eypf-_XFQxtIU3A'];
//var_dump($weChat->exec('getComponentAccessToken',$data));
//获取要操作的类
$object = $weChat->getInstance();
//通过ticket 获取 获取令牌
$token = $object->apiComponentToken($data['ticket']);
//通过令牌获取预授权码
$PreauthCode = $object->apiCreatePreauthcode($token->component_access_token);
$PreauthCode  = preg_replace("/preauthcode@@@/", "", $PreauthCode->pre_auth_code);
//pc的授权页面
//$page   = $object->componentLoginPage($PreauthCode,'http://member.cn1.utools.club/TestCallBack.php',2);
//echo "<a href=\"{$page}\">PC</a>";
//移动的授权页面
//$page   = $object->bindComponent($PreauthCode,'http://member.cn1.utools.club/TestCallBack.php',2);
//echo "<a href=\"{$page}\">移动</a>";
//授权回调里面获取的授权码
$authorization_code = "zFBlj_uPBosTTy2ecOE9sTQN9Ce-ZiDdZVl10mcB8kaqvPHu0RO5yo72__P4YOK_wnWtvNUQyFKj2YFSv-E0LA";
//使用授权码获取授权信息
//$apiQueryAuth = $object->apiQueryAuth($token->component_access_token,$authorization_code);
//授权方 appid
//$authorizer_appid = $apiQueryAuth->authorization_info->authorizer_appid;
//接口调用令牌（在授权的公众号/小程序具备 API 权限时，才有此返回值）
//$authorizer_access_token  = $apiQueryAuth->authorization_info->authorizer_access_token;
//刷新令牌（在授权的公众号具备API权限时，才有此返回值），刷新令牌主要用于第三方平台获取和刷新已授权用户的 authorizer_access_token。一旦丢失，只能让用户重新授权，才能再次拿到新的刷新令牌。用户重新授权后，之前的刷新令牌会失效
//$authorizer_refresh_token = $apiQueryAuth->authorization_info->authorizer_refresh_token;
//通过刷新令牌 刷新接口调用令牌
//$apiAuthorizerToken = $object->apiAuthorizerToken($token->component_access_token,$authorizer_appid,$authorizer_refresh_token);
//获取授权方帐号信息
//$apiGetAuthorizerInfo = $object->apiGetAuthorizerInfo($token->component_access_token,$authorizer_appid);
////拉取所有已授权的帐号信息
//$api_get_authorizer_list = $object->api_get_authorizer_list($token->component_access_token);
//获取授权方选项信息
//$api_get_authorizer_option = $object->api_get_authorizer_option($token->component_access_token,$authorizer_appid,'voice_recognize');
//var_dump($api_get_authorizer_option);
//$Platform = (new OpenPlatform())->create($authorizer_access_token,"wx90721efca5d2c575");
//var_dump($Platform);
$TrialApplet = (new TrialApplet())->getMpAdminAuth($token->component_access_token,'name',1);
var_dump($TrialApplet);









