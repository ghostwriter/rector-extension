<?php

declare(strict_types=1);

var_dump(Mockery::andAnyOthers());
var_dump(\Mockery::andAnyOthers());

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::andAnyOthers());
var_dump(\Mockery\Argument::andAnyOthers());
