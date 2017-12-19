<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use Webmozart\Assert\Assert;

/**
 * @see InterfaceDefinitionSpec
 * @see InterfaceDefinitionTest
 */
class InterfaceDefinition
{
    /** @var InterfaceName */
    private $name;
    /** @var null|InterfaceName */
    private $parentName;
    /** @var Constant[] */
    private $constants;
    /** @var Method[] */
    private $methods;

    public function __construct(
        InterfaceName $name,
        ?InterfaceName $parentName = null,
        array $constants = [],
        array $methods = []
    ) {
        Assert::allIsInstanceOf($constants, Constant::class);
        Assert::allIsInstanceOf($methods, Method::class);

        $this->name       = $name;
        $this->parentName = $parentName;
        $this->constants  = $constants;
        $this->methods    = $methods;
    }

    public function getName(): InterfaceName
    {
        return $this->name;
    }

    public function getParentName(): ?InterfaceName
    {
        return $this->parentName;
    }

    /** @return Constant[] */
    public function getConstants(): array
    {
        return $this->constants;
    }

    /** @return Method[] */
    public function getMethods(): array
    {
        return $this->methods;
    }
}
