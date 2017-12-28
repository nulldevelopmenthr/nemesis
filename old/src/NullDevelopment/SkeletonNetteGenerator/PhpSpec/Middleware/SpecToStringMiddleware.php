<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecToStringMiddleware implements PartialCodeGeneratorMiddleware
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
                $value = $this->exampleMaker->value($property);

                if (true === in_array($property->getInstanceFullName(), ['int', 'float', 'bool'])) {
                    $value = "'".$value."'";
                }

                $body = sprintf('$this->__toString()->shouldReturn(%s);', $value);

                $class->addMethod('it_is_castable_to_string')
                    ->addBody($body);
            }
        }

        return $namespace;
    }
}
