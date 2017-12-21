<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Generator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecMiddleware;
use NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware\SpecNamespaceMiddleware;

/**
 * @see DateTimeValueObjectSpecNetteGeneratorSpec
 * @see DateTimeValueObjectSpecNetteGeneratorTest
 */
class DateTimeValueObjectSpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
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

        $namespace->addUse('\DateTime');

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            // Let
            $class->addMethod('let')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody('$this->beConstructedWith(\'2018-01-01 11:22:33\');');

            // Initializable

            $class->addMethod('it_is_initializable')
                ->addBody('$this->shouldHaveType('.$definition->getClassName().'::class);')
                ->addBody('$this->shouldHaveType(DateTime::class);');

            // ToString

            $class->addMethod('it_is_castable_to_string')
                ->addBody('$this->__toString()->shouldReturn(\'2018-01-01T11:22:33+00:00\');');

            // createFromFormat

            $class->addMethod('it_can_be_created_from_custom_format')
                ->addBody('$result = $this->createFromFormat(DateTime::ATOM, \'2018-01-01T11:22:33Z\');')
                ->addBody('$result->__toString()->shouldReturn(\'2018-01-01T11:22:33+00:00\');');

            // Serialization / deserialization

            $class->addMethod('it_is_serializable')
                ->addBody('$this->serialize()->shouldReturn(\'2018-01-01T11:22:33+00:00\');');

            $class->addMethod('it_is_deserializable')
                ->addBody(
                    '$this->deserialize(\'2018-01-01T11:22:33+00:00\')->shouldReturnAnInstanceOf('.$definition->getClassName().'::class);'
                );
        }

        return $namespace;
    }
}
