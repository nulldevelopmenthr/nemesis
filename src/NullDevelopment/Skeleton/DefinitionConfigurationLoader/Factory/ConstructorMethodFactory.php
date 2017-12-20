<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

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

            $parameters[] = new MethodParameter(
                $name,
                ClassName::create($parameter['className']),
                $parameter['nullable'],
                $parameter['hasDefault'],
                $parameter['default']
            );
        }

        return new ConstructorMethod($parameters);
    }

    private function getDefaultParameterValues()
    {
        return [
            'className'  => 'integer',
            'nullable'   => false,
            'hasDefault' => false,
            'default'    => null,
        ];
    }
}
