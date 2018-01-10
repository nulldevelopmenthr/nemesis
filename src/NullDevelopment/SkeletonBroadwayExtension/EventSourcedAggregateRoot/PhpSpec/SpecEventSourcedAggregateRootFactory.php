<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactorySpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactoryTest
 */
class SpecEventSourcedAggregateRootFactory
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

    public function createFromEventSourcedAggregateRoot(EventSourcedAggregateRoot $definition): SpecEventSourcedAggregateRoot
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getInstanceOfFullName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecEventSourcedAggregateRoot(
            $specClassName, $specParentName, [], [], [], [], $methods, $definition->getInstanceOf()
        );
    }
}
