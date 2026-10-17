<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Override;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Expression;

/**
 * @see \Tests\Unit\ShouldNotReceiveToExpectsNeverRector\ShouldNotReceiveToExpectsNeverRectorTest
 */
final class ShouldNotReceiveToExpectsNeverRector extends AbstractMockeryRector
{
    /** @var string */
    public const CONSTRAINT = '>=1.6';

    /** @return list<class-string<Node>> */
    #[Override]
    public function getNodeTypes(): array
    {
        return [Expression::class];
    }

    /** @param Expression $node */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        $expr = $node->expr;

        if (! $this->isMockeryExpectationShouldNotReceiveMethodCall($expr)) {
            return null;
        }

        $class = $expr instanceof MethodCall ? MethodCall::class : NullsafeMethodCall::class;

        $node->expr = new $class($this->refactorShouldNotReceiveToExpectsNever($expr), new Identifier('never'));

        return $node;
    }


    private function refactorShouldNotReceiveToExpectsNever(Expr $expr): Expr
    {
        if (! $this->isMethodCallLike($expr)) {
            return $expr;
        }

        $expr->var = $this->refactorShouldNotReceiveToExpectsNever($expr->var);

        if (! $this->isName($expr->name, 'shouldNotReceive')) {
            return $expr;
        }

        $expr->name = new Identifier('expects');

        return $expr;
    }

    private function isMockeryExpectationShouldNotReceiveMethodCall(Expr $expr): bool
    {
        if (! $this->isMockeryExpectationMethodCall($expr)) {
            return false;
        }

        return $this->hasMethodCallInChain($expr, 'shouldNotReceive');
    }
}
