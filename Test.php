<?php


use WeChat\library\AppletBasicInformation;
use WeChat\library\AppletCode;
use WeChat\library\AppletMember;
use WeChat\library\AppletTemplate;
use WeChat\library\Authorization;
use WeChat\library\ConcernComponent;
use WeChat\library\OpenPlatform;
use WeChat\library\QrCode;
use WeChat\library\TrialApplet;
use WeChat\library\IllegalAndAppeal;
use WeChat\WeChatServer;

require __DIR__ . '/vendor/autoload.php';


$componentAppId = 'wx9f42dd7989abd9d9';
$componentAppSecret = 'c6f44578a0d99bd54ffe7b9ecb5b26fa';
//消息校验Token
$token = 'xingfuli';
//消息加解密Key
$encodingAesKey = '1CD37E73D5D74B439A167DE3014FD882521XINGFULI';
$weChat = new WeChatServer(Authorization::class, ['componentAppId' => $componentAppId, 'componentAppSecret' => $componentAppSecret, 'token' => $token, 'encodingAesKey' => $encodingAesKey]);
$data = ['ticket' => 'znki2rGXe30AWTWliIrpKBVxUNf-TOQQ-54RQrXqdCULxUOtlxksDlk0batVSuzL75xvz-cbpOnKPK1tlXsqqw'];
//var_dump($weChat->exec('getComponentAccessToken',$data));
//获取要操作的类
$object = $weChat->getInstance();
//$apiStartPushTicket = $object->apiStartPushTicket();
//通过ticket 获取 获取令牌
//$token = $object->apiComponentToken($data['ticket']);
$component_access_token = "45_Ioxv51SCbMFM79FvqZ180l90ipZ3obFwp0AWKGvGamMKSym4iqlrw_1SeTVySyE-T84ksq1b_mdofWCxLFxERG4s44dxBv_Y6KwTm2MUTlFI7R-vxkHxwvo4zJZ78kdvYntdC0OSHCDLNjgmXHVaABATDR";//$token->component_access_token;
//通过令牌获取预授权码
//$PreauthCode = $object->apiCreatePreauthcode($component_access_token);
//$PreauthCode  = preg_replace("/preauthcode@@@/", "", $PreauthCode->pre_auth_code);
//pc的授权页面
//$page   = $object->componentLoginPage($PreauthCode,'http://member.cn1.utools.club/TestCallBack.php',2);
//echo "<a href=\"{$page}\">PC</a>";die();
//移动的授权页面
//$page   = $object->bindComponent($PreauthCode,'http://member.cn1.utools.club/TestCallBack.php',2);
//echo "<a href=\"{$page}\">移动</a>";
//授权回调里面获取的授权码
$authorization_code = "tWaDFthTreq9M7jKOsrLhJycVkPZ1vcLqQRzJkUnxAAABqkb_RQAdsO0e8h6u5eFSIKjbkY0ini78kwcqxXnJA";
//使用授权码获取授权信息
//$apiQueryAuth = $object->apiQueryAuth($component_access_token,$authorization_code);
//var_dump($apiQueryAuth);die;
//授权方 appid
//$authorizer_appid = $apiQueryAuth->authorization_info->authorizer_appid;
//接口调用令牌（在授权的公众号/小程序具备 API 权限时，才有此返回值）
//$authorizer_access_token  = $apiQueryAuth->authorization_info->authorizer_access_token;
//var_dump($authorizer_access_token);die();
$authorizer_access_token = "45_QdBqJ_KzrBjKfyZFj_inVDkSkMqAi2jbtQ025h5PLZNPz29J_srWAaQTN0nXziRi3KwVmFyAQTGqSmCZ4aPieJOw4IoZun3PvzsiYydnF-Sr0vC91LP9E9wM2LekM6WqEVzmivyOs7N2P-o4QYLjAIDDLY";
//刷新令牌（在授权的公众号具备API权限时，才有此返回值），刷新令牌主要用于第三方平台获取和刷新已授权用户的 authorizer_access_token。一旦丢失，只能让用户重新授权，才能再次拿到新的刷新令牌。用户重新授权后，之前的刷新令牌会失效
//$authorizer_refresh_token = "oZrs5Gaw7ULyRGfCvlFgIbkclJPARh3B3cAr5VRubmE";                                                                                                                //$apiQueryAuth->authorization_info->authorizer_refresh_token;
//通过刷新令牌 刷新接口调用令牌
//$apiAuthorizerToken = $object->apiAuthorizerToken($component_access_token,"wx90721efca5d2c575",$authorizer_refresh_token);
//var_dump($apiAuthorizerToken);die();
//获取授权方帐号信息
$component_access_token = "45_v3XXYi4cpzIQtzKjEd10rV5UjvIEJvjueW82sAZ4rvJU2WMCHb1E5uWUeHe2BUx2lbRjQRsRkYIb77uKoTyJAa57LCFHWOm13NCWp9umuq6NeY6WfLpdZm9DeP8vbwl_vLe_mnlpHMTwva3SAKFaAHAMWR";
//$apiGetAuthorizerInfo = $object->apiGetAuthorizerInfo($component_access_token,'wx5d675bbbb9d91d47');
//var_dump($apiGetAuthorizerInfo->authorizer_info->verify_type_info->id);die();
////拉取所有已授权的帐号信息
//$api_get_authorizer_list = $object->api_get_authorizer_list($token->component_access_token);
//获取授权方选项信息
//$api_get_authorizer_option = $object->api_get_authorizer_option($token->component_access_token,$authorizer_appid,'voice_recognize');
//var_dump($api_get_authorizer_option);
//$Platform = (new OpenPlatform())->create($authorizer_access_token,"wx90721efca5d2c575");
//var_dump($Platform);
//$TrialApplet = (new TrialApplet())->getMpAdminAuth($token->component_access_token,'name',1);
//$weChat = new WeChatServer(TrialApplet::class);
//$object = $weChat->getInstance();
//var_dump($object->getMpAdminAuth($token->component_access_token,'name',1));
//var_dump($weChat->exec("getMpAdminAuth",[$token->component_access_token,'name',1]));
//$template = new AppletTemplate();
//$list = $template->getTemplateDraftList($component_access_token);
//$add = $template->addToTemplate($component_access_token,1);
//var_dump($add);
//$member = new AppletMember();
//var_dump($member->memberAuth($authorizer_access_token));
//$code = new AppletCode();
//file_put_contents("qrcode.png",$code->getQrCode($authorizer_access_token,'page/index'));
//$info = new AppletBasicInformation();
//var_dump($info->checkWxVerifyNickname($authorizer_access_token,'get'));
//var_dump($info->fetchDataSetting($authorizer_access_token,'set_pre_fetch'));
//$ViolationsAndComplaints = new IllegalAndAppeal();
//var_dump($ViolationsAndComplaints->getIllegalRecords($authorizer_access_token));
//var_dump($ViolationsAndComplaints->getAppealRecords($authorizer_access_token,1212));

