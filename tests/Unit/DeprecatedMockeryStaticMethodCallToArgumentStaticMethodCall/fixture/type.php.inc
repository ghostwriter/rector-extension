<?php

declare(strict_types=1);

var_dump(Mockery::type('string'));
var_dump(\Mockery::type('string'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::type('string'));
var_dump(\Mockery\Argument::type('string'));
