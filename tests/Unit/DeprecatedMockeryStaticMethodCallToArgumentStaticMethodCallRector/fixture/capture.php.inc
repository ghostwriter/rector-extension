<?php

declare(strict_types=1);

$foo = null;

var_dump(Mockery::capture($foo));
var_dump(\Mockery::capture($foo));

-----
<?php

declare(strict_types=1);

$foo = null;

var_dump(\Mockery\Argument::capture($foo));
var_dump(\Mockery\Argument::capture($foo));
