<?php

declare(strict_types=1);

var_dump(anyArgs());

var_dump(\anyArgs());

?>
-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::anyArgs());

var_dump(\Mockery\ArgumentMatcher::anyArgs());

?>
