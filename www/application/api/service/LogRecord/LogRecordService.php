<?php

namespace app\api\service\LogRecord;

use app\api\controller\lib\DTOReportRecord;
use app\api\model\LogRecord;

class LogRecordService
{
    /**
     * 记录客户端上报日志
     *
     * @param DTOReportRecord $dto
     */
    public static function recordByReportRecord(DTOReportRecord $dto)
    {
        $log_record_arr = $dto->toArray();
        $log_record_arr['error_stack'] = json_encode($log_record_arr['error_stack']);
        $log_record_arr['client_screen_size'] = join(',', $log_record_arr['client_screen_size']);

        LogRecord::create($log_record_arr);
    }
}