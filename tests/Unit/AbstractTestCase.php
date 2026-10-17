<?php

declare(strict_types=1);

namespace Tests\Unit;

use Mockery\Rector\MockerySetList;
use Override;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function assert;
use function basename;
use function is_dir;
use function sprintf;

abstract class AbstractTestCase extends AbstractRectorTestCase
{
    /** @var string */
    public const TEST_DIRECTORY = 'override-me-in-subclass';

    #[Override]
    public function provideConfigFilePath(): string
    {
        return MockerySetList::COMPOSER_VERSION_BOUND;
    }

    /**
     * @dataProvider provideRectorCases
     *
     * @throws Throwable
     */
    #[DataProvider('provideRectorCases')]
    public function testRector(string $filePath): void
    {
        $this->doTestFile($filePath);
    }

    #[Override]
    protected function provideComposerJsonFilePath(): ?string
    {
        return static::TEST_DIRECTORY . DIRECTORY_SEPARATOR . 'composer.json';
    }

    /** @return iterable<string, array{0: string}> */
    public static function provideRectorCases(): iterable
    {
        $found = false;

        $fixtureDirectory = static::TEST_DIRECTORY . DIRECTORY_SEPARATOR . 'fixture';

        assert(is_dir($fixtureDirectory), sprintf('Fixture directory "%s" does not exist.', $fixtureDirectory));

        foreach (self::yieldFilesFromDirectory($fixtureDirectory) as [$filePath]) {
            $found = true;
            yield basename($filePath) => [$filePath];
        }

        assert($found, sprintf('No fixture files found in directory "%s"', $fixtureDirectory));
    }
}
