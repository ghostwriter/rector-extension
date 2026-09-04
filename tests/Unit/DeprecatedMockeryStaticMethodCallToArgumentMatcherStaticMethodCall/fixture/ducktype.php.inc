<?php

declare(strict_types=1);

var_dump(Mockery::ducktype('foo'));
var_dump(\Mockery::ducktype('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::ducktype('foo'));
var_dump(\Mockery\ArgumentMatcher::ducktype('foo'));
