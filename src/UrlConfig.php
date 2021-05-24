<?php


namespace WeChat;


class UrlConfig
{
    public const baseUrl = 'https://api.weixin.qq.com';
    //令牌
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


    //创建开放平台帐号并绑定公众号/小程序
    public const create = self::baseUrl . "/cgi-bin/open/create?access_token=";
    //将公众号/小程序绑定到开放平台帐号下
    public const bind = self::baseUrl . "/cgi-bin/open/bind?access_token=";
    //将公众号/小程序从开放平台帐号下解绑
    public const unbind = self::baseUrl . "/cgi-bin/open/unbind?access_token=";
    //获取公众号/小程序所绑定的开放平台帐号
    public const get = self::baseUrl . "/cgi-bin/open/get?access_token=";


    //创建试用小程序
    public const fastRegisterBetaWeapp = self::baseUrl . "/wxa/component/fastregisterbetaweapp?access_token=";
    //试用小程序快速认证
    public const verifyBetaWeapp = self::baseUrl . "/wxa/verifybetaweapp?access_token=";
    //修改试用小程序名称
    public const setBetaWeappNickName = self::baseUrl . "/wxa/setbetaweappnickname?access_token=";
    //获取公众号管理员授权
    public const getMpAdminAuth= self::baseUrl . "/wxa/getmpadminauth?access_token=";
    //
    public const mpVerifyBetaWeapp= self::baseUrl ."/wxa/mpverifybetaweapp?access_token=";
}