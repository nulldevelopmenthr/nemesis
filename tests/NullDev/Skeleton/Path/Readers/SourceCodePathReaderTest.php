<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path\Readers;

use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\Readers\SourceCodePathReader
 * @group nemesis
 */
class SourceCodePathReaderTest extends PHPUnit_Framework_TestCase
{
    /** @var SourceCodePathReader */
    private $sourceCodePathReader;

    public function setUp(): void
    {
        $this->sourceCodePathReader = new SourceCodePathReader();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
