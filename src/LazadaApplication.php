<?php
/**
 *
 * author 46231996
 * create 2022/4/4
 * copyright 比邻科技
 */

namespace Jack\LazadaSdk;

use Jack\LazadaSdk\lib\LazadaClient;

class LazadaApplication
{
    public function __construct()
    {
        $this->app = new LazadaClient();
    }
}