<?php


use WeChat\library\Authorization;
use WeChat\library\OpenPlatform;
use WeChat\library\TrialApplet;
use WeChat\WeChatServer;

require __DIR__ . '/vendor/autoload.php';

  function generate($ToUserName, $FromUserName, $Content, $MsgType = 'text')
{
	$format = "<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[%s]]></Content></xml>";
	return sprintf($format, $ToUserName, $FromUserName, time(), $Content);
}



$componentAppId = 'wx108c9cc5a36ef1b0';
$componentAppSecret = '10cbbc0b28fa9dee578b8bf0f2696e48';
//消息校验Token
$token = 'henanwaifu';
//消息加解密Key
$encodingAesKey = '1CD37E73D5D74B439A167DE3014FD882521XINGFULI';
$xml = generate('admin', 'admin', 'hello world');

$model = new \WeChat\library\OtherApplet();
$data = ['action'=>'list','plugin_appid'=>'wxfd41bbd0f83ffe83','reason'=>'1231313'];
$a = $model->plugin("76_ndpkppYEDzfu2eUDQ_ev-xcaeMnTbdQZYc4Iyn2k8xk2YaTh-f5EueQX94mDh7bxxi5mZSUy9AGZetf8I1XRxfbAvT7DbY4jNJ1NqCuv9ezkL_yCoFhexG9XNgJbziD4TZ1f2tk7kWK0EeA8RGNgAEDZOV",$data);
var_dump($a);die();
//$weChat = new WeChatServer(Authorization::class, ['componentAppId' => $componentAppId, 'componentAppSecret' => $componentAppSecret, 'token' => $token, 'encodingAesKey' => $encodingAesKey]);
//$data = ['ticket' => 'znki2rGXe30AWTWliIrpKBVxUNf-TOQQ-54RQrXqdCULxUOtlxksDlk0batVSuzL75xvz-cbpOnKPK1tlXsqqw'];
//var_dump($weChat->exec('getComponentAccessToken',$data));
//获取要操作的类
//$object        = $weChat->getInstance();
$model  = new  TrialApplet();
//$a = $model->fastregisterweapp("76_8reKfRPg0lc6sKUlFjrLrsRduBB62AiDoka7MnMomWIYpDOzzdXfIGmu_2hqro0m_oyfNcbjbBvcnZTDG5cCc4cxd7f5l9bxqOoQFj9DG6lChapbg7Kx23L0ZBQZXFbACAMKS",$data,'search');
$a  = $model->fastregister("76_8reKfRPg0lc6sKUlFjrLrsRduBB62AiDoka7MnMomWIYpDOzzdXfIGmu_2hqro0m_oyfNcbjbBvcnZTDG5cCc4cxd7f5l9bxqOoQFj9DG6lChapbg7Kx23L0ZBQZXFbACAMKS",'2133333333333333333333333333');

$data = ['idname'=>'王亮亮','wxuser'=>"pariese","component_phone"=>"13611111111"];

$a  = $model->fastregisterpersonalweapp("76_8reKfRPg0lc6sKUlFjrLrsRduBB62AiDoka7MnMomWIYpDOzzdXfIGmu_2hqro0m_oyfNcbjbBvcnZTDG5cCc4cxd7f5l9bxqOoQFj9DG6lChapbg7Kx23L0ZBQZXFbACAMKS",$data);

