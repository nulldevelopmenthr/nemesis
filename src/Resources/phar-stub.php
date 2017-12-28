#!/usr/bin/env php
<?php declare(strict_types=1);

if (defined('HHVM_VERSION_ID')) {
    fwrite(STDERR, "HHVM is not supported.\n");
    exit(1);
} elseif (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 70100 || PHP_VERSION_ID >= 70200) {
    fwrite(STDERR, "PHP needs to be a minimum version of PHP 7.1.0 and maximum version of PHP 7.1.*.\n");
    exit(1);
}

set_error_handler(function ($severity, $message, $file, $line) {
    if ($severity & error_reporting()) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    }
});
require __DIR__.'/vendor/autoload.php';

Phar::mapPhar('nemesis.phar');

require_once 'phar://nemesis.phar/vendor/autoload.php';


use App\Application;

$application = new Application();
$application->run();

__HALT_COMPILER();
