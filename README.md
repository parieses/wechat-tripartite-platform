  <h1 align="center">PHP的微信第三方平台扩展库</h1>
  
  
 此为基于微信官方文档进行封装使用 
  ```shell script
 composer require liang/wechat-tripartite-platform
 ```

 [官方文档](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/getting_started/how_to_read.html)
 
 [返回码快速查找](https://developers.weixin.qq.com/doc/oplatform/Return_codes/Return_code_descriptions_new.html)
 
 DIRECTORY STRUCTURE
 -------------------
 ```
src
    library          
```

[部分接口未测试可提issues](https://github.com/parieses/wechat-tripartite-platform)

路由统一管理文件:UrlConfig

#### 目前集成模块
[开放平台接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/account/create.html)
library下OpenPlatform

[授权相关接口|授权方账号管理接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/component_verify_ticket.html)
library下Authorization

[小程序模板接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/code_template/gettemplatedraftlist.html)
library下AppletTemplate

[小程序成员管理接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_AdminManagement/Admin.html)
library下AppletMember

[小程序代码管理接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/commit.html)
library下AppletCode

[小程序基础信息设置接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/Mini_Program_Information_Settings.html)
library下AppletBasicInformation

[违规和申诉管理](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/records/getillegalrecords.html)
library下IllegalAndAppeal

[普通链接二维码与小程序码](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/qrcode/qrcodejumpget.html)
library下QrCode.php

[扫码关注组件](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/subscribe_component/subscribe_component.html)
library下ConcernComponent


[小程序类目管理接口](https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/getallcategories.html)
library下AppletCategory

-使用方法课参见Test Receive TestCallBack 可统一由WeChatServer进行调用也可单独调用