<?php

namespace app\api\controller;

use app\api\controller\lib\ApiBaseController;
use app\api\controller\lib\DTOReportRecord;
use app\api\event\ClientReportEvent;

class Report extends ApiBaseController
{
    /**
     * 前端日志上报接口
     *
     * @return \think\Response
     */
    public function record()
    {
        $record = DTOReportRecord::instance();

        $record->setServerReceiveTimestamp(microtime(true));

        $record->setClientAddr($this->clientAddr());
        $record->setClientUserAgent($this->clientUserAgent());
        $record->setClientTimestamp($this->apiPayloadParam('ct', 0.0, 'float'));
        $record->setClientScreenSizeByCompressedRaw($this->apiPayloadParam('css'));
        $record->setClientUrl($this->apiPayloadParam('cu', ''));
        $record->setClientReferrer($this->apiPayloadParam('cr', ''));
        $record->setClientInitCode($this->apiPayloadParam('cic', ''));
        $record->setClientReportCode($this->apiPayloadParam('crc', ''));

        $record->setErrorMessage($this->apiPayloadParam('em', ''));
        $record->setErrorUrl($this->apiPayloadParam('cu', ''));
        $record->setErrorLine($this->apiPayloadParam('el', 0, 'int'));
        $record->setErrorCol($this->apiPayloadParam('ec', 0, 'int'));
        $record->setErrorStackByCompressedRaw($this->apiPayloadParam('es', ''));


        ClientReportEvent::SingleRecordReported($record);

        return $this->apiSuccess();
    }
}