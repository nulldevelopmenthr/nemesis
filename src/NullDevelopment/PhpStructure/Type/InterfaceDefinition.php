<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use Exception;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\SourceCode;
use Webmozart\Assert\Assert;

/**
 * @see InterfaceDefinitionSpec
 * @see InterfaceDefinitionTest
 */
class InterfaceDefinition implements SourceCode, Definition
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
        InterfaceName $name, ?InterfaceName $parentName = null, array $constants = [], array $methods = []
    ) {
        Assert::allIsInstanceOf($constants, Constant::class);
        Assert::allIsInstanceOf($methods, Method::class);

        $this->name       = $name;
        $this->parentName = $parentName;
        $this->constants  = $constants;
        $this->methods    = $methods;
    }

    public function getInstanceOfFullName(): string
    {
        throw new Exception('ERR 235235: @TODO');
    }

    public function getParentClassName()
    {
        if (null === $this->parentName) {
            return null;
        }

        return $this->parentName->getName();
    }

    public function getParentFullClassName()
    {
        if (null === $this->parentName) {
            return null;
        }

        return $this->parentName->getFullName();
    }

    public function getParentAlias(): ?string
    {
        if (null === $this->parentName) {
            return null;
        }

        return $this->parentName->getAlias();
    }

    public function getInterfaces(): array
    {
        return [];
    }

    public function getProperties(): array
    {
        return [];
    }

    public function hasTraits(): bool
    {
        return false;
    }

    public function getTraits(): array
    {
        return [];
    }

    public function getInstanceOf(): InterfaceName
    {
        return $this->name;
    }

    public function getNamespace(): ?string
    {
        return $this->name->getNamespace();
    }

    public function getInstanceOfName(): string
    {
        return $this->name->getName();
    }

    public function getFullName(): string
    {
        return $this->name->getFullName();
    }

    public function hasParent(): bool
    {
        if (null === $this->parentName) {
            return false;
        }

        return true;
    }

    public function getParentName(): ?InterfaceName
    {
        return $this->parentName;
    }

    public function hasConstants(): bool
    {
        if (true === empty($this->constants)) {
            return false;
        }

        return true;
    }

    /** @return Constant[] */
    public function getConstants(): array
    {
        return $this->constants;
    }

    public function hasMethods(): bool
    {
        if (true === empty($this->methods)) {
            return false;
        }

        return true;
    }

    /** @return Method[] */
    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getGenerationPriority(): int
    {
        return 10;
    }
}
