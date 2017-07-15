<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP;

use Mockery;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Parameter
 * @group nemesis
 */
class ParameterTest extends PHPUnit_Framework_TestCase
{
    /** @var Parameter */
    private $parameter;

    public function setUp(): void
    {
        $this->parameter = new Parameter('name', Mockery::mock(Type::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
