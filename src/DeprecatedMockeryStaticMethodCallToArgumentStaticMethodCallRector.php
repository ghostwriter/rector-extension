<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Mockery;
use Mockery\Argument;
use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name\FullyQualified;
use PHPStan\Type\ObjectType;

use function array_key_exists;

final class DeprecatedMockeryStaticMethodCallToArgumentStaticMethodCallRector extends AbstractMockeryRector
{
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

    /** @return list<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    /** @param StaticCall $node */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        $name = $this->getName($node->name);

        if (! is_string($name)) {
            return null;
        }

        if (! array_key_exists($name, self::METHODS)) {
            return null;
        }

        if (! $this->isObjectType($node->class, new ObjectType(Mockery::class))) {
            return null;
        }

        $node->class = new FullyQualified(Argument::class);

        return $node;
    }
}
