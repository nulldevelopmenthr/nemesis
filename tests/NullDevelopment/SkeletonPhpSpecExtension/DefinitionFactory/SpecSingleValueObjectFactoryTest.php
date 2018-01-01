<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSingleValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\GetterSpecMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSingleValueObjectFactory
 * @group  integration
 */
class SpecSingleValueObjectFactoryTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecSingleValueObjectFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSingleValueObjectFactory::class);
    }

    /** @dataProvider provideSamples */
    public function testCreateFromSingleValueObject(SingleValueObject $definition, SpecSingleValueObject $expected)
    {
        self::assertEquals($expected, $this->sut->createFromSingleValueObject($definition));
    }

    public function provideSamples()
    {
        $firstName = Fixtures::firstNameProperty();

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);

        return [
            [
                new SingleValueObject(
                    ClassName::create('MyVendor\\User\\UserFirstName'),
                    null,
                    [],
                    [],
                    [],
                    [$firstName],
                    [$constructorMethod, $getterMethod]
                ),
                new SpecSingleValueObject(
                    ClassName::create('spec\\MyVendor\\User\\UserFirstNameSpec'),
                    ClassName::create('PhpSpec\\ObjectBehavior'),
                    [],
                    [],
                    [],
                    [],
                    [
                        new LetMethod([$firstName]),
                        new InitializableMethod(ClassName::create('MyVendor\\User\\UserFirstName'), null, []),
                        new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName),
                    ],
                    ClassName::create('MyVendor\\User\\UserFirstName')
                ),
            ],
        ];
    }
}
