<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use Webmozart\Assert\Assert;

/**
 * @see SpecSimpleCollectionFactorySpec
 * @see SpecSimpleCollectionFactoryTest
 */
class SpecSimpleCollectionFactory
{
    /**
     * @var array
     */
    private $factories;

    public function __construct(array $factories)
    {
        Assert::allIsInstanceOf($factories, PhpSpecMethodFactory::class);
        $this->factories = $factories;
    }

    public function createFromSimpleCollection(SimpleCollection $definition): SpecSimpleCollection
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getFullClassName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecSimpleCollection(
            $specClassName,
            $specParentName,
            [],
            [],
            [],
            $methods,
            $definition->getName(),
            $definition->getCollectionOf()
        );
    }
}
