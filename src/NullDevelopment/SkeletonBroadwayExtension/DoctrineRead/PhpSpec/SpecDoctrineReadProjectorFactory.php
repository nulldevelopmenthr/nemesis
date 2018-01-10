<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjector;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see SpecDoctrineReadProjectorFactorySpec
 * @see SpecDoctrineReadProjectorFactoryTest
 */
class SpecDoctrineReadProjectorFactory
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

    public function createFromDoctrineReadProjector(DoctrineReadProjector $definition): SpecDoctrineReadProjector
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getInstanceOfFullName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecDoctrineReadProjector(
            $specClassName, $specParentName, [], [], [], [], $methods, $definition->getInstanceOf()
        );
    }
}
