<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton;

use NullDev\Nemesis\Config\Config;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see PHPUnitTestGeneratorSpec
 * @see PHPUnitTestGeneratorTest
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
            $testSource->addProperty(
                new Parameter(lcfirst($constructorParameter->getName()), $constructorParameter->getType())
            );
        }

        $testSource->addProperty(
            new Parameter(lcfirst($improvedClassSource->getName()), $improvedClassSource->getClassType())
        );

        $setUpMethod = new SetUpMethod($improvedClassSource);

        foreach ($setUpMethod->getSubjectUnderTestConstuctorParametersAsClassTypes() as $item) {
            $testSource->addImport($item);
        }

        $testSource->addMethod($setUpMethod);

        foreach ($improvedClassSource->getMethods() as $method) {
            if ($method instanceof GetterMethod) {
                $testGetterMethod = new TestGetterMethod($method, lcfirst($improvedClassSource->getName()));

                $testSource->addMethod($testGetterMethod);
            } elseif ($method instanceof ConstructorMethod) {
                continue;
            }
        }

        return $testSource;
    }
}
