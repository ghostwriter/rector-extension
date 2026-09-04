<?php

declare(strict_types=1);

var_dump(Mockery::isEqual('foo'));
var_dump(\Mockery::isEqual('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::isEqual('foo'));
var_dump(\Mockery\Argument::isEqual('foo'));
