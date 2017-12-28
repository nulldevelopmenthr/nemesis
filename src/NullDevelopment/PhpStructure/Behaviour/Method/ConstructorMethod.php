<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Behaviour\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use Webmozart\Assert\Assert;

/**
 * @see ConstructorMethodSpec
 * @see ConstructorMethodTest
 */
class ConstructorMethod implements Method
{
    /** @var MethodParameter[] */
    private $parameters;

    public function __construct(array $parameters)
    {
        Assert::allIsInstanceOf($parameters, MethodParameter::class);
        $this->parameters = $parameters;
    }

    public function getName() : string
    {
        return '__construct';
    }

    /** @return MethodParameter[] */
    public function getParameters() : array
    {
        return $this->parameters;
    }

    public function getReturnType() : ?string
    {
        return null;
    }
    public function getVisibility(): Visibility{
        return new Visibility('public');
    }

    public function isNullableReturnType() : bool
    {
        return false;
    }

    public function getImports() : array
    {
        return [];
    }

    public function isStatic() : bool
    {
        return false;
    }
}
