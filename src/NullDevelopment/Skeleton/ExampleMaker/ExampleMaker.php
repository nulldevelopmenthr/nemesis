<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use DateTime;
use Exception;
use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use OutOfBoundsException;
use Roave\BetterReflection\Reflection\Reflection;
use Roave\BetterReflection\Reflection\ReflectionParameter;

/**
 * @see ExampleMakerSpec
 * @see ExampleMakerTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ExampleMaker
{
    /** @var ReflectionFactory */
    private $reflectionFactory;

    public function __construct(ReflectionFactory $reflectionFactory)
    {
        $this->reflectionFactory = $reflectionFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function instance(Variable $variable): Example
    {
        if (count($variable->getExamples()) > 0) {
            return new InstanceExample($variable->getInstanceName(), [$variable->getExamples()[0]]);
        }

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

        $refl = $this->reflectionFactory->reflect($variable->getInstanceFullName());

        if (true === $refl->isInterface()) {
            return new MockeryMockExample($variable->getInstanceName());
        } elseif (true === $refl->isSubclassOf(DateTime::class)) {
            return new InstanceExample($variable->getInstanceName(), [new SimpleExample('2018-01-01T00:01:00+00:00')]);
        } elseif (false === $this->hasConstructor($refl)) {
            return new MockeryMockExample($variable->getInstanceName());
        }

        $arguments = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            $arguments[] = $this->processParameterForInstance($parameter);
        }

        return new InstanceExample($variable->getInstanceName(), $arguments);
    }

    private function processParameterForInstance(ReflectionParameter $parameter)
    {
        if (null === $parameter->getType()) {
            return new SimpleExample($parameter->getName());
        }

        if (true === $this->isDefinedAsCollection($parameter)) {
            $paramAsVar = new SimpleVariable($parameter->getName(), $this->getClassNameFromDocBlock($parameter));

            return new ArrayExample([$this->instance($paramAsVar)]);
        }

        $paramAsVar = $this->createSimpleVariableFromParameter($parameter);

        return $this->instance($paramAsVar);
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

        $refl = $this->reflectionFactory->reflect($variable->getInstanceFullName());

        if (true === $refl->isInterface()) {
            return new MockeryMockExample($variable->getInstanceName());
        } elseif (true === $refl->isSubclassOf(DateTime::class)) {
            return new SimpleExample('2018-01-01T00:01:00+00:00');
        } elseif (false === $this->hasConstructor($refl)) {
            return new MockeryMockExample($variable->getInstanceName());
        }

        $arguments = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            $arguments[] = $this->processParameterForValue($parameter);
        }

        if (count($arguments) > 1) {
            return new ArrayExample2($arguments);
        } elseif (1 === count($arguments)) {
            return new SimpleExample(array_pop($arguments));
        }

        return new SimpleExample('WTF?');
    }

    private function processParameterForValue(ReflectionParameter $parameter)
    {
        if (null === $parameter->getType()) {
            return new SimpleExample($parameter->getName());
        }

        if (true === $this->isDefinedAsCollection($parameter)) {
            $paramAsVar = new SimpleVariable($parameter->getName(), $this->getClassNameFromDocBlock($parameter));

            return new ArrayExample([$this->value($paramAsVar)]);
        }

        $paramAsVar = $this->createSimpleVariableFromParameter($parameter);

        return $this->value($paramAsVar);
    }

    private function createSimpleVariableFromParameter(ReflectionParameter $parameter): SimpleVariable
    {
        if (null === $parameter->getType()) {
            throw new \Exception('Parameter without type');
        }

        return new SimpleVariable(
            $parameter->getName(),
            ClassName::create($parameter->getType()->__toString())
        );
    }

    private function isDefinedAsCollection(ReflectionParameter $parameter): bool
    {
        if (0 === count($parameter->getDocBlockTypes())) {
            return false;
        }

        $docBlockClassName = $parameter->getDocBlockTypeStrings()[0];

        // When last 2 characters are [] we know it's a collection.
        if ('[]' === substr($docBlockClassName, -2, 2)) {
            return true;
        }

        return false;
    }

    private function getClassNameFromDocBlock(ReflectionParameter $parameter): ClassName
    {
        $docBlockClassName = $parameter->getDocBlockTypeStrings()[0];

        $class = substr($docBlockClassName, 0, -2);

        return ClassName::create($class);
    }

    protected function hasConstructor(Reflection $reflection): bool
    {
        try {
            $reflection->getConstructor();

            return true;
        } catch (OutOfBoundsException $exception) {
            return false;
        }
    }
}
