<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Methods;

use Exception;
use NullDev\Skeleton\Definition\PHP\Parameter;

/**
 * @see ConstructorMethodSpec
 * @see ConstructorMethodTest
 */
class ConstructorMethod implements Method
{
    /** @var array|Parameter[] */
    private $params;

    /**
     * @param Parameter[] $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
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
        return '__constructor';
    }

    /** @return Parameter[] */
    public function getMethodParameters(): array
    {
        return $this->params;
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new Exception('Err 3221103: Method return type not supported on constructor.');
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

    public function hasParameterNamed(string $parameterName): bool
    {
        foreach ($this->params as $parameter) {
            if ($parameter->getName() === $parameterName) {
                return true;
            }
        }

        return false;
    }
}
