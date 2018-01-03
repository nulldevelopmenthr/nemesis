<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method;

interface Definition
{
    public function getInstanceOf();

    /**
     * @deprecated Use getInstanceOf()
     */
    public function getName();

    public function getInstanceOfName(): string;

    /**
     * @deprecated Use getInstanceOfName()
     */
    public function getClassName(): string;

    public function getNamespace(): ?string;

    public function getInstanceOfFullName(): string;

    /**
     * @deprecated Use getInstanceOfFullName()
     */
    public function getFullClassName();

    public function hasParent(): bool;

    public function getParentClassName();

    public function getParentFullClassName();

    public function getParentAlias(): ?string;

    public function hasTraits(): bool;

    public function getTraits(): array;

    public function getConstants(): array;

    public function getInterfaces(): array;

    public function getProperties(): array;

    /** @return Method[] */
    public function getMethods(): array;
}
