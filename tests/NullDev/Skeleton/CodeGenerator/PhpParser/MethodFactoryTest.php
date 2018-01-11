<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use PhpParser\Builder\Method as PhpBuilderMethod;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory
 * @group  integration
 */
class MethodFactoryTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MethodFactory */
    private $methodFactory;

    public function setUp(): void
    {
        $this->methodFactory = $this->getService(MethodFactory::class);
    }

    /**
     * @dataProvider provideMethods
     *
     * @param mixed $input
     */
    public function testAllGeneratorsLoaded($input): void
    {
        $result = $this->methodFactory->generate($input);

        self::assertInstanceOf(PhpBuilderMethod::class, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new ConstructorMethod([])],
            [GetterMethod::create(Property::create('paramName'))],
            [new ToStringMethod(Parameter::create('paramName'))],
        ];
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsExceptionForUnsupportedMethod(): void
    {
        /** @var Method */
        $methodMock = Mockery::mock(Method::class);

        $this->methodFactory->generate($methodMock);
    }
}
