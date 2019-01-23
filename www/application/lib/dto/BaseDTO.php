<?php

namespace app\lib\dto;

/**
 * 数据传输对象基类
 *
 * @package app\lib\dto
 */
abstract class BaseDTO
{
    abstract public static function instance();

    /**
     * 禁止以new DTO()的方式实例化DTO对象
     */
    protected function __construct()
    {

    }

    /**
     * 将对象输出为字典(数组)
     *
     * @return array
     */
    public function toArray()
    {
        $ret = [];
        foreach ($this as $key => $val) {
            $ret[$key] = $val;
        }
        return $ret;
    }
}