<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Override;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Expression;

/**
 * @see \Tests\Unit\ShouldReceiveOnceToExpectsRector\ShouldReceiveOnceToExpectsRectorTest
 */
final class ShouldReceiveOnceToExpectsRector extends AbstractMockeryRector
{
    /** @var string */
    public const CONSTRAINT = '>=1.4';

    /** @return list<class-string<Expression>> */
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

        if (! $this->isMockeryExpectationShouldReceiveOnceChain($expr)) {
            return null;
        }

        $node->expr = $this->refactorShouldReceiveToExpectsAndRemoveOnce($expr);

        return $node;
    }

    private function isMockeryExpectationShouldReceiveOnceChain(Expr $expr): bool
    {
        if (! $this->isMockeryExpectationMethodCall($expr)) {
            return false;
        }

        if (! $this->hasMethodCallInChain($expr, 'once')) {
            return false;
        }

        return $this->hasMethodCallInChain($expr, 'shouldReceive');
    }

    private function refactorShouldReceiveToExpectsAndRemoveOnce(Expr $expr): Expr
    {
        if (! $this->isMethodCallLike($expr)) {
            return $expr;
        }

        $expr->var = $this->refactorShouldReceiveToExpectsAndRemoveOnce($expr->var);

        if ($this->isName($expr->name, 'once')) {
            return $expr->var;
        }

        if ($this->isName($expr->name, 'shouldReceive')) {
            $expr->name = new Identifier('expects');
        }

        return $expr;
    }
}
