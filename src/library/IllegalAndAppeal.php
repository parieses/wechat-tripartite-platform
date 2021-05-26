<?php

namespace WeChat\library;

use WeChat\UrlConfig;

/**
 * 小程序成员管理
 * Class AppletMember
 * @package WeChat\library
 */
class  IllegalAndAppeal

{
    use Initialize;

    public function __construct()
    {
        $this->initializeCurl();
    }

    /**
     * 获取小程序违规处罚记录
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getIllegalRecords
     * status:
     * User: Mr.liang
     * Date: 2021/5/26
     * Time: 9:19
     * Email:1695699447@qq.com
     * @param      $access_token :第三方平台接口调用令牌authorizer_access_token
     * @param null $start_time   :查询时间段的开始时间，如果不填，则表示end_time之前90天内的记录
     * @param null $end_time     :查询时间段的结束时间，如果不填，则表示start_time之后90天内的记录
     * @return mixed
     */
    public function getIllegalRecords($access_token, $start_time = null, $end_time = null)
    {
        return $this->curl->post(UrlConfig::getIllegalRecords . $access_token, json_encode(['start_time' => $start_time, 'end_time' => $end_time]));
    }

    public function getAppealRecords($access_token, $illegal_record_id)
    {
        return $this->curl->post(UrlConfig::getAppealRecords . $access_token, json_encode(['illegal_record_id' => $illegal_record_id]));
    }

}