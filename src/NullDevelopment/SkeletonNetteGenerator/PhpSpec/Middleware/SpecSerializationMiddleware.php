<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use DateTime;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecSerializationMiddleware implements PartialCodeGeneratorMiddleware
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
            $input = null;

            if (1 === count($definition->getProperties())) {
                // @var Property $property
                foreach ($definition->getProperties() as $property) {
                    $input = $this->exampleMaker->value($property);
                }
            } else {
                // @var Property $property
                foreach ($definition->getProperties() as $property) {
                    $input[] = sprintf("'%s' => %s", $property->getName(), $this->exampleMaker->value($property));
                }

                $input = '['.implode(', ', $input).']';
            }

            $serializeMethod = $class->addMethod('it_is_serializable');

            $deserializeBody = sprintf(
                '$this->deserialize(%s)->shouldReturnAnInstanceOf(%s::class);',
                $input,
                $definition->getClassName()
            );

            $class->addMethod('it_is_deserializable')
                ->addBody($deserializeBody);

            foreach ($definition->getProperties() as $property) {
                if (false === in_array(
                        $property->getInstanceFullName(),
                        ['int', 'string', 'float', 'bool', 'array', 'DateTime']
                    )
                ) {
                    $namespace->addUse($property->getInstanceFullName());

                    $serializeMethod->addParameter($property->getName())
                        ->setTypeHint($property->getInstanceFullName());

                    $serializeMethod->addBody(
                        sprintf(
                            '$%s->serialize()->shouldBeCalled()->willReturn(%s);',
                            $property->getName(),
                            $this->exampleMaker->value($property)
                        )
                    );
                } elseif ('DateTime' === $property->getInstanceFullName()) {
                    $namespace->addUse($property->getInstanceFullName());

                    $serializeMethod->addParameter($property->getName())
                        ->setTypeHint($property->getInstanceFullName());

                    $serializeMethod->addBody(
                        sprintf(
                            '$%s->format(\'c\')->shouldBeCalled()->willReturn(%s);',
                            $property->getName(),
                            "'2018-01-01 00:01:00'"
                        )
                    );
                }
            }

            $serializeMethod->addBody(sprintf('$this->serialize()->shouldReturn(%s);', $input));
        }

        return $namespace;
    }
}
