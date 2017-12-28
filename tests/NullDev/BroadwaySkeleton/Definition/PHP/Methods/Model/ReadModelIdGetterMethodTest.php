<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\ReadModelIdGetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\ReadModelIdGetterMethod
 * @group  nemesis
 */
class ReadModelIdGetterMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var ReadModelIdGetterMethod */
    private $readModelIdGetterMethod;

    public function setUp(): void
    {
        $this->readModelIdGetterMethod = new ReadModelIdGetterMethod(Mockery::mock(Parameter::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
