<?php

declare(strict_types=1);

var_dump(Mockery::anyOf('foo', 'bar'));
var_dump(\Mockery::anyOf('foo', 'bar'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::anyOf('foo', 'bar'));
var_dump(\Mockery\ArgumentMatcher::anyOf('foo', 'bar'));
