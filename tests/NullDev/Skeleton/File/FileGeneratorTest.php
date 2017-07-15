<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use Mockery as m;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\File\FileGenerator;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @covers \NullDev\Skeleton\File\FileGenerator
 * @group  nemesis
 */
class FileGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var FileGenerator */
    private $fileGenerator;

    public function setUp(): void
    {
        $this->fileGenerator = new FileGenerator(m::mock(Filesystem::class), m::mock(PhpParserGenerator::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
