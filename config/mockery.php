<?php

declare(strict_types=1);

use Mockery\Rector\DeprecatedFuncCallToArgumentStaticMethodCallRector;
use Mockery\Rector\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector;
use Mockery\Rector\ShouldNotReceiveToExpectsNeverRector;
use Mockery\Rector\ShouldReceiveOnceToExpectsRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfigurationComposerVersionBound(
        DeprecatedFuncCallToArgumentStaticMethodCallRector::class,
        [],
        DeprecatedFuncCallToArgumentStaticMethodCallRector::PACKAGE,
        DeprecatedFuncCallToArgumentStaticMethodCallRector::CONSTRAINT
    );

    $rectorConfig->ruleWithConfigurationComposerVersionBound(
        DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector::class,
        [],
        DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector::PACKAGE,
        DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector::CONSTRAINT
    );
};
