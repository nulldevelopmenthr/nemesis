<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;

class ExposeConstructorArgumentsAsGettersMethod implements Method
{
    private $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function getParamsAsClassTypes(): array
    {
        $result = [];
        foreach ($this->params as $param) {
            if ($param->hasType()) {
                $result[] = $param->getType();
            }
        }

        return $result;
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
        return 'it_should_expose_constructor_arguments_via_getters';
    }

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
        throw new \Exception('Err 2342341: PhpSpec expose doesnt use return types.');
    }
}
