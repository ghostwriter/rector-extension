<?php

declare(strict_types=1);

var_dump(Mockery::pattern('/foo/'));
var_dump(\Mockery::pattern('#foo#'));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::pattern('/foo/'));
var_dump(\Mockery\ArgumentMatcher::pattern('#foo#'));
