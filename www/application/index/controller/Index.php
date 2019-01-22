<?php

namespace app\index\controller;

class Index
{
    public function index()
    {
        return 'ERROR-WATCHER SERVER' . '<br />' . date('Y-m-d H:i:s');
    }
}
