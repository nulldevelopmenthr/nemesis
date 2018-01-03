<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecDateTimeValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\DateTimeValueObject;
use Webmozart\Assert\Assert;

/**
 * @see SpecDateTimeValueObjectFactorySpec
 * @see SpecDateTimeValueObjectFactoryTest
 */
class SpecDateTimeValueObjectFactory
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

    public function createFromDateTimeValueObject(DateTimeValueObject $definition): SpecDateTimeValueObject
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getInstanceOfFullName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecDateTimeValueObject($specClassName, $specParentName, [], [], [], [], $methods, $definition->getInstanceOf());
    }
}
