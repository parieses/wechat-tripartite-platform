<?php


namespace WeChat;


class UrlConfig
{
    public const baseUrl = 'https://api.weixin.qq.com';
    /**
     * openApi管理
     */
    //清空api的调用quota
    public const clearQuota = self::baseUrl . "/cgi-bin/clear_quota?access_token=";
    //查询openAPI调用quota
    public const getQuota = self::baseUrl . "/cgi-bin/openapi/quota/get?access_token=";
    //查询rid信息
    public const getRid = self::baseUrl . "/cgi-bin/openapi/rid/get?access_token=";

    /**
     * 小程序用户隐私保护指引
     */
    //设置小程序用户隐私保护指引
    public const setPrivacySetting = self::baseUrl ."/cgi-bin/component/setprivacysetting?access_token=";
    //查询小程序用户隐私保护指引
    public const getPrivacySetting = self::baseUrl ."/cgi-bin/component/getprivacysetting?access_token=";
    //上传小程序用户隐私保护指引
    public const uploadPrivacyextFile = self::baseUrl ."/cgi-bin/component/uploadprivacyextfile?access_token=";

    /**
     * 授权相关接口|授权方账号管理接口
     */
    //启动ticket推送服务
    public const apiStartPushTicket = self::baseUrl . "/cgi-bin/component/api_start_push_ticket";
    //获取令牌
    public const apiComponentToken = self::baseUrl . '/cgi-bin/component/api_component_token';
    //获取授权码
    public const apiCreatePreauthcode = self::baseUrl . "/cgi-bin/component/api_create_preauthcode?component_access_token=";
    //使用授权码获取授权信息
    public const apiQueryAuth = self::baseUrl . "/cgi-bin/component/api_query_auth?component_access_token=";
    //获取/刷新接口调用令牌
    public const apiAuthorizerToken = self::baseUrl . '/cgi-bin/component/api_authorizer_token?component_access_token=';
    //获取授权方帐号信息
    public const apiGetAuthorizerInfo = self::baseUrl . "/cgi-bin/component/api_get_authorizer_info?component_access_token=";
    //拉取所有已授权的帐号信息
    public const api_get_authorizer_list = self::baseUrl . "/cgi-bin/component/api_get_authorizer_list?component_access_token=";
    //获取授权方选项信息
    public const api_get_authorizer_option = self::baseUrl . "/cgi-bin/component/api_get_authorizer_option?component_access_token=";
    //设置授权方选项信息
    public const api_set_authorizer_option = self::baseUrl . "/cgi-bin/component/api_set_authorizer_option?component_access_token=";


    //构建PC端授权链接的方法
    public const componentLoginPage = "https://mp.weixin.qq.com/cgi-bin/componentloginpage";
    //构建移动端授权链接的方法
    public const bindComponent = "https://mp.weixin.qq.com/safe/bindcomponent";


    /**
     * 开放平台接口
     */
    //创建开放平台帐号并绑定公众号/小程序
    public const create = self::baseUrl . "/cgi-bin/open/create?access_token=";
    //将公众号/小程序绑定到开放平台帐号下
    public const bind = self::baseUrl . "/cgi-bin/open/bind?access_token=";
    //将公众号/小程序从开放平台帐号下解绑
    public const unbind = self::baseUrl . "/cgi-bin/open/unbind?access_token=";
    //获取公众号/小程序所绑定的开放平台帐号
    public const get = self::baseUrl . "/cgi-bin/open/get?access_token=";


    /**
     * 试用小程序
     */
    //创建试用小程序
    public const fastRegisterBetaWeapp = self::baseUrl . "/wxa/component/fastregisterbetaweapp?access_token=";
    //试用小程序快速认证
    public const verifyBetaWeapp = self::baseUrl . "/wxa/verifybetaweapp?access_token=";
    //修改试用小程序名称
    public const setBetaWeappNickName = self::baseUrl . "/wxa/setbetaweappnickname?access_token=";
    //获取公众号管理员授权
    public const getMpAdminAuth = self::baseUrl . "/wxa/getmpadminauth?access_token=";
    //复用公众号主体认证小程序
    public const mpVerifyBetaWeapp = self::baseUrl . "/wxa/mpverifybetaweapp?access_token=";


    /**
     * 小程序模板接口
     */
    //获取代码草稿列表
    public const  getTemplateDraftList = self::baseUrl . "/wxa/gettemplatedraftlist?access_token=";
    //将草稿添加到代码模板库
    public const addToTemplate = self::baseUrl . "/wxa/addtotemplate?access_token=";
    //获取代码模板列表
    public const getTemplateList = self::baseUrl . "/wxa/gettemplatelist?access_token=";
    //删除指定代码模板
    public const deleteTemplate = self::baseUrl . "/wxa/deletetemplate?access_token=";


    /**
     * 小程序成员管理接口
     */
    //绑定微信用户为体验者
    public const bindTester = self::baseUrl . "/wxa/bind_tester?access_token=";
    //解除绑定体验者
    public const unbindTester = self::baseUrl . "/wxa/unbind_tester?access_token=";
    //获取体验者列表
    public const memberAuth = self::baseUrl . "/wxa/memberauth?access_token=";


