<?php

declare(strict_types=1);

var_dump(Mockery::any());
var_dump(\Mockery::any());

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::any());
var_dump(\Mockery\ArgumentMatcher::any());
