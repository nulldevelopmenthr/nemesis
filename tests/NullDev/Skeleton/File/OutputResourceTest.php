<?php

namespace tests\NullDev\Skeleton\File;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\File\OutputResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\File\OutputResource
 * @group  todo
 */
class OutputResourceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $fileName;
    /** @var MockInterface|ImprovedClassSource */
    private $classSource;
    /** @var string */
    private $output;
    /** @var OutputResource */
    private $sut;

    public function setUp()
    {
        $this->fileName    = 'fileName';
        $this->classSource = Mockery::mock(ImprovedClassSource::class);
        $this->output      = 'output';
        $this->sut         = new OutputResource($this->fileName, $this->classSource, $this->output);
    }

    public function testGetFileName()
    {
        self::assertEquals($this->fileName, $this->sut->getFileName());
    }

    public function testGetClassSource()
    {
        self::assertEquals($this->classSource, $this->sut->getClassSource());
    }

    public function testGetOutput()
    {
        self::assertEquals($this->output, $this->sut->getOutput());
    }
}
