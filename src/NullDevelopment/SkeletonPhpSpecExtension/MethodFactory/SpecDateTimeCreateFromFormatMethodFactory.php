<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;

/**
 * @see SpecDateTimeCreateFromFormatMethodFactorySpec
 * @see SpecDateTimeCreateFromFormatMethodFactoryTest
 */
class SpecDateTimeCreateFromFormatMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array
    {
        $methods = [];
        foreach ($definition->getMethods() as $method) {
            if ($method instanceof DateTimeCreateFromFormatMethod) {
                $methods[] = $this->createFromDateTimeCreateFromFormatMethod($method);
            }
        }

        return $methods;
    }

    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    public function createFromDateTimeCreateFromFormatMethod(
        DateTimeCreateFromFormatMethod $method
    ): SpecDateTimeCreateFromFormatMethod {
        return new SpecDateTimeCreateFromFormatMethod();
    }
}
