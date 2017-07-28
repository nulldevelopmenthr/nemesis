<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use Mockery;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\File\FileResource
 * @group  unit
 */
class FileResourceTest extends PHPUnit_Framework_TestCase
{
    /** @var FileResource */
    private $fileResource;
    /** @var ImprovedClassSource */
    private $classSource;

    public function setUp(): void
    {
        $this->classSource  = Mockery::mock(ImprovedClassSource::class);
        $this->fileResource = new FileResource(
            '/var/www/somewhere/src/Namespace/ClassName.php',
            $this->classSource
        );
    }

    public function testGetClassSource(): void
    {
        self::assertSame($this->classSource, $this->fileResource->getClassSource());
    }

    public function testGetFileName(): void
    {
        self::assertEquals('/var/www/somewhere/src/Namespace/ClassName.php', $this->fileResource->getFileName());
    }
}
