<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use Exception;
use NullDev\Skeleton\Path\Psr4Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\Psr4Path
 * @group  unit
 */
class Psr4PathTest extends PHPUnit_Framework_TestCase
{
    /** @var Psr4Path */
    private $path;

    public function setUp(): void
    {
        $this->path = new Psr4Path('src/', 'Something\\');
    }

    public function testPathBaseMustEndWithSlash()
    {
        $this->expectException(Exception::class);
        new Psr4Path('src', '');
    }

    public function testClassBaseMustEndWithBackslash()
    {
        $this->expectException(Exception::class);
        new Psr4Path('src/', 'Something');
    }

    public function testItIsSourceCode(): void
    {
        self::assertTrue($this->path->isSourceCode());
        self::assertFalse($this->path->isSpecCode());
        self::assertFalse($this->path->isTestsCode());
    }

    /** @dataProvider provideClassNamesThatBelongHere */
    public function testBelongsHere(string $className)
    {
        self::assertTrue($this->path->belongsTo($className));
    }

    /** @dataProvider provideClassNamesThatDoNotBelongHere */
    public function testDoesntBelongsHere(string $className)
    {
        self::assertFalse($this->path->belongsTo($className));
    }

    /** @dataProvider provideClassNamesThatBelongHere */
    public function testFilenamesThatBelongHere(string $className, string $expectedFileName)
    {
        self::assertEquals($expectedFileName, $this->path->getFileNameFor($className));
    }

    /** @dataProvider provideClassNamesThatDoNotBelongHere */
    public function testFilenamesThatDontBelongHereThrowException(string $className)
    {
        $this->expectException(Exception::class);
        $this->path->getFileNameFor($className);
    }

    public function provideClassNamesThatBelongHere(): array
    {
        return [
            ['Something\ClassName', 'src/ClassName.php'],
            ['Something\Vendor\ClassName', 'src/Vendor/ClassName.php'],
            ['Something\Vendor\Package\ClassName', 'src/Vendor/Package/ClassName.php'],
        ];
    }

    public function provideClassNamesThatDoNotBelongHere(): array
    {
        return [
            ['ClassWithoutNamespace'],
            ['Vendor\ClassName'],
            ['Vendor\Package\ClassName'],
            ['SomethingSimilar\Package\ClassName'],
        ];
    }
}
