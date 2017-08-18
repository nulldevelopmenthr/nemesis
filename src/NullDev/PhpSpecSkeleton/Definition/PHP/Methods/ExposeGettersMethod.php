<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;

class ExposeGettersMethod implements Method
{
    /** @var Parameter[]|array */
    private $properties;

    public function __construct(array $properties)
    {
        $this->properties = $properties;
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

    /** @return Parameter[]|array */
    public function getMethodParameters(): array
    {
        $params = [];
        foreach ($this->properties as $property) {
            if (true === $this->isPropertyEligibleForMethodParameter($property)) {
                $params[] = $property;
            }
        }

        return $params;
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new \Exception('Err 2342341: PhpSpec expose doesnt use return types.');
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    private function isPropertyEligibleForMethodParameter(Parameter $parameter): bool
    {
        if (false === $parameter->hasType()) {
            return false;
        }

        if ($parameter->getType() instanceof TypeDeclaration) {
            return false;
        }

        return true;
    }
}
