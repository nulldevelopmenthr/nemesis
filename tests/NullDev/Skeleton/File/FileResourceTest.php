<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use Mockery;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Path\Path;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\File\FileResource
 * @group nemesis
 */
class FileResourceTest extends PHPUnit_Framework_TestCase
{
    /** @var FileResource */
    private $fileResource;

    public function setUp(): void
    {
        $this->fileResource = new FileResource(Mockery::mock(Path::class), Mockery::mock(ImprovedClassSource::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
