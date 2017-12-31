<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleCollection;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see TestSimpleCollectionFactorySpec
 * @see TestSimpleCollectionFactoryTest
 */
class TestSimpleCollectionFactory
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

    public function createFromSimpleCollection(SimpleCollection $definition): TestSimpleCollection
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $testClassName  = ClassName::create('Tests\\'.$definition->getFullClassName().'Test');
        $testParentName = ClassName::create('PHPUnit\\Framework\\TestCase');

        $properties = [];

        foreach ($definition->getProperties() as $property) {
            $properties[] = $property;
        }
        $properties[] = new Property('sut', $definition->getName(), false, false, null, new Visibility('private'));

        return new TestSimpleCollection(
            $testClassName,
            $testParentName,
            [],
            [],
            $properties,
            $methods,
            $definition->getName(),
            $definition->getCollectionOf()
        );
    }
}