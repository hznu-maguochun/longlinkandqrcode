#!/usr/bin/env php
<?php
// workerman Server

// 定义项目路径
define('APP_PATH', __DIR__ . '/application/');
define('BIND_MODULE','push/worker');

// 加载框架引导文件
require __DIR__.'/thinkphp/start.php';
