<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\InitializableMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\InitializableMethodFactory
 * @group  unit
 */
class InitializableMethodFactoryTest extends TestCase
{
    /** @var InitializableMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new InitializableMethodFactory();
    }

    /** @dataProvider provideSourceCodeDefinitions */
    public function testCreateFromConstructorMethod(ClassDefinition $definition)
    {
        $result = $this->sut->create($definition);

        self::assertCount(1, $result);
        self::assertContainsOnlyInstancesOf(InitializableMethod::class, $result);
    }

    public function provideSourceCodeDefinitions(): array
    {
        $definition = new ClassDefinition(ClassName::create('MyVendor\\User\\UserFirstName'), null, [], [], [], []);

        return [
            [$definition],
        ];
    }
}
