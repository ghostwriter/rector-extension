<?php

declare(strict_types=1);

$mock = \Mockery::mock();

$mock->shouldNotReceive('foo');

?>
-----
<?php

declare(strict_types=1);

$mock = \Mockery::mock();

$mock->expects('foo')->never();

?>
