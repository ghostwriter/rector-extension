<?php

declare(strict_types=1);

var_dump(Mockery::notAnyOf('foo', 'bar'));
var_dump(\Mockery::notAnyOf('foo', 'bar'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::notAnyOf('foo', 'bar'));
var_dump(\Mockery\ArgumentMatcher::notAnyOf('foo', 'bar'));
