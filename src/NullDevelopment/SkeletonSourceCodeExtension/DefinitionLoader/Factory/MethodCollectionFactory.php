<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

use Exception;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ChainedGetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\CustomMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SetterMethod;

/**
 * @see MethodCollectionFactorySpec
 * @see MethodCollectionFactoryTest
 */
class MethodCollectionFactory
{
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function create(?array $input): array
    {
        if (null === $input) {
            return [];
        }

        $result = [];

        foreach ($input as $methodName => $methodInput) {
            if ('getter' === $methodInput['type']) {
                $property = new Property(
                    $methodInput['property']['name'],
                    ClassName::create($methodInput['property']['instanceOf']),
                    $methodInput['property']['nullable'],
                    $methodInput['property']['hasDefault'],
                    $methodInput['property']['default'],
                    new Visibility('private')
                );

                $result[] = new GetterMethod($methodName, $property);
            } elseif ('chainedgetter' === $methodInput['type']) {
                $data = $methodInput['calls'];

                $property = new Property(
                    $data['property']['name'],
                    ClassName::create($data['property']['instanceOf']),
                    $data['property']['nullable'],
                    $data['property']['hasDefault'],
                    $data['property']['default'],
                    new Visibility('private')
                );

                $getterMethod = new GetterMethod($data['name'], $property);

                $result[] = new ChainedGetterMethod($methodName, $getterMethod);
            } elseif ('custom' === $methodInput['type']) {
                $params = [];

                foreach ($methodInput['parameters'] as $paramName => $param) {
                    $params[] = new MethodParameter(
                        $paramName,
                        ClassName::create($param['instanceOf']),
                        $param['nullable'],
                        $param['hasDefault'],
                        $param['default'],
                        []
                    );
                }

                $zz = new CustomMethod($methodName, $params, $methodInput['body']);

                if (true === array_key_exists('returnType', $methodInput) && null !== $methodInput['returnType']) {
                    $zz->setReturnType(ClassName::create($methodInput['returnType']));
                }

                if (true === array_key_exists('static', $methodInput) && null !== $methodInput['static']) {
                    $zz->setStatic($methodInput['static']);
                }

                $result[] = $zz;
            } elseif ('setter' === $methodInput['type']) {
                $property = new Property(
                    $methodInput['property']['name'],
                    ClassName::create($methodInput['property']['instanceOf']),
                    $methodInput['property']['nullable'],
                    $methodInput['property']['hasDefault'],
                    $methodInput['property']['default'],
                    new Visibility('private')
                );

                $result[] = new SetterMethod($methodName, $property);
            } else {
                throw new Exception('ERR 322315002: Only setter, getter, chainedgetter & custom methods are implemented for now!');
            }
        }

        return $result;
    }

    protected function getDefaultValues()
    {
        return [
            'type'       => 'getter',
            'parameters' => [],
        ];
    }
}
