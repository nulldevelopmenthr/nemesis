<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeFactory
 * @group  todo
 */
class TypeFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TypeFactory */
    private $typeFactory;

    public function setUp()
    {
        $this->typeFactory = new TypeFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsTypeDeclaration()
    {
        $this->markTestSkipped('Skipping');
    }
}
