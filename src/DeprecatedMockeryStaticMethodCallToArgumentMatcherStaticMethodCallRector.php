<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Mockery;
use Mockery\ArgumentMatcher;
use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name\FullyQualified;
use PHPStan\Type\ObjectType;

final class DeprecatedMockeryStaticMethodCallToArgumentMatcherStaticMethodCallRector extends AbstractMockeryRector
{
    /** @var string */
    public const CONSTRAINT = '>=1.6.16';

    /**
     * @var list<string>
     */
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
        'type' => true
    ];

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    /**
     * @param StaticCall $node
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        $name = $this->getName($node->name);

        if (! array_key_exists($name, self::METHODS)) {
            return null;
        }

        if (! $this->isObjectType($node->class, new ObjectType(Mockery::class))) {
            return null;
        }

        $node->class = new FullyQualified(ArgumentMatcher::class);

        return $node;
    }
}
