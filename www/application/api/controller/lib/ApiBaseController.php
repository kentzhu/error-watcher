<?php

namespace app\api\controller\lib;

use app\lib\controller\BaseController;
use think\response\Json;

abstract class ApiBaseController extends BaseController
{
    /**
     * 获取客户端UserAgent
     *
     * @return string
     */
    public function clientUserAgent()
    {
        // todo 暂不兼容cli模式(如swoole)
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * 获取客户端地址
     *
     * @return string
     */
    public function clientAddr()
    {
        // todo 暂不兼容ipv6
        return $this->request->ip(0, true);
    }

    /**
     * 获取API参数
     *
     * @param string $param_name
     * @param mixed $default
     * @param string|array $filter
     * @return mixed
     */
    public function apiPayloadParam(string $param_name, $default = null, $filter = '')
    {
        return $this->request->post($param_name, $default, $filter);
    }

    /**
     * API返回成功状态
     *
     * @param array $return_structure
     * @return \think\Response
     */
    public function apiSuccess(array $return_structure = ['_' => 'empty_structure'])
    {
        $ret = [
            'status' => 'success',
            'data' => $return_structure,
        ];
        return Json::create($ret);
    }

    /**
     * API返回异常状态
     *
     * @param string $error_code
     * @param string $error_message
     * @return \think\Response
     */
    public function apiError(string $error_code = 'error', string $error_message = 'server error')
    {
        $ret = [
            'status' => $error_code,
            'error_message' => $error_message,
        ];
        return Json::create($ret);
    }
}