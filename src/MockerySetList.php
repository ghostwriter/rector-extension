<?php

declare(strict_types=1);

namespace Mockery\Rector;

use const DIRECTORY_SEPARATOR;

final class MockerySetList
{
    /** @var string */
    public const COMPOSER_VERSION_BOUND
        = __DIR__
        . DIRECTORY_SEPARATOR
        . '..'
        . DIRECTORY_SEPARATOR
        . 'config'
        . DIRECTORY_SEPARATOR
        . 'mockery.php';
}
