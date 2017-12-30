<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler\LoadAggregateRootModelGenerator;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler\LoadAggregateRootModelGenerator
 * @group  todo
 */
class LoadAggregateRootModelGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|BuilderFactory */
    private $builderFactory;

    /** @var LoadAggregateRootModelGenerator */
    private $sut;

    public function setUp()
    {
        $this->builderFactory = Mockery::mock(BuilderFactory::class);
        $this->sut            = new LoadAggregateRootModelGenerator($this->builderFactory);
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
