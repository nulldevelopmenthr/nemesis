<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton;

use NullDev\Nemesis\Config\Config;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see PHPUnit5TestGeneratorSpec
 * @see PHPUnit5TestGeneratorTest
 */
class PHPUnit5TestGenerator
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

    public static function default(Config $config): PHPUnit5TestGenerator
    {
        return new self(new ClassSourceFactory(), $config);
    }

    public function generate(ImprovedClassSource $improvedClassSource): ImprovedClassSource
    {
        $testClassName = $improvedClassSource->getFullName().'Test';

        if ('' !== $this->config->getTestsNamespace()) {
            $testClassName = $this->config->getTestsNamespace().'\\'.$testClassName;
        }

        $testClassType = ClassType::create($testClassName);

        $testSource = $this->factory->create($testClassType);

        $testSource->addDocComment(new CoversComment($improvedClassSource->getFullName()));
        $testSource->addDocComment(new GroupComment('todo'));

        $testSource->addParent(ClassType::create($this->config->getBaseTestClassName()));

        $testSource->addImport($improvedClassSource->getClassType());
        $testSource->addImport(ClassType::create('Mockery'));

        $testSource->addProperty(
            new Parameter(lcfirst($improvedClassSource->getName()), $improvedClassSource->getClassType())
        );

        $testSource->addMethod(new SetUpMethod($improvedClassSource));
        $testSource->addMethod(new TestNothingMethod($improvedClassSource));

        return $testSource;
    }
}
