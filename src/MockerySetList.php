<?php

declare(strict_types=1);

namespace Mockery\Rector;

use const DIRECTORY_SEPARATOR;

final class MockerySetList
{
    /** @var string */
    public const MOCKERY_16
        = __DIR__
        . DIRECTORY_SEPARATOR
        . '..'
        . DIRECTORY_SEPARATOR
        . 'config'
        . DIRECTORY_SEPARATOR
        . 'sets'
        . DIRECTORY_SEPARATOR
        . 'mockery-16.php';

    /** @var string */
    public const MOCKERY_20
        = __DIR__
        . DIRECTORY_SEPARATOR
        . '..'
        . DIRECTORY_SEPARATOR
        . 'config'
        . DIRECTORY_SEPARATOR
        . 'sets'
        . DIRECTORY_SEPARATOR
        . 'mockery-20.php';
}
