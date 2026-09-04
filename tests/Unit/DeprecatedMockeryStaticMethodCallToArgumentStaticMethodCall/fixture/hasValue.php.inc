<?php

declare(strict_types=1);

var_dump(Mockery::hasValue('foo'));
var_dump(\Mockery::hasValue('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::hasValue('foo'));
var_dump(\Mockery\Argument::hasValue('foo'));
