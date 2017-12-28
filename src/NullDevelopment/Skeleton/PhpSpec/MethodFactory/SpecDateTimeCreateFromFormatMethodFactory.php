<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;

/**
 * @see SpecDateTimeCreateFromFormatMethodFactorySpec
 * @see SpecDateTimeCreateFromFormatMethodFactoryTest
 */
class SpecDateTimeCreateFromFormatMethodFactory implements PhpSpecMethodFactory
{
    /** @return Method[] */
    public function create(ClassType $definition): array
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
