<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use NullDev\Skeleton\File\FileFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\File\FileFactory
 * @group nemesis
 */
class FileFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var FileFactory */
    private $fileFactory;

    public function setUp(): void
    {
        $this->fileFactory = new FileFactory([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
