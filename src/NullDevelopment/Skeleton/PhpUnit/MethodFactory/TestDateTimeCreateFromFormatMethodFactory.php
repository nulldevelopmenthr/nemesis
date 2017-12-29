<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;

/**
 * @see TestDateTimeCreateFromFormatMethodFactorySpec
 * @see TestDateTimeCreateFromFormatMethodFactoryTest
 */
class TestDateTimeCreateFromFormatMethodFactory implements PhpUnitMethodFactory
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
    public function createFromDateTimeCreateFromFormatMethod(DateTimeCreateFromFormatMethod $method
    ): TestDateTimeCreateFromFormatMethod {
        return new TestDateTimeCreateFromFormatMethod();
    }
}
