<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecDeserializeMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecDeserializeMethodFactory
 * @group  unit
 */
class SpecDeserializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDeserializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDeserializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    /** @dataProvider provideDeserializeMethods */
    public function testCreateFromDeserializeMethod(DeserializeMethod $method)
    {
        self::assertInstanceOf(SpecDeserializeMethod::class, $this->sut->createFromDeserializeMethod($method));
    }

    public function provideDeserializeMethods(): array
    {
        $className = Fixtures::userEntity();
        $firstName = Fixtures::firstNameProperty();

        return [
            [new DeserializeMethod($className, [$firstName])],
        ];
    }
}
