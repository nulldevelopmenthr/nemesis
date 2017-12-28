<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP\Types;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeFactory
 * @group  todo
 */
class TypeFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TypeFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TypeFactory();
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
