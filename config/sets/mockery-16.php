<?php

declare(strict_types=1);

use Mockery\Rector\DeprecatedFuncCallToArgumentStaticMethodCallRector;
use Mockery\Rector\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(DeprecatedFuncCallToArgumentStaticMethodCallRector::class);
    $rectorConfig->rule(DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector::class);
};
