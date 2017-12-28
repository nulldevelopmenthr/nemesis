<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Source;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Source\ImprovedClassSource
 * @group  nemesis
 */
class ImprovedClassSourceTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function testDefaultGetters(): void
    {
        $classType           = ClassType::createFromFullyQualified('Vendor\Namespace\Name');
        $improvedClassSource = new ImprovedClassSource($classType);

        self::assertSame($classType, $improvedClassSource->getClassType());
        self::assertTrue($improvedClassSource->hasNamespace());
        self::assertEquals('Vendor\Namespace', $improvedClassSource->getNamespace());
        self::assertEquals('Name', $improvedClassSource->getName());
        self::assertEquals('Vendor\Namespace\Name', $improvedClassSource->getFullName());
        self::assertEmpty($improvedClassSource->getDocComments());

        self::assertFalse($improvedClassSource->hasParent());
        self::assertNull($improvedClassSource->getParent());
        self::assertNull($improvedClassSource->getParentName());
        self::assertNull($improvedClassSource->getParentFullName());

        self::assertFalse($improvedClassSource->hasInterfaces());
        self::assertEmpty($improvedClassSource->getInterfaces());

        self::assertFalse($improvedClassSource->hasTraits());
        self::assertEmpty($improvedClassSource->getTraits());

        self::assertFalse($improvedClassSource->hasConstructorMethod());
        self::assertNull($improvedClassSource->getConstructorMethod());
        self::assertEmpty($improvedClassSource->getConstructorParameters());

        self::assertEmpty($improvedClassSource->getProperties());

        self::assertEmpty($improvedClassSource->getMethods());

        self::assertEmpty($improvedClassSource->getImports());
    }

    public function testStaticTypesWillNotBeAddedToImport(): void
    {
        $classType           = ClassType::createFromFullyQualified('Vendor\Namespace\Name');
        $improvedClassSource = new ImprovedClassSource($classType);

        $improvedClassSource->addImport(new StringType());
        $improvedClassSource->addImport(new IntType());
        $improvedClassSource->addImport(new ArrayType());
        $improvedClassSource->addImport(new FloatType());
        $improvedClassSource->addImport(new BoolType());

        self::assertEmpty($improvedClassSource->getImports());
    }

    /**
     * @expectedException \Exception
     */
    public function testOnlyOneConstructorMethodCanBeAdded(): void
    {
        $improvedClassSource = new ImprovedClassSource(ClassType::createFromFullyQualified('Vendor\Namespace\Name'));

        $improvedClassSource->addConstructorMethod(new ConstructorMethod([]));
        $improvedClassSource->addConstructorMethod(new ConstructorMethod([]));
    }
}
