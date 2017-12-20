<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecGetterMiddleware implements PartialCodeGeneratorMiddleware
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            // @var Property $property
            foreach ($definition->getProperties() as $property) {
                $propertyName = $property->getName();
                $propertyType = $property->getInstanceFullName();

                $getterMethod = $class->addMethod('it_exposes_'.$propertyName);

                if (true === in_array($propertyType, ['int', 'string', 'float', 'bool', 'array'])) {
                    $getterMethod->addBody(
                        sprintf('$this->get%s()->shouldReturn(%s);', ucfirst($propertyName), $this->exampleMaker->value($property))
                    );
                } else {
                    $getterMethod->addBody(
                        sprintf('$this->get%s()->shouldReturn($%s);', ucfirst($propertyName), $propertyName)
                    );

                    $namespace->addUse($propertyType);

                    $getterMethod->addParameter($propertyName)
                        ->setTypeHint($propertyType);
                }
            }
        }

        return $namespace;
    }
}
