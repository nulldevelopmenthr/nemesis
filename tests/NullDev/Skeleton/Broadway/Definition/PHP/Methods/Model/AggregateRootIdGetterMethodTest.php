<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model;

use Mockery;
use NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod
 * @group nemesis
 */
class AggregateRootIdGetterMethodTest extends PHPUnit_Framework_TestCase
{
    /** @var AggregateRootIdGetterMethod */
    private $aggregateRootIdGetterMethod;

    public function setUp(): void
    {
        $this->aggregateRootIdGetterMethod = new AggregateRootIdGetterMethod(Mockery::mock(Parameter::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
