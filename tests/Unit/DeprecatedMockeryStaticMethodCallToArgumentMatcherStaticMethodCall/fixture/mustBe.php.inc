<?php

declare(strict_types=1);

var_dump(Mockery::mustBe('foo'));
var_dump(\Mockery::mustBe('foo'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::mustBe('foo'));
var_dump(\Mockery\ArgumentMatcher::mustBe('foo'));
