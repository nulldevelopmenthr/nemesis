<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use Webmozart\Assert\Assert;

/**
 * @see InitializableMethodSpec
 * @see InitializableMethodTest
 */
class InitializableMethod extends BaseSpecMethod
{
    /** @var ClassName */
    private $className;

    /** @var ClassName|null */
    private $parentName;

    /** @var InterfaceName[] */
    private $interfaces;

    public function __construct(ClassName $className, ?ClassName $parentName, array $interfaces)
    {
        Assert::allIsInstanceOf($interfaces, InterfaceName::class);

        $this->className  = $className;
        $this->parentName = $parentName;
        $this->interfaces = $interfaces;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getParentName(): ?ClassName
    {
        return $this->parentName;
    }

    /** @return InterfaceName[] */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }

    public function getName(): string
    {
        return 'it_is_initializable';
    }

    public function getParameters(): array
    {
        return [];
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = [
            $this->className,
        ];
        if (null !== $this->parentName) {
            $imports[] = $this->parentName;
        }

        foreach ($this->interfaces as $interfaceName) {
            $imports[] = $interfaceName;
        }

        return $imports;
    }
}
