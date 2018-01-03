<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SingleValueObject;
use Webmozart\Assert\Assert;

/**
 * @see TestSingleValueObjectFactorySpec
 * @see TestSingleValueObjectFactoryTest
 */
class TestSingleValueObjectFactory
{
    /**
     * @var array
     */
    private $factories;

    public function __construct(array $factories)
    {
        Assert::allIsInstanceOf($factories, PhpUnitMethodFactory::class);
        $this->factories = $factories;
    }

    public function createFromSingleValueObject(SingleValueObject $definition): TestSingleValueObject
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $testClassName  = ClassName::create('Tests\\'.$definition->getInstanceOfFullName().'Test');
        $testParentName = ClassName::create('PHPUnit\\Framework\\TestCase');

        $properties = [];

        foreach ($definition->getProperties() as $property) {
            $properties[] = $property;
        }
        $properties[] = new Property('sut', $definition->getInstanceOf(), false, false, null, new Visibility('private'));

        return new TestSingleValueObject($testClassName, $testParentName, [], [], [], $properties, $methods, $definition->getInstanceOf());
    }
}
