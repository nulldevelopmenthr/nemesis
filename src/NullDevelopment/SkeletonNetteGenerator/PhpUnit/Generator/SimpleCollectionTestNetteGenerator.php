<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Definition\SimpleCollection;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\TestNamespaceMiddleware;

/**
 * @see SimpleCollectionTestNetteGeneratorSpec
 * @see SimpleCollectionTestNetteGeneratorTest
 */
class SimpleCollectionTestNetteGenerator extends BaseNetteGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $middleware = [
            new TestMiddleware(),
            new TestNamespaceMiddleware(),
        ];
        parent::__construct($middleware);

        $this->exampleMaker = $exampleMaker;
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleCollection) {
            return true;
        }

        return false;
    }

    public function generate(SimpleCollection $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $var = new SimpleVariable('zzz', $definition->getCollectionOf()->getClassName());

            $exampleValue =$this->exampleMaker->instance($var);

            foreach ($exampleValue->classesToImport() as $classToImport) {
                $namespace->addUse($classToImport->getFullName());
            }

            $class->addMethod('setUp')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->elements = [%s];', $exampleValue))
                ->addBody(sprintf('$this->sut = new %s(%s);', $definition->getClassName(), '$this->elements'));

            $class->addMethod('testGetElements')
                ->addBody('self::assertSame($this->elements, $this->sut->toArray());');

            $class->addMethod('testSerializeAndDeserialize')
                ->addBody('$serialized = $this->sut->serialize();')
                ->addBody('$serializedJson = json_encode($serialized);')
                ->addBody('self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));');
        }

        return $namespace;
    }
}
