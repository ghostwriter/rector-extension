<?php

declare(strict_types=1);

var_dump(Mockery::any());
var_dump(\Mockery::any());

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::any());
var_dump(\Mockery\Argument::any());
