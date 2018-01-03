<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecSerializeMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecSerializeMethodFactory
 * @group  unit
 */
class SpecSerializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecSerializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecSerializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    /** @dataProvider provideSerializeMethods */
    public function testCreateFromSerializeMethod(SerializeMethod $method)
    {
        self::assertInstanceOf(SpecSerializeMethod::class, $this->sut->createFromSerializeMethod($method));
    }

    public function provideSerializeMethods(): array
    {
        $className = Fixtures::userEntity();
        $firstName = Fixtures::firstNameProperty();

        return [
            [new SerializeMethod($className, [$firstName])],
        ];
    }
}
