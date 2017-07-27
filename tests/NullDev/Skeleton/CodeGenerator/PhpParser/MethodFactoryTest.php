<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use Mockery;
use NullDev\Nemesis\Application;
use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\Builder\Method;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory
 * @group  nemesis
 */
class MethodFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var MethodFactory */
    private $methodFactory;
    /** @var ContainerInterface */
    private $container;

    public function setUp(): void
    {
        $this->container = (new Application())->getContainer();

        $this->methodFactory = $this->getService(MethodFactory::class);
    }

    /**
     * @dataProvider provideMethods
     */
    public function testAllGeneratorsLoaded($input): void
    {
        $result = $this->methodFactory->generate($input);

        self::assertInstanceOf(Method::class, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new ConstructorMethod([])],
            [new GetterMethod(new Parameter('paramName'))],
            [new ToStringMethod(new Parameter('paramName'))],
            [new UuidCreateMethod(ClassType::createFromFullyQualified('Vendor\Namespace\SomeId'))],
        ];
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsExceptionForUnsupportedMethod(): void
    {
        $this->methodFactory->generate(
            Mockery::mock('NullDev\Skeleton\Definition\PHP\Methods\Method')
        );
    }

    public function getService(string $serviceName)
    {
        return $this->getContainer()->get($serviceName);
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
