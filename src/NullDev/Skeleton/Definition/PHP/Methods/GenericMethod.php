<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Methods;

use Exception;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Webmozart\Assert\Assert;

/**
 * @see GenericMethodSpec
 * @see GenericMethodTest
 */
class GenericMethod implements Method
{
    /** @var string */
    private $methodName;
    /** @var Parameter[]|array */
    private $params;
    /** @var null|ClassType */
    private $returnType;

    /** @param Parameter[] $params */
    public function __construct(string $methodName, array $params, ?ClassType $returnType)
    {
        Assert::allIsInstanceOf($params, Parameter::class);

        $this->methodName = $methodName;
        $this->params     = $params;
        $this->returnType = $returnType;
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    /** @return Parameter[] */
    public function getMethodParameters(): array
    {
        return $this->params;
    }

    public function hasMethodReturnType(): bool
    {
        if (null === $this->returnType) {
            return false;
        }

        return true;
    }

    public function getMethodReturnType(): string
    {
        if (null === $this->returnType) {
            throw new Exception('Err 3415125125124: No return type defined');
        }

        return $this->returnType->getName();
    }

    /** @return Parameter[] */
    public function getParamsAsClassTypes(): array
    {
        $result = [];
        foreach ($this->params as $param) {
            if (true === $param->hasType()) {
                $result[] = $param->getType();
            }
        }

        return $result;
    }
}
