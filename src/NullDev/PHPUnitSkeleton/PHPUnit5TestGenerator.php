<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton;

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

    public function __construct(ClassSourceFactory $factory)
    {
        $this->factory = $factory;
    }

    public static function default(): PHPUnit5TestGenerator
    {
        return new self(new ClassSourceFactory());
    }

    public function generate(ImprovedClassSource $improvedClassSource): ImprovedClassSource
    {
        $testClassType = ClassType::create('tests\\'.$improvedClassSource->getFullName().'Test');

        $testSource = $this->factory->create($testClassType);

        $testSource->addDocComment(new CoversComment($improvedClassSource->getFullName()));
        $testSource->addDocComment(new GroupComment('nemesis'));

        $testSource->addParent(ClassType::create('PHPUnit_Framework_TestCase'));

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