    /**
     * 小程序代码管理接口
     */
    //上传小程序代码
    public const commit = self::baseUrl . "/wxa/commit?access_token=";
    //获取已上传的代码的页面列表
    public const getPage = self::baseUrl . "/wxa/get_page?access_token=";
    //获取体验版二维码
    public const getQrCode = self::baseUrl . "/wxa/get_qrcode?access_token=";
    //提交审核
    public const submitAudit = self::baseUrl . "/wxa/submit_audit?access_token=";
    //查询指定发布审核单的审核状态
    public const getAuditStatus = self::baseUrl . "/wxa/get_auditstatus?access_token=";
    //查询最新一次提交的审核状态
    public const getLatestAuditStatus = self::baseUrl . "/wxa/get_latest_auditstatus?access_token=";
    //小程序审核撤回
    public const undoCodeAudit = self::baseUrl . "/wxa/undocodeaudit?access_token=";
    //发布已通过审核的小程序
    public const release = self::baseUrl . "/wxa/release?access_token=";
    //版本回退
    public const revertCodeRelease = self::baseUrl . "/wxa/revertcoderelease?access_token=";
    //分阶段发布
    public const grayRelease = self::baseUrl . "/wxa/grayrelease?access_token=";
    //查询当前分阶段发布详情
    public const getGrayReleasePlan = self::baseUrl . "/wxa/getgrayreleaseplan?access_token=";
    //取消分阶段发布
    public const revertGrayRelease = self::baseUrl . "/wxa/revertgrayrelease?access_token=";
    //修改小程序服务状态
    public const changeVisitStatus = self::baseUrl . "/wxa/change_visitstatus?access_token=";
    //查询当前设置的最低基础库版本及各版本用户占比
    public const getWeappSupportVersion = self::baseUrl . "/cgi-bin/wxopen/getweappsupportversion?access_token=";
    //设置最低基础库版本
    public const setWeappSupportVersion = self::baseUrl . "/cgi-bin/wxopen/setweappsupportversion?access_token=";
    //查询服务商的当月提审限额（quota）和加急次数
    public const queryQuota = self::baseUrl . "/wxa/queryquota?access_token=";
    //加急审核申请
    public const speedUpAudit = self::baseUrl . "/wxa/speedupaudit?access_token=";


    /**
     * 小程序基础信息设置接口
     */
    //获取基本信息
    public const getAccountBasicInfo = self::baseUrl . "/cgi-bin/account/getaccountbasicinfo?access_token=";
    //设置服务器域名
    public const modifyDomain = self::baseUrl . "/wxa/modify_domain?access_token=";
    //设置业务域名
    public const setWebViewDomain = self::baseUrl . "/wxa/setwebviewdomain?access_token=";
    //设置名称
    public const setNickname = self::baseUrl . "/wxa/setnickname?access_token=";
    //微信认证名称检测
    public const checkWxVerifyNickname = self::baseUrl . "/cgi-bin/wxverify/checkwxverifynickname?access_token=";
    //查询改名审核状态
    public const apiWxaQueryNickname = self::baseUrl . "/wxa/api_wxa_querynickname?access_token=";
    //修改头像
    public const modifyHeadImage = self::baseUrl . "/cgi-bin/account/modifyheadimage?access_token=";
    //修改功能介绍
    public const modifySignature = self::baseUrl . "/cgi-bin/account/modifysignature?access_token=";
    //查询隐私设置
    public const getWxaSearchStatus = self::baseUrl . "/wxa/getwxasearchstatus?access_token=";
    //修改隐私设置
    public const changeWxaSearchStatus = self::baseUrl . "/wxa/changewxasearchstatus?access_token=";
    //获取数据拉取配置|设置预拉取数据|设置周期性拉取数据
    public const fetchDataSetting = self::baseUrl . "/wxa/fetchdatasetting?access_token=";


    //获取小程序违规处罚记录
    public const getIllegalRecords = self::baseUrl . "/wxa/getillegalrecords?access_token=";
    //获取小程序申诉记
    public const getAppealRecords = self::baseUrl . "/wxa/getappealrecords?access_token=";


    /**
     * 普通链接二维码与小程序码
     */
    //获取已设置的二维码规则
    public const qrCodeJumpGet = self::baseUrl . "/cgi-bin/wxopen/qrcodejumpget?access_token=";
    //获取校验文件名称及内容
    public const qrCodeJumpDownload = self::baseUrl . "/cgi-bin/wxopen/qrcodejumpdownload?access_token=";
    //增加或修改二维码规则
    public const qrCodeJumpAdd = self::baseUrl . "/cgi-bin/wxopen/qrcodejumpadd?access_token=";
    //发布已设置的二维码规则
    public const qrCodeJumpPublish = self::baseUrl . "/cgi-bin/wxopen/qrcodejumppublish?access_token=";
    //删除已设置的二维码规则
    public const qrCodeJumpDelete = self::baseUrl . "/cgi-bin/wxopen/qrcodejumpdelete?access_token=";
    //将二维码长链接转成短链接
    public const shortUrl = self::baseUrl . "/cgi-bin/shorturl?access_token=";
    //获取unlimited小程序码
    public const getWxaCodeUnLimit = self::baseUrl . "/wxa/getwxacodeunlimit?access_token=";
    //获取小程序码
    public const getWxaCode = self::baseUrl . "/wxa/getwxacode?access_token=";
    //获取小程序二维码
    public const createWxaQrCode = self::baseUrl . "/cgi-bin/wxaapp/createwxaqrcode?access_token=";


