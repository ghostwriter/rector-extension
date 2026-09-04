<?php

declare(strict_types=1);

use Mockery\Rector\MockerySetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([MockerySetList::MOCKERY_16, MockerySetList::MOCKERY_20]);
};
