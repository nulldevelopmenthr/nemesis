<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepository;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see TestDoctrineReadRepositoryFactorySpec
 * @see TestDoctrineReadRepositoryFactoryTest
 */
class TestDoctrineReadRepositoryFactory
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

    public function createFromDoctrineReadRepository(DoctrineReadRepository $definition): TestDoctrineReadRepository
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

        return new TestDoctrineReadRepository($testClassName, $testParentName, [], [], [], $properties, $methods, $definition->getInstanceOf());
    }
}
