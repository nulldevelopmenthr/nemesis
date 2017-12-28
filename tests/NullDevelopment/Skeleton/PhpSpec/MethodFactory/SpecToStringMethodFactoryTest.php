<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecToStringMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecToStringMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecToStringMethodFactory
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