var_dump($a);die();
//var_dump($object->encryptMsg($xml,time(),'123132'));die();
//$apiStartPushTicket = $object->apiStartPushTicket();
//通过ticket 获取 获取令牌
//$token = $object->apiComponentToken($data['ticket']);
//$component_access_token = "45_Ioxv51SCbMFM79FvqZ180l90ipZ3obFwp0AWKGvGamMKSym4iqlrw_1SeTVySyE-T84ksq1b_mdofWCxLFxERG4s44dxBv_Y6KwTm2MUTlFI7R-vxkHxwvo4zJZ78kdvYntdC0OSHCDLNjgmXHVaABATDR";//$token->component_access_token;
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
//$authorization_code = "tWaDFthTreq9M7jKOsrLhJycVkPZ1vcLqQRzJkUnxAAABqkb_RQAdsO0e8h6u5eFSIKjbkY0ini78kwcqxXnJA";
//使用授权码获取授权信息
//$apiQueryAuth = $object->apiQueryAuth($component_access_token,$authorization_code);
//var_dump($apiQueryAuth);die;
//授权方 appid
//$authorizer_appid = $apiQueryAuth->authorization_info->authorizer_appid;
//接口调用令牌（在授权的公众号/小程序具备 API 权限时，才有此返回值）
//$authorizer_access_token  = $apiQueryAuth->authorization_info->authorizer_access_token;
//var_dump($authorizer_access_token);die();
//$authorizer_access_token = "45_QdBqJ_KzrBjKfyZFj_inVDkSkMqAi2jbtQ025h5PLZNPz29J_srWAaQTN0nXziRi3KwVmFyAQTGqSmCZ4aPieJOw4IoZun3PvzsiYydnF-Sr0vC91LP9E9wM2LekM6WqEVzmivyOs7N2P-o4QYLjAIDDLY";
//刷新令牌（在授权的公众号具备API权限时，才有此返回值），刷新令牌主要用于第三方平台获取和刷新已授权用户的 authorizer_access_token。一旦丢失，只能让用户重新授权，才能再次拿到新的刷新令牌。用户重新授权后，之前的刷新令牌会失效
//$authorizer_refresh_token = "oZrs5Gaw7ULyRGfCvlFgIbkclJPARh3B3cAr5VRubmE";                                                                                                                //$apiQueryAuth->authorization_info->authorizer_refresh_token;
//通过刷新令牌 刷新接口调用令牌
//$apiAuthorizerToken = $object->apiAuthorizerToken($component_access_token,"wx90721efca5d2c575",$authorizer_refresh_token);
//var_dump($apiAuthorizerToken);die();
//获取授权方帐号信息
//$component_access_token = "51_NPnBX4awLqwQMAS9UU47Pz8t2xVI32le2DhBxz8BmbZ1izLsADlUL_5zQln38IChodURlDp_mPaSq96x7WXJYl917aawfgUDLLCjCnLLw4Gf-f2ydUirL78daAG4H48AQJq_LthkIHSuHRVLKCZcACAXPM";
//$apiGetAuthorizerInfo = $object->apiGetAuthorizerInfo($component_access_token,'wx101f057502df92fe');
//var_dump($apiGetAuthorizerInfo);die();
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
//$msg = "<xml>
//    <ToUserName><![CDATA[gh_bb2cfe4d43a7]]></ToUserName>
//    <Encrypt><![CDATA[2Z8Ncq5FXKBdH67EJWpvFjTjU4BftvY8zOniymwJeIVaAo8QtjYVHMaouyhOSYaFZBv2rM87OfFdSMA0a9d0e9GOD3TVHBw/Xabk/HWfokSyVKHPh0PrS+JwDtjYV4efd3nbDxCWT7HK0xPtcToPN+YANDMuJlgNCIf77KpwfO3BK3p6oO86plMh1YnnCh/ShWAusf5+uxJPclZkQNCnqFH41tAe7rFlq8IaugKR90wbLkJV4FXDdovTa3EYm9MnFd6JqzGi4CTgoM1Jidcz/I7+AYltDyj8XTGMMB4avP5GVq2+VLdiLYDuWBdpMossgcO9Ncu5AKxKt7tSL1nlrqxiuN9i2Ife0/P4YkbhFjJi7untLvVdTwbeT27zrBsDpXm7GOmogfNgRRrjnmfNenqnMUlLElKDH2gowHU4fPyAxMPLzY3X5siuUASWwE5F9+jTRYhIR2HcFfnkHgQm1Q==]]></Encrypt>
//</xml>";
//$msg_signature  ="f08306c1581fcb4294245164b07cc7bb49d9f8ba";
//$nonce  ="520854575";
//$timestamp ="1623292982";
//$ticket = $object->getMessagesAndEvents($msg_signature, $timestamp, $nonce, $msg);
//var_dump($ticket);


