<?php

namespace app\lib\dto;

abstract class BaseDTO
{
    abstract public static function instance();

    protected function __construct()
    {

    }
}