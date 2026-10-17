<?php

declare(strict_types=1);

var_dump(Mockery::contains('foo'));
var_dump(\Mockery::contains('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::contains('foo'));
var_dump(\Mockery\Argument::contains('foo'));
