<?php

declare(strict_types=1);

$mock = \Mockery::mock();

$mock->shouldReceive('bar')->once();

$mock->shouldReceive('foo')->once()->with(123);

$mock->shouldReceive('foo')->once()->andReturn(true);

$mock->shouldReceive('foo')->with(123)->once()->andReturn(true);

$mock->shouldReceive('foo')->twice();

$mock->shouldReceive('foo')->never();

$mock->shouldReceive('foo');

$mock->shouldReceive('foo')->times(123);

?>
-----
<?php

declare(strict_types=1);

$mock = \Mockery::mock();

$mock->expects('bar');

$mock->expects('foo')->with(123);

$mock->expects('foo')->andReturn(true);

$mock->expects('foo')->with(123)->andReturn(true);

$mock->shouldReceive('foo')->twice();

$mock->shouldReceive('foo')->never();

$mock->shouldReceive('foo');

$mock->shouldReceive('foo')->times(123);

?>
