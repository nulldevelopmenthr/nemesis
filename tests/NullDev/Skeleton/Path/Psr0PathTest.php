<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\Psr0Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\Psr0Path
 * @group  unit
 */
class Psr0PathTest extends PHPUnit_Framework_TestCase
{
    /** @var Psr0Path */
    private $path;

    public function setUp(): void
    {
        $this->path = new Psr0Path('src/', '');
    }

    /** @expectedException \Exception */
    public function testPathBaseMustEndWithSlash()
    {
        new Psr0Path('src', '');
    }

    /** @expectedException \Exception */
    public function testClassBaseMustEndWithBackslash()
    {
        new Psr0Path('src/', 'Something');
    }

    public function testItIsSourceCode(): void
    {
        self::assertTrue($this->path->isSourceCode());
        self::assertFalse($this->path->isSpecCode());
        self::assertFalse($this->path->isTestsCode());
    }

    /**
     * @dataProvider provideClassNames
     */
    public function testEverythingBelongsHere(string $className)
    {
        self::assertTrue($this->path->belongsTo($className));
    }

    /**
     * @dataProvider provideClassNames
     */
    public function testFilenames(string $className, string $expectedFileName)
    {
        self::assertEquals($expectedFileName, $this->path->getFileNameFor($className));
    }

    public function provideClassNames(): array
    {
        return [
            ['ClassWithoutNamespace', 'src/ClassWithoutNamespace.php'],
            ['Vendor\ClassName', 'src/Vendor/ClassName.php'],
            ['Vendor\Package\ClassName', 'src/Vendor/Package/ClassName.php'],
        ];
    }
}