//$QrCode = new QrCode();
//var_dump($QrCode->getWxaCode($authorizer_access_token,'page/index',430,false,null,false));
//var_dump($QrCode->createWxaQrCode($authorizer_access_token,'/pages/loading/index'));
//$TrialApplet = new TrialApplet();
//var_dump($TrialApplet->fastRegisterBetaWeapp($component_access_token,'parise',"ogBjd4ptPLq2hk6tDNp5WYWuXfz0"));
//"nDlRY11GrqojVvt-174UGych9SiyCPbiruQr_Uj_JBoRzTm2UJpIMTx5Dl_cVt7s"
//$ConcernComponent = new ConcernComponent();
//var_dump($ConcernComponent->getWxaMpLinkForShow($authorizer_access_token,0,20));
//$AppletCategory = new \WeChat\library\AppletCategory();
//var_dump($AppletCategory->getHasBeenSetCategory($authorizer_access_token));

//var_dump($AppletCategory->getCategoriesByType($authorizer_access_token,1));
//var_dump($AppletCategory->getCategory($authorizer_access_token));
//var_dump((new AppletCode())->release($authorizer_access_token));


//消息与事件接收
$msg = "<xml>
    <ToUserName><![CDATA[gh_bb2cfe4d43a7]]></ToUserName>
    <Encrypt><![CDATA[2Z8Ncq5FXKBdH67EJWpvFjTjU4BftvY8zOniymwJeIVaAo8QtjYVHMaouyhOSYaFZBv2rM87OfFdSMA0a9d0e9GOD3TVHBw/Xabk/HWfokSyVKHPh0PrS+JwDtjYV4efd3nbDxCWT7HK0xPtcToPN+YANDMuJlgNCIf77KpwfO3BK3p6oO86plMh1YnnCh/ShWAusf5+uxJPclZkQNCnqFH41tAe7rFlq8IaugKR90wbLkJV4FXDdovTa3EYm9MnFd6JqzGi4CTgoM1Jidcz/I7+AYltDyj8XTGMMB4avP5GVq2+VLdiLYDuWBdpMossgcO9Ncu5AKxKt7tSL1nlrqxiuN9i2Ife0/P4YkbhFjJi7untLvVdTwbeT27zrBsDpXm7GOmogfNgRRrjnmfNenqnMUlLElKDH2gowHU4fPyAxMPLzY3X5siuUASWwE5F9+jTRYhIR2HcFfnkHgQm1Q==]]></Encrypt>
</xml>";
$msg_signature  ="f08306c1581fcb4294245164b07cc7bb49d9f8ba";
$nonce  ="520854575";
$timestamp ="1623292982";
$ticket = $object->getMessagesAndEvents($msg_signature, $timestamp, $nonce, $msg);
var_dump($ticket);



