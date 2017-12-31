<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\GetterSpecMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\GetterSpecMethodFactory;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\GetterSpecMethodFactory
 * @group  unit
 */
class GetterSpecMethodFactoryTest extends TestCase
{
    /** @var GetterSpecMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new GetterSpecMethodFactory();
    }

    /** @dataProvider provideGetterMethods */
    public function testCreateFromGetterMethod(GetterMethod $method)
    {
        self::assertInstanceOf(GetterSpecMethod::class, $this->sut->createFromGetterMethod($method));
    }

    public function provideGetterMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new GetterMethod('getFirstName', $firstName)],
        ];
    }
}
