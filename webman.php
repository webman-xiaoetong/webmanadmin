#!/usr/bin/env php
<?php
// application.php

require __DIR__ . '/vendor/autoload.php';

use app\console\cmd\TestCmd;
use Symfony\Component\Console\Application;

$app = new Application();

// ... register commands
$commands = require_once __DIR__ . '/config/cmd.php';
$app->addCommands(array_map(function ($item) {
    return new $item;
}, $commands));

$app->run();
