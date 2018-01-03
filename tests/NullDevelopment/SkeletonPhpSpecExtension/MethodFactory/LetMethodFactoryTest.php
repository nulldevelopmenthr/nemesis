<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\LetMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\LetMethodFactory
 * @group  unit
 */
class LetMethodFactoryTest extends TestCase
{
    /** @var LetMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new LetMethodFactory();
    }

    /** @dataProvider provideConstructorMethods */
    public function testCreateFromConstructorMethod(ConstructorMethod $method)
    {
        self::assertInstanceOf(LetMethod::class, $this->sut->createFromConstructorMethod($method));
    }

    public function provideConstructorMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new ConstructorMethod([])],
            [new ConstructorMethod([$firstName])],
        ];
    }
}
