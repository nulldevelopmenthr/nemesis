<?php

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler\SaveAggregateRootModelGenerator;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler\SaveAggregateRootModelGenerator
 * @group  todo
 */
class SaveAggregateRootModelGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|BuilderFactory */
    private $builderFactory;
    /** @var SaveAggregateRootModelGenerator */
    private $sut;

    public function setUp()
    {
        $this->builderFactory = Mockery::mock(BuilderFactory::class);
        $this->sut            = new SaveAggregateRootModelGenerator($this->builderFactory);
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
