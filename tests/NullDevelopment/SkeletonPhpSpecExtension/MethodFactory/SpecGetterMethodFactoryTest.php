<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecGetterMethodFactory;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecGetterMethodFactory
 * @group  unit
 */
class SpecGetterMethodFactoryTest extends TestCase
{
    /** @var SpecGetterMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecGetterMethodFactory();
    }

    /** @dataProvider provideGetterMethods */
    public function testCreateFromGetterMethod(GetterMethod $method)
    {
        self::assertInstanceOf(SpecGetterMethod::class, $this->sut->createFromGetterMethod($method));
    }

    public function provideGetterMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new GetterMethod('getFirstName', $firstName)],
        ];
    }
}
