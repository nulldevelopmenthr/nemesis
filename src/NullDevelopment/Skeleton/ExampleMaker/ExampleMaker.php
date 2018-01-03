<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use DateTime;
use Exception;
use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use Roave\BetterReflection\BetterReflection;

/**
 * @see ExampleMakerSpec
 * @see ExampleMakerTest
 */
class ExampleMaker
{
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function instance(Variable $variable): Example
    {
        switch ($variable->getInstanceFullName()) {
            case 'int':
            case 'string':
            case 'float':
            case 'bool':
            case 'array':
                return $this->value($variable);
            case 'DateTime':
                return new InstanceExample(new ClassName('DateTime'), [$this->value($variable)]);
        }

        if (count($variable->getExamples()) > 0) {
            return new InstanceExample($variable->getInstanceName(), [$variable->getExamples()[0]]);
        }

        $refl = (new BetterReflection())
            ->classReflector()
            ->reflect($variable->getInstanceFullName());

        if ($refl->isInterface()) {
            return new MockeryMockExample($variable->getInstanceName());
        }

        $zz = $refl;
        while ($parent = $zz->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return new InstanceExample($variable->getInstanceName(), [new SimpleExample('2018-01-01T00:01:00+00:00')]);
            }
            $zz = $parent;
        }

        $arguments = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            if ($parameter->getType()) {
                if (count($parameter->getDocBlockTypes()) > 0) {
                    $docBlockClassName = $parameter->getDocBlockTypeStrings()[0];

                    if ('[]' === substr($docBlockClassName, -2, 2)) {
                        $class = substr($docBlockClassName, 0, -2);

                        $paramAsVar = new SimpleVariable(
                            $parameter->getName(),
                            ClassName::create($class)
                        );

                        $arguments[] = new ArrayExample([$this->instance($paramAsVar)]);
                        continue;
                    }
                }

                $paramAsVar = new SimpleVariable(
                    $parameter->getName(),
                    ClassName::create($parameter->getType()->__toString())
                );

                $arguments[] = $this->instance($paramAsVar);
            } else {
                throw new Exception('Err xxx1: Ha? No type on param?');
            }
        }

        return new InstanceExample($variable->getInstanceName(), $arguments);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function value(Variable $variable): Example
    {
        if (count($variable->getExamples()) > 0) {
            return $variable->getExamples()[0];
        }

        switch ($variable->getInstanceFullName()) {
            case 'int':
                return new SimpleExample(1);
            case 'string':
                return new SimpleExample($variable->getName());
            case 'float':
                return new SimpleExample(2.0);
            case 'bool':
                return new SimpleExample(true);
            case 'array':
                return new ArrayExample([new SimpleExample('data')]);
            case 'DateTime':
                return new SimpleExample('2018-01-01T00:01:00+00:00');
        }

        $refl = (new BetterReflection())
            ->classReflector()
            ->reflect($variable->getInstanceFullName());

        $zz = $refl;
        while ($parent = $zz->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return new SimpleExample('2018-01-01T00:01:00+00:00');
            }
            $zz = $parent;
        }

        $arguments = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            if (null !== $parameter->getType()) {
                if (count($parameter->getDocBlockTypes()) > 0) {
                    $docBlockClassName = $parameter->getDocBlockTypeStrings()[0];

                    if ('[]' === substr($docBlockClassName, -2, 2)) {
                        $class = substr($docBlockClassName, 0, -2);

                        $paramAsVar = new SimpleVariable(
                            $parameter->getName(),
                            ClassName::create($class)
                        );

                        $arguments[] = new ArrayExample([$this->value($paramAsVar)]);
                        continue;
                    }
                }

                $paramAsVar = new SimpleVariable(
                    $parameter->getName(),
                    ClassName::create($parameter->getType()->__toString())
                );

                $arguments[$parameter->getName()] = $this->value($paramAsVar);
            } else {
                throw new Exception('Err xxx2: Ha? No type on param?');
            }
        }

        if (count($arguments) > 1) {
            return new ArrayExample2($arguments);
        } elseif (1 === count($arguments)) {
            return new SimpleExample(array_pop($arguments));
        }

        return new SimpleExample('WTF?');
    }
}
