<?php

declare(strict_types=1);

namespace Tests\Unit\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCall;

use Mockery\Rector\AbstractMockeryRector;
use Mockery\Rector\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

/**
 * @covers \Mockery\Rector\AbstractMockeryRector
 * @covers \Mockery\Rector\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector
 */
#[CoversClass(AbstractMockeryRector::class)]
#[CoversClass(DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector::class)]
final class RectorTest extends AbstractTestCase
{
    public const TEST_DIRECTORY = __DIR__;
}
