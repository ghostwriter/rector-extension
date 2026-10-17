<?php

declare(strict_types=1);

var_dump(Mockery::subset(['foo' => 'bar']));
var_dump(\Mockery::subset(['foo' => 'bar']));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::subset(['foo' => 'bar']));
var_dump(\Mockery\Argument::subset(['foo' => 'bar']));
