<?php

declare(strict_types=1);

use Mockery\Rector\DeprecatedMockeryStaticMethodCallToArgumentMatcherStaticMethodCallRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(DeprecatedMockeryStaticMethodCallToArgumentMatcherStaticMethodCallRector::class);
};
