<?php

declare(strict_types=1);

var_dump(Mockery::isSame('foo'));
var_dump(\Mockery::isSame('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::isSame('foo'));
var_dump(\Mockery\Argument::isSame('foo'));
