<?php

declare(strict_types=1);

var_dump(Mockery::on(function () {}));
var_dump(\Mockery::on(function () {}));

-----
<?php

declare(strict_types=1);

var_dump(\Mockery\Argument::on(function () {}));
var_dump(\Mockery\Argument::on(function () {}));
