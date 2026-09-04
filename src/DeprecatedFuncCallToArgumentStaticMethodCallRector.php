<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Mockery\Argument;
use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name\FullyQualified;

use function array_key_exists;

final class DeprecatedFuncCallToArgumentStaticMethodCallRector extends AbstractMockeryRector
{
    /** @var string */
    public const CONSTRAINT = '>=1.6.16';

    /** @var array<string,bool> */
    private const FUNCTIONS = [
        'andAnyOtherArgs' => true,
        'andAnyOthers' => true,
        'anyArgs' => true,
    ];

    /** @return list<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [FuncCall::class];
    }

    /** @param FuncCall $node */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        $name = $this->getName($node->name);
        if (null === $name) {
            return null;
        }

        if (! array_key_exists($name, self::FUNCTIONS)) {
            return null;
        }

        return new StaticCall(new FullyQualified(Argument::class), $name, $node->args);
    }
}
