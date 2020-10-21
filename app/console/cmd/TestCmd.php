<?php

namespace app\console\cmd;

class TestCmd
{
    public $cmd = 'cmd:test';
    public $info = '';

    public function handle()
    {
        echo __METHOD__ . PHP_EOL;

        return 1;
    }
}