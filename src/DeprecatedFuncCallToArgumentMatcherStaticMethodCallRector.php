<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Mockery\ArgumentMatcher;
use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name\FullyQualified;

final class DeprecatedFuncCallToArgumentMatcherStaticMethodCallRector extends AbstractMockeryRector
{
    /** @var string */
    public const CONSTRAINT = '>=1.6.16';

    /**
     * @var array<string, array{0: class-string, 1: string}>
     */
    private const FUNCTIONS = ['andAnyOtherArgs' => true, 'andAnyOthers' => true, 'anyArgs' => true];

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [FuncCall::class];
    }

    /**
     * @param FuncCall $node
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        $name = $this->getName($node->name);

        if (! array_key_exists($name, self::FUNCTIONS)) {
            return null;
        }

        return new StaticCall(
            new FullyQualified(ArgumentMatcher::class),
            $name,
            $node->args
        );
    }
}
