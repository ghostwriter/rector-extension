<?php

declare(strict_types=1);

final class Fixture {
    public $mock;
    public function method()
    {
        $this->mock = \Mockery::mock();

        $this->mock->shouldReceive('bar')->once();

        $this->mock->shouldReceive('foo')->once()->with(123);

        $this->mock->shouldReceive('foo')->once()->andReturn(true);

        $this->mock->shouldReceive('foo')->with(123)->once()->andReturn(true);

        $this->mock->shouldReceive('foo')->twice();

        $this->mock->shouldReceive('foo')->never();

        $this->mock->shouldReceive('foo');

        $this->mock->shouldReceive('foo')->times(123);
    }
}
?>
-----
<?php

declare(strict_types=1);

final class Fixture {
    public $mock;
    public function method()
    {
        $this->mock = \Mockery::mock();

        $this->mock->expects('bar');

        $this->mock->expects('foo')->with(123);

        $this->mock->expects('foo')->andReturn(true);

        $this->mock->expects('foo')->with(123)->andReturn(true);

        $this->mock->shouldReceive('foo')->twice();

        $this->mock->shouldReceive('foo')->never();

        $this->mock->shouldReceive('foo');

        $this->mock->shouldReceive('foo')->times(123);
    }
}
?>
