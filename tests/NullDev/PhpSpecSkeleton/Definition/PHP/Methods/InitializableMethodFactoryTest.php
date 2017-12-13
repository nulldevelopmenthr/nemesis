<?php

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory
 * @group  todo
 */
class InitializableMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var InitializableMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new InitializableMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