//$str = (new OtherApplet)->jsCode2session('wx90721efca5d2c575','071eHDFa1cJqcB0FITHa1LB1Xm3eHDFo',$componentAppId,'45_fjn9bblV-YwDfDV3bpu2nfXFLetpNbCwnSMHFUi1L0XAFxx76HpQ3Wgn0zJj6vL23kjWO5olbdgPRnXv67sd8-eTVnf7ixnap-Nzk8VrZfLlUXTHkMXlRsAkT91A_xMVck-zSoYEnwjtWP8pVHFjACAGSQ');
//var_dump($str);

//$otherApplet = new OtherApplet();
//$token = '45_TjkPHTCbFNd6l2kPefHIMbJ60coqnA1NdQn2303bXnoeSGhIPPlBrPPddzBs2C7t6LB5yZALdBjoCFP25aJj_xY6O4L29QnruuZpZwbx2303zKvD5kcCj9bM3aHSQozV6eqXmyZ_Ed2yYvWxOTZdADDXCI';
//$generateUrlLink = $otherApplet->generateUrlLink('45_TjkPHTCbFNd6l2kPefHIMbJ60coqnA1NdQn2303bXnoeSGhIPPlBrPPddzBs2C7t6LB5yZALdBjoCFP25aJj_xY6O4L29QnruuZpZwbx2303zKvD5kcCj9bM3aHSQozV6eqXmyZ_Ed2yYvWxOTZdADDXCI','','',1,0,1);
//var_dump($generateUrlLink);
//$generateScheme = $otherApplet->generateScheme();
//var_dump($generateScheme);
//var_dump($otherApplet->subscribeMessageGetCategory($token));
//var_dump($otherApplet->getPubTemplateTitles($token,682));
//var_dump($otherApplet->getPubTemplateKeywords($token,3382));
//var_dump($otherApplet->getTemplate($token));


//生成平台证书
//$save = Pay::certificates("LOrBEvDQQJw4S8EKpFfzYCsualLVN2mB","1485481822",'45CA445043E4A0C26C6870AA33833AFEAFD2407D',"./cert/apiclient_key.pem");
//var_dump($save);die();