    /**
     * 扫码关注组件
     */
    //获取展示的公众号信息
    public const getShowWxaItem = self::baseUrl . "/wxa/getshowwxaitem?access_token=";
    //获取可以用来设置的公众号列表
    public const getWxaMpLinkForShow = self::baseUrl . "/wxa/getwxamplinkforshow?access_token=";
    //设置展示的公众号信息
    public const updateShowWxaItem = self::baseUrl . "/wxa/updateshowwxaitem?access_token=";

    /**
     * 小程序类目管理接口
     */
    //获取可以设置的所有类目
    public const getAllCategories = self::baseUrl . "/cgi-bin/wxopen/getallcategories?access_token=";
    //获取已设置的所有类目
    public const getHasBeenSetCategory = self::baseUrl . "/cgi-bin/wxopen/getcategory?access_token=";
    //获取不同主体类型的类目
    public const getCategoriesByType = self::baseUrl . "/cgi-bin/wxopen/getcategoriesbytype?access_token=";
    //添加类目
    public const addCategory = self::baseUrl . "/cgi-bin/wxopen/addcategory?access_token=";
    //删除类目
    public const deleteCategory = self::baseUrl . "/cgi-bin/wxopen/deletecategory?access_token=";
    //修改类目资质信息
    public const modifyCategory = self::baseUrl . "/cgi-bin/wxopen/modifycategory?access_token=";
    //获取审核时可填写的类目信息
    public const getCategory = self::baseUrl . "/wxa/get_category?access_token=";

    /**
     * 其他小程序相关接口
     */
    //小程序登录
    public const jsCode2session = self::baseUrl . '/sns/component/jscode2session?appid=%1$s&js_code=%2$s&grant_type=authorization_code&component_appid=%3$s&component_access_token=%4$s';
    //支付后获取用户 Unionid 接口 微信订单号
    public const getPaidUnionIdOne = self::baseUrl . '/wxa/getpaidunionid?access_token=%1$s&openid=%2$s&transaction_id=%3$s';
    //支付后获取用户 Unionid 接口 商户订单号：
    public const getPaidUnionIdTwo = self::baseUrl . '/wxa/getpaidunionid?access_token=%1$s&openid=OPENID&mch_id=%3$s&out_trade_no=%4$s';
    /**
     * 其他小程序业务接口
     */
    //获取 URL Link
    public const generateUrlLink = self::baseUrl . "/wxa/generate_urllink?access_token=";
    //获取小程序scheme码
    public const generateScheme = self::baseUrl . "/wxa/generatescheme?access_token=";
    //订阅消息-获取当前帐号所设置的类目信息
    public const subscribeMessageGetCategory = self::baseUrl . "/wxaapi/newtmpl/getcategory?access_token=";
    //订阅消息-获取模板标题列表
    public const getPubTemplateTitles = self::baseUrl . '/wxaapi/newtmpl/getpubtemplatetitles?access_token=%1$s&ids=%2$s&start=%3$s&limit=%4$s';
    //订阅消息-获取模板标题下的关键词库
    public const getPubTemplateKeywords = self::baseUrl . '/wxaapi/newtmpl/getpubtemplatekeywords?access_token=%1$s&tid=%2$s';
    //订阅消息-组合模板并添加到个人模板库
    public const addTemplate = self::baseUrl . '/wxaapi/newtmpl/addtemplate?access_token=';
    //订阅消息-获取帐号下的模板列表
    public const getTemplate = self::baseUrl . '/wxaapi/newtmpl/gettemplate?access_token=';
    //订阅消息-删除帐号下的某个模板
    public const delTemplate = self::baseUrl . '/wxaapi/newtmpl/deltemplate?access_token=';
    //订阅消息-发送订阅消息
    public const send = self::baseUrl . '/cgi-bin/message/subscribe/send?access_token=';
    //客服消息-发送消息
    public const customerMessageSend = self::baseUrl . '/cgi-bin/message/custom/send?access_token=';
    //客服消息-获取客服输入状态
    public const customerMessageSetTyping = self::baseUrl . '/cgi-bin/message/custom/typing?access_token=';
    //客服消息-获取客服消息内的临时素材
    public const customerMessageGetTempMedia = self::baseUrl . '/cgi-bin/message/custom/typing?access_token=%1$s&media_id=%2$s';


}