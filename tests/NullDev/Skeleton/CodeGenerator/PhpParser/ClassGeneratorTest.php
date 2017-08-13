<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use NullDev\Skeleton\CodeGenerator\PhpParser\ClassGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\Builder\Class_;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\ClassGenerator
 * @group  nemesis
 */
class ClassGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var ClassGenerator */
    private $classGenerator;

    public function setUp(): void
    {
        $this->classGenerator = new ClassGenerator(new BuilderFactory());
    }

    public function testClassWithoutExtraAdditionWorks(): void
    {
        $input  = new ImprovedClassSource(ClassType::createFromFullyQualified('MyCompany\Namespace\User'));
        $result = $this->classGenerator->generate($input);

        self::assertInstanceOf(Class_::class, $result);
    }

    public function testClassWithParentWorks(): void
    {
        $input = new ImprovedClassSource(ClassType::createFromFullyQualified('MyCompany\Namespace\User'));
        $input->addParent(ClassType::createFromFullyQualified('Vendor\Namespace\User'));
        $result = $this->classGenerator->generate($input);

        self::assertInstanceOf(Class_::class, $result);
    }

    public function testClassWithInterfaces(): void
    {
        $input = new ImprovedClassSource(ClassType::createFromFullyQualified('MyCompany\Namespace\User'));
        $input->addInterface(InterfaceType::createFromFullyQualified('SomeInterface'));
        $input->addInterface(InterfaceType::createFromFullyQualified('AnotherInterface'));
        $result = $this->classGenerator->generate($input);

        self::assertInstanceOf(Class_::class, $result);
    }

    public function testClassWithTraits(): void
    {
        $input = new ImprovedClassSource(ClassType::createFromFullyQualified('MyCompany\Namespace\User'));
        $input->addTrait(TraitType::createFromFullyQualified('SomeTrait'));
        $input->addTrait(TraitType::createFromFullyQualified('AnotherTrait'));
        $result = $this->classGenerator->generate($input);

        self::assertInstanceOf(Class_::class, $result);
    }

    public function testClassWithProperties(): void
    {
        $input = new ImprovedClassSource(ClassType::createFromFullyQualified('MyCompany\Namespace\User'));
        $input->addProperty(Parameter::create('firstName'));
        $input->addProperty(Parameter::create('lastName', 'LastName'));
        $result = $this->classGenerator->generate($input);

        self::assertInstanceOf(Class_::class, $result);
    }
}
