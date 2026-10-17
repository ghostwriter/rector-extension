<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Mockery\Expectation;
use Mockery\HigherOrderMessage;
use Override;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PHPStan\Type\ObjectType;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Rector\VersionBonding\Contract\ComposerPackageConstraintInterface;
use Rector\VersionBonding\ValueObject\ComposerPackageConstraint;

abstract class AbstractMockeryRector extends AbstractRector implements ComposerPackageConstraintInterface, ConfigurableRectorInterface
{
    /** @var string */
    public const CONSTRAINT = '*';

    /** @var string */
    public const PACKAGE = 'mockery/mockery';

    /** @param array<string,mixed> $configuration */
    #[Override]
    public function configure(array $configuration): void
    {
        assert($configuration === []);
    }

    public function hasMethodCallInChain(Node $node, string $methodName): bool
    {
        if (! $this->isMethodCallLike($node)) {
            return false;
        }

        if ($this->isName($node->name, $methodName)) {
            return true;
        }

        return $this->hasMethodCallInChain($node->var, $methodName);
    }

    /**
     * @psalm-assert-if-true MethodCall|NullsafeMethodCall $expr
     */
    public function isMethodCallLike(Expr $expr): bool
    {
        if ($expr instanceof MethodCall) {
            return true;
        }

        return $expr instanceof NullsafeMethodCall;
    }

    public function isMockeryExpectationMethodCall(Expr $expr): bool
    {
        if (! $this->isMethodCallLike($expr)) {
            return false;
        }

        // $mock->allows('methodName');
        // $mock->expects('methodName');
        // $mock->shouldReceive('methodName');
        if ($this->isObjectType($expr, new ObjectType(Expectation::class))) {
            return true;
        }

        // $mock->allows()->methodName();
        // $mock->expects()->methodName();
        // $mock->shouldReceive()->methodName();
        return $this->isObjectType($expr, new ObjectType(HigherOrderMessage::class));
    }

    #[Override]
    public function provideComposerPackageConstraint(): ComposerPackageConstraint
    {
        return new ComposerPackageConstraint(self::PACKAGE, static::CONSTRAINT);
    }
}
