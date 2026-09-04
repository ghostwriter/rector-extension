<?php

declare(strict_types=1);

var_dump(Mockery::not('foo'));
var_dump(\Mockery::not('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::not('foo'));
var_dump(\Mockery\Argument::not('foo'));
