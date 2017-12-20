<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestNamespaceMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestSerializationMiddleware;

/**
 * @see DateTimeValueObjectTestNetteGeneratorSpec
 * @see DateTimeValueObjectTestNetteGeneratorTest
 */
class DateTimeValueObjectTestNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TestSerializationMiddleware(),
            new TestNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof DateTimeValueObject) {
            return true;
        }

        return false;
    }

    public function generate(DateTimeValueObject $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        $class = $namespace->addClass($definition->getClassName().'Test');

        $namespace->addUse('PHPUnit\\Framework\\TestCase')
            ->addUse($definition->getFullClassName());
        $class->setExtends('PHPUnit\\Framework\\TestCase')
            ->addComment('@covers \\'.$definition->getFullClassName())
            ->addComment('@group  todo');

        $class->addProperty('value')
            ->setVisibility(Visibility::PRIVATE)
            ->addComment('@var string');

        $class->addProperty('sut')
            ->setVisibility(Visibility::PRIVATE)
            ->addComment('@var '.$definition->getClassName());

        // Set up

        $class->addMethod('setUp')
            ->setVisibility(Visibility::PUBLIC)
            ->addBody(sprintf('$this->value = %s;', "'2018-01-01T11:22:33+00:00'"))
            ->addBody(sprintf('$this->sut = new %s($this->value);', $definition->getClassName()));

        // To string

        $class->addMethod('testToString')
            ->addBody('self::assertSame($this->value, $this->sut->__toString());');

        // Serialize / deserialize

        $class->addMethod('testSerialize')
            ->addBody('self::assertEquals($this->value, $this->sut->serialize());');

        $class->addMethod('testDeserialize')
            ->addBody('self::assertEquals($this->sut, $this->sut->deserialize($this->value));');

        return $namespace;
    }
}
