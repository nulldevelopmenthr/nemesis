<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecToStringMethodFactory;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecToStringMethodFactory
 * @group  unit
 */
class SpecToStringMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecToStringMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecToStringMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    /** @dataProvider provideToStringMethods */
    public function testCreateFromToStringMethod(ToStringMethod $method)
    {
        self::assertInstanceOf(SpecToStringMethod::class, $this->sut->createFromToStringMethod($method));
    }

    public function provideToStringMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new ToStringMethod($firstName)],
        ];
    }
}
