<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadEntity;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see SpecDoctrineReadEntityFactorySpec
 * @see SpecDoctrineReadEntityFactoryTest
 */
class SpecDoctrineReadEntityFactory
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

    public function createFromDoctrineReadEntity(DoctrineReadEntity $definition): SpecDoctrineReadEntity
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getInstanceOfFullName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecDoctrineReadEntity(
            $specClassName, $specParentName, [], [], [], [], $methods, $definition->getInstanceOf()
        );
    }
}
