<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\File\OutputResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\File\OutputResource
 * @group  todo
 */
class OutputResourceTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $fileName;
    /** @var MockInterface|ImprovedClassSource */
    private $classSource;
    /** @var string */
    private $output;
    /** @var OutputResource */
    private $outputResource;

    public function setUp()
    {
        $this->fileName       = 'fileName';
        $this->classSource    = Mockery::mock(ImprovedClassSource::class);
        $this->output         = 'output';
        $this->outputResource = new OutputResource($this->fileName, $this->classSource, $this->output);
    }

    public function testGetFileName()
    {
        self::assertEquals($this->fileName, $this->outputResource->getFileName());
    }

    public function testGetClassSource()
    {
        self::assertEquals($this->classSource, $this->outputResource->getClassSource());
    }

    public function testGetOutput()
    {
        self::assertEquals($this->output, $this->outputResource->getOutput());
    }
}
