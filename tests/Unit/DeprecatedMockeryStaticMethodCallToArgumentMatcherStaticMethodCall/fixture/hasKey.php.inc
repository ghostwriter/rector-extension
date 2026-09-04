<?php

declare(strict_types=1);

var_dump(Mockery::hasKey('foo'));
var_dump(\Mockery::hasKey('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::hasKey('foo'));
var_dump(\Mockery\ArgumentMatcher::hasKey('foo'));
