<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntity;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadEntity;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadEntityFactory
 * @group  integration
 */
class SpecDoctrineReadEntityFactoryTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDoctrineReadEntityFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecDoctrineReadEntityFactory::class);
    }

    /** @dataProvider provideSamples */
    public function testCreateFromDoctrineReadEntity(DoctrineReadEntity $definition, SpecDoctrineReadEntity $expected)
    {
        self::assertEquals($expected, $this->sut->createFromDoctrineReadEntity($definition));
    }

    public function provideSamples()
    {
        $firstName = Fixtures::firstNameProperty();

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);

        return [
            [
                new DoctrineReadEntity(
                    ClassName::create('MyVendor\\User\\UserFirstName'),
                    null,
                    [],
                    [],
                    [],
                    [$firstName],
                    [$constructorMethod, $getterMethod]
                ),
                new SpecDoctrineReadEntity(
                    ClassName::create('spec\\MyVendor\\User\\UserFirstNameSpec'),
                    ClassName::create('PhpSpec\\ObjectBehavior'),
                    [],
                    [],
                    [],
                    [],
                    [
                        new LetMethod([$firstName]),
                        new InitializableMethod(ClassName::create('MyVendor\\User\\UserFirstName'), null, []),
                        new SpecGetterMethod('it_exposes_first_name', 'getFirstName', $firstName),
                    ],
                    ClassName::create('MyVendor\\User\\UserFirstName')
                ),
            ],
        ];
    }
}
