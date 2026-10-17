<?php

declare(strict_types=1);

var_dump(anyArgs());

var_dump(\anyArgs());

?>
-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::anyArgs());

var_dump(\Mockery\Argument::anyArgs());

?>
