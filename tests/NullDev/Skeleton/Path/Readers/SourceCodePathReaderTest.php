<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Path\Readers;

use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Skeleton\Path\Readers\SourceCodePathReader
 * @group  integration
 */
class SourceCodePathReaderTest extends ContainerSupportedTestCase
{
    /** @var SourceCodePathReader */
    private $reader;

    public function setUp()
    {
        parent::setUp();

        $this->reader = $this->getService(SourceCodePathReader::class);
    }

    public function testGetExistingSourceCodeNamespaces()
    {
        $data = $this->reader->getExistingSourceCodeNamespaces();

        self::assertTrue(is_array($data));
    }

    public function testGetExistingSourceCodeClassNames()
    {
        $data = $this->reader->getExistingSourceCodeClassNames();

        self::assertTrue(is_array($data));
    }
}
