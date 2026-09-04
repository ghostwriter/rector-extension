<?php

declare(strict_types=1);

use Mockery\Rector\DeprecatedFuncCallToArgumentStaticMethodCallRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(DeprecatedFuncCallToArgumentStaticMethodCallRector::class);
};
