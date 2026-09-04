<?php

declare(strict_types=1);

namespace Tests\Unit\DeprecatedFuncCallToArgumentStaticMethodCall;

use Mockery\Rector\AbstractMockeryRector;
use Mockery\Rector\DeprecatedFuncCallToArgumentStaticMethodCallRector;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

/**
 * @covers \Mockery\Rector\AbstractMockeryRector
 * @covers \Mockery\Rector\DeprecatedFuncCallToArgumentStaticMethodCallRector
 */
#[CoversClass(AbstractMockeryRector::class)]
#[CoversClass(DeprecatedFuncCallToArgumentStaticMethodCallRector::class)]
final class RectorTest extends AbstractTestCase
{
    public const TEST_DIRECTORY = __DIR__;
}
