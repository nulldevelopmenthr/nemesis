<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ClassMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware;

/**
 * @see DateTimeValueObjectNetteGeneratorSpec
 * @see DateTimeValueObjectNetteGeneratorTest
 */
class DateTimeValueObjectNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new ClassMiddleware(),
            new NamespaceMiddleware(),
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

    public function handleDateTimeValueObject(DateTimeValueObject $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(DateTimeValueObject $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        /** @var PhpNamespace $namespace */
        $namespace = $middlewareChain($definition);

        foreach ($namespace->getClasses() as $class) {
            $class->addMethod('__toString')
                ->setReturnType('string')
                ->addBody('return $this->format(\'c\');');
        }

        foreach ($namespace->getClasses() as $class) {
            $createFromFormatMethod = $class->addMethod('createFromFormat')
                ->setStatic(true)
                ->setReturnType('self');

            $createFromFormatMethod->addParameter('format');
            $createFromFormatMethod->addParameter('time');
            $createFromFormatMethod->addParameter('object')
                ->setDefaultValue(null);

            $createFromFormatMethod
                ->addBody('$date = parent::createFromFormat($format, $time, $object);')
                ->addBody('')
                ->addBody('return new self($date->format(\'c\'));');
        }

        foreach ($namespace->getClasses() as $class) {
            $class->addMethod('serialize')
                ->setReturnType('string')
                ->addBody('return $this->__toString();');

            $deserializeMethod = $class->addMethod('deserialize')
                ->setStatic(true)
                ->setReturnType('self')
                ->addBody('return new self($value);');

            $deserializeMethod->addParameter('value')
                ->setTypeHint('string');
        }

        return $namespace;
    }
}
