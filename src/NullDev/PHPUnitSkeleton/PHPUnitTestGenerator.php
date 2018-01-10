<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton;

use NullDev\Nemesis\Config\Config;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestSkippedMethod;
use NullDev\PHPUnitSkeleton\Definition\PHP\MockedProperty;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GenericMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see PHPUnitTestGeneratorSpec
 * @see PHPUnitTestGeneratorTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 */
class PHPUnitTestGenerator
{
    /** @var ClassSourceFactory */
    private $factory;

    /** @var Config */
    private $config;

    public function __construct(ClassSourceFactory $factory, Config $config)
    {
        $this->factory = $factory;
        $this->config  = $config;
    }

    public function generate(ImprovedClassSource $improvedClassSource): ImprovedClassSource
    {
        $testClassName = $improvedClassSource->getFullName().'Test';

        if ('' !== $this->config->getTestsNamespace()) {
            $testClassName = $this->config->getTestsNamespace().'\\'.$testClassName;
        }

        $testClassType = ClassType::createFromFullyQualified($testClassName);

        $testSource = $this->factory->createTest($testClassType);

        $testSource->addDocComment(new CoversComment($improvedClassSource->getFullName()));
        $testSource->addDocComment(new GroupComment('todo'));

        $testSource->addParent(ClassType::createFromFullyQualified($this->config->getBaseTestClassName()));

        $testSource->addImport($improvedClassSource->getClassType());
        $testSource->addImport(ClassType::createFromFullyQualified('Mockery'));

        $testSource->addTrait(TraitType::createFromFullyQualified('Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration'));

        foreach ($improvedClassSource->getConstructorParameters() as $constructorParameter) {
            $hasType = $constructorParameter->hasType();
            if ($hasType && false === ($constructorParameter->getType() instanceof TypeDeclaration)) {
                $testSource->addImport(ClassType::createFromFullyQualified('Mockery\MockInterface'));

                $property = new MockedProperty(
                    lcfirst($constructorParameter->getName()), $constructorParameter->getType()
                );
            } else {
                $property = new Property(lcfirst($constructorParameter->getName()), $constructorParameter->getType());
            }

            $testSource->addProperty($property);
        }

        $testSource->addProperty(new Property('sut', $improvedClassSource->getClassType()));

        $setUpMethod = new SetUpMethod($improvedClassSource);

        foreach ($setUpMethod->getSubjectUnderTestConstuctorParametersAsClassTypes() as $item) {
            $testSource->addImport($item);
        }

        $testSource->addMethod($setUpMethod);

        foreach ($improvedClassSource->getMethods() as $method) {
            if ($method instanceof GetterMethod) {
                $testGetterMethod = new TestGetterMethod($method, lcfirst($improvedClassSource->getName()));

                $testSource->addMethod($testGetterMethod);
            } elseif ($method instanceof GenericMethod) {
                $testSource->addMethod(new TestSkippedMethod($method->getMethodName()));
            } elseif ($method instanceof ConstructorMethod) {
                continue;
            }
        }

        if (1 === count($testSource->getMethods())) {
            $testSource->addMethod(new TestNothingMethod($improvedClassSource));
        }

        return $testSource;
    }
}
