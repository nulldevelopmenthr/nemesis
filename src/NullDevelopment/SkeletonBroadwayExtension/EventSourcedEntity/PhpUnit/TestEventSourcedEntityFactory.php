<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactorySpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactoryTest
 */
class TestEventSourcedEntityFactory
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

    public function createFromEventSourcedEntity(EventSourcedEntity $definition): TestEventSourcedEntity
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

        return new TestEventSourcedEntity($testClassName, $testParentName, [], [], [], $properties, $methods, $definition->getInstanceOf());
    }
}
