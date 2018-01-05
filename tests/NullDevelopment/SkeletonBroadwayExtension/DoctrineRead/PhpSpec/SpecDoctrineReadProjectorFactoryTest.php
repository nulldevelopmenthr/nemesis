<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjector;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjectorFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjector;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\LetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpec\SpecDoctrineReadProjectorFactory
 * @group  integration
 */
class SpecDoctrineReadProjectorFactoryTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDoctrineReadProjectorFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecDoctrineReadProjectorFactory::class);
    }

    /** @dataProvider provideSamples */
    public function testCreateFromDoctrineReadProjector(DoctrineReadProjector $definition, SpecDoctrineReadProjector $expected)
    {
        self::assertEquals($expected, $this->sut->createFromDoctrineReadProjector($definition));
    }

    public function provideSamples()
    {
        $firstName = Fixtures::firstNameProperty();

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);

        return [
            [
                new DoctrineReadProjector(
                    ClassName::create('MyVendor\\User\\UserFirstName'),
                    null,
                    [],
                    [],
                    [],
                    [$firstName],
                    [$constructorMethod, $getterMethod]
                ),
                new SpecDoctrineReadProjector(
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
