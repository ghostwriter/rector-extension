<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Mockery;
use Mockery\Argument;
use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name\FullyQualified;
use function array_key_exists;
use function assert;
use function is_string;

/**
 * @see \Tests\Unit\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector\DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRectorTest
 */
final class DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector extends AbstractMockeryRector
{
    /** @var string */
    public const CONSTRAINT = '>=1.6';

    /** @var array<string,bool> */
    private const METHODS = [
        'andAnyOtherArgs' => true,
        'andAnyOthers' => true,
        'any' => true,
        'anyOf' => true,
        'capture' => true,
        'contains' => true,
        'ducktype' => true,
        'hasKey' => true,
        'hasValue' => true,
        'isEqual' => true,
        'isSame' => true,
        'mustBe' => true,
        'not' => true,
        'notAnyOf' => true,
        'on' => true,
        'pattern' => true,
        'subset' => true,
        'type' => true,
    ];

    /** @return list<class-string<StaticCall>> */
    #[Override]
    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    /** @param StaticCall $node */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        $name = $this->getName($node->name);

        assert(is_string($name));

        if (! array_key_exists($name, self::METHODS)) {
            return null;
        }

        if (! $this->isName($node->class, Mockery::class)) {
            return null;
        }

        $node->class = new FullyQualified(Argument::class);

        return $node;
    }
}
