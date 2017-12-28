<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestDateTimeValueObject;
use NullDevelopment\Skeleton\PhpUnitMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use Webmozart\Assert\Assert;

/**
 * @see TestDateTimeValueObjectFactorySpec
 * @see TestDateTimeValueObjectFactoryTest
 */
class TestDateTimeValueObjectFactory
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

    public function createFromDateTimeValueObject(DateTimeValueObject $definition): TestDateTimeValueObject
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

        return new TestDateTimeValueObject($testClassName, $testParentName, [], [], $properties, $methods, $definition->getName());
    }
}
