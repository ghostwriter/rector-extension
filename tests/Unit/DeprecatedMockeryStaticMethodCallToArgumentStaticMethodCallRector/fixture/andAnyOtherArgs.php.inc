<?php

declare(strict_types=1);

var_dump(Mockery::andAnyOtherArgs());
var_dump(\Mockery::andAnyOtherArgs());

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::andAnyOtherArgs());
var_dump(\Mockery\Argument::andAnyOtherArgs());
