<?php

declare(strict_types=1);

$mock = \Mockery::mock();

$mock?->shouldNotReceive('foo')?->with('bar');

?>
-----
<?php

declare(strict_types=1);

$mock = \Mockery::mock();

$mock?->expects('foo')?->with('bar')?->never();

?>
