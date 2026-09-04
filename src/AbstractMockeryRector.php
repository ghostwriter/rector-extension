<?php

declare(strict_types=1);

namespace Mockery\Rector;

use Override;
use Rector\Rector\AbstractRector;
use Rector\VersionBonding\Contract\ComposerPackageConstraintInterface;
use Rector\VersionBonding\ValueObject\ComposerPackageConstraint;

abstract class AbstractMockeryRector extends AbstractRector implements ComposerPackageConstraintInterface
{
    /** @var string */
    private const PACKAGE = 'mockery/mockery';

    /** @var string */
    public const CONSTRAINT = '*';

    #[Override]
    public function provideComposerPackageConstraint(): ComposerPackageConstraint
    {
        return new ComposerPackageConstraint(self::PACKAGE, static::CONSTRAINT);
    }
}
