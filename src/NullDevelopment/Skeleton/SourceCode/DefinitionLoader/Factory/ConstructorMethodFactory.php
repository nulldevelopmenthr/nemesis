<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;

/**
 * @see ConstructorMethodFactorySpec
 * @see ConstructorMethodFactoryTest
 */
class ConstructorMethodFactory
{
    public function create(?array $input): ?ConstructorMethod
    {
        if (null === $input) {
            return null;
        }

        $parameters = [];

        foreach ($input as $name => $inputParameter) {
            $parameter = array_merge($this->getDefaultParameterValues(), $inputParameter);

            $parameters[] = new Property(
                $name,
                ClassName::create($parameter['instanceOf']),
                $parameter['nullable'],
                $parameter['hasDefault'],
                $parameter['default'],
                new Visibility('private')
            );
        }

        return new ConstructorMethod($parameters);
    }

    private function getDefaultParameterValues()
    {
        return [
            'instanceOf' => 'int',
            'nullable'   => false,
            'hasDefault' => false,
            'default'    => null,
        ];
    }
}
