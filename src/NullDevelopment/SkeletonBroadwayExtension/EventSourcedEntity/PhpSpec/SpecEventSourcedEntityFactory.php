<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactorySpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactoryTest
 */
class SpecEventSourcedEntityFactory
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

    public function createFromEventSourcedEntity(EventSourcedEntity $definition): SpecEventSourcedEntity
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getFullClassName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecEventSourcedEntity($specClassName, $specParentName, [], [], [], [], $methods, $definition->getName());
    }
}
