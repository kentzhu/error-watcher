<?php

namespace app\api\event;

use app\api\controller\lib\DTOReportRecord;
use app\api\service\LogRecord\LogRecordService;

/**
 * 客户端上报 相关事件
 *
 * @package app\api\event
 */
class ClientReportEvent
{
    /**
     * 客户端上报了单条日志
     *
     * @param DTOReportRecord $record
     */
    public static function SingleRecordReported(DTOReportRecord $record)
    {
        LogRecordService::recordByReportRecord($record);
    }
}