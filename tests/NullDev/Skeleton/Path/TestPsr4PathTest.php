<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\TestPsr4Path;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Path\TestPsr4Path
 * @group  unit
 */
class TestPsr4PathTest extends TestCase
{
    /** @var TestPsr4Path */
    private $path;

    public function setUp(): void
    {
        $this->path = new TestPsr4Path('tests/', 'tests\\');
    }

    public function testItIsTestsCode(): void
    {
        self::assertTrue($this->path->isTestsCode());
        self::assertFalse($this->path->isSourceCode());
        self::assertFalse($this->path->isSpecCode());
    }
}
