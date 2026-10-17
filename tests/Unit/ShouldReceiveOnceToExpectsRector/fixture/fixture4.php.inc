<?php

declare(strict_types=1);

final class Fixture {
    public static $staticMock;
    public static function staticMethod()
    {
        self::$staticMock = \Mockery::mock();

        self::$staticMock->shouldReceive('bar')->once();

        self::$staticMock->shouldReceive('foo')->once()->with(123);

        self::$staticMock->shouldReceive('foo')->once()->andReturn(true);

        self::$staticMock->shouldReceive('foo')->with(123)->once()->andReturn(true);

        self::$staticMock->shouldReceive('foo')->twice();

        self::$staticMock->shouldReceive('foo')->never();

        self::$staticMock->shouldReceive('foo');

        self::$staticMock->shouldReceive('foo')->times(123);
    }
}
?>
-----
<?php

declare(strict_types=1);

final class Fixture {
    public static $staticMock;
    public static function staticMethod()
    {
        self::$staticMock = \Mockery::mock();

        self::$staticMock->expects('bar');

        self::$staticMock->expects('foo')->with(123);

        self::$staticMock->expects('foo')->andReturn(true);

        self::$staticMock->expects('foo')->with(123)->andReturn(true);

        self::$staticMock->shouldReceive('foo')->twice();

        self::$staticMock->shouldReceive('foo')->never();

        self::$staticMock->shouldReceive('foo');

        self::$staticMock->shouldReceive('foo')->times(123);
    }
}
?>
