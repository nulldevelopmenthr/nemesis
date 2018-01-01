<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleIdentifier;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see TestSimpleIdentifierFactorySpec
 * @see TestSimpleIdentifierFactoryTest
 */
class TestSimpleIdentifierFactory
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

    public function createFromSimpleIdentifier(SimpleIdentifier $definition): TestSimpleIdentifier
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

        return new TestSimpleIdentifier($testClassName, $testParentName, [], [], [], $properties, $methods, $definition->getName());
    }
}
