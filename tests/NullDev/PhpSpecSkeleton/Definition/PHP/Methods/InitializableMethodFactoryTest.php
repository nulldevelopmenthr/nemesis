<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory
 * @group  todo
 */
class InitializableMethodFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var InitializableMethodFactory */
    private $initializableMethodFactory;

    public function setUp()
    {
        $this->initializableMethodFactory = new InitializableMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