//$instance = Pay::getV3Instance('1485481*822','file://cert/apiclient_key.pem',Pay::parseCertificateSerialNo('file://cert/apiclient_cert.pem'),'file://cert/wechatpay_590B78D5500D74E84E465951DA0059F2030B97B8***.pem');
//
//try {
//    $resp = $instance
//        ->v3->pay->transactions->jsapi
//        ->post(
//            [
//                'json' => [
//                    "appid" => "wx101f057502df92fe",
//                    "mchid" => "1485481822",
//                    "out_trade_no" => "1217752501201407033233368318",
//                    "description" => "Image形象店-深圳腾大-QQ公仔",
//                    "notify_url" => "http://saas.merchant.xingfufit.cn/notify/wechat",
//                    "amount" => [
//                        "total" => 1,
//                        "currency" => "CNY"
//                    ],
//                    "payer" => [
//                        "openid" => "oqyTm5QGCGMJZ7_uqjvwH4AeN6L4"
//                    ]
//                ]
//            ]
//        );
////    echo $resp->getHeader();
////    echo $resp->getStatusCode(), PHP_EOL;
//    echo $resp->getBody(), PHP_EOL;
//} catch (\Exception $e) {
////    // 进行错误处理
//    echo $e->getMessage(), PHP_EOL;
//    if ($e instanceof \GuzzleHttp\Exception\RequestException && $e->hasResponse()) {
//        $r = $e->getResponse();
//        echo $r->getStatusCode() . ' ' . $r->getReasonPhrase(), PHP_EOL;
//        echo $r->getBody(), PHP_EOL, PHP_EOL, PHP_EOL;
//    }
//    echo $e->getTraceAsString(), PHP_EOL;
//}
//$component_access_token = "-bvYJxr_DYqWzq8xZQfNFplfMDDbw6UP0ByvKR_xqcsxMEsm3ATjVwfg3uyNCdwfnm9VdFi69VbyVqgX1bXbJuAUc3PYA6MHEIzWzomnX_9H6BMNeAHDOZA";
////$open = new OpenApi();
////var_dump($open->getQuota($component_access_token,'/cgi-bin/message/custom/send'));
//
//$privacy = new Privacy();
////var_dump($privacy->getPrivacySetting($component_access_token));
////var_dump($privacy->uploadPrivacyextFile($component_access_token,'./Test.txt'));
//$owner_setting = ['contact_qq'=>1695699447,'notice_method'=>'notice_method'];
//var_dump($privacy->setPrivacySetting($component_access_token,$owner_setting));
//
//$remoteFileUrl = 'https://view.yuanqianht.com/piao/2022/09/24/796fc9aa40e0fe82ee7fc44a6f7b339e.png';
//$file_path = './1.png';
//file_put_contents($file_path, file_get_contents($remoteFileUrl));
//$other = new OtherApplet();
//$data = $other->mediaUploadImage("68_z6vPtUDlyk1mBhKo6SV5dwOdKUD7AuA0bkTF-V-J2-SvB7eg3xIXCHz60Dy__-Rx1HYL5uvKXvcJ3hCkb_io5AaZvHM4d_DfTJvKfSAjVKiZ44HfPWA5-qGW6pEFUhOfRcd8YjIdu-5nCrT-IGTcAIDBZM", $file_path);
//var_dump($data);
//unlink($file_path);
$OpenPlatform = new OpenPlatform();

//$da = $OpenPlatform->modifyThirdpartyServerDomain('68_6eRWb9z9DrPtic8_cBWsBZCyZ81pqPYD3vcUrZ6-QI2ZsDTS5dPf0FZryIi1Fu6WXUSX-nJC36U4ZneVvsfM39w672CmADD972wHmNd3EXGJMOOGpEw77KIjiMUMDEaAHAXOP','get');
//$da = $OpenPlatform->modifyThirdpartyJumpDomain('68_6eRWb9z9DrPtic8_cBWsBZCyZ81pqPYD3vcUrZ6-QI2ZsDTS5dPf0FZryIi1Fu6WXUSX-nJC36U4ZneVvsfM39w672CmADD972wHmNd3EXGJMOOGpEw77KIjiMUMDEaAHAXOP','get');
//var_dump($da);


//上传提审素材
//$remoteFileUrl = 'https://view.yuanqianht.com/piao/2022/09/24/796fc9aa40e0fe82ee7fc44a6f7b339e.png';
//$file_path = './1.png';
//file_put_contents($file_path, file_get_contents($remoteFileUrl));
//$data = new \WeChat\library\AppletCode();
$token = "68__nFxILy6RGBvj0mr2xt0f6mrCKC-5V4x2Q4aFZSP66ilpCpE3Fv11_DiB-19hhpofxCwDY90KSy8uNrZo7xMCLUwUyqF526kYiSc8atuAyoMDMJBGspX0ugXsnENrakjagiOtEh4oSMMpZxmDRLcADDJXR";
//var_dump($data->uploadMediaToCodeAudit($token, $file_path));
//获取隐私接口检测结果
$data = new \WeChat\library\We();
//var_dump($data->getCodePrivacyInfo($token));
var_dump($data->weDataLogin($token,'1',1,'127.0.0.4','12'));