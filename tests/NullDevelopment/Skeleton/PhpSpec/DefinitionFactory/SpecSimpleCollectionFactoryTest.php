<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleCollectionFactory
 * @group  integration
 */
class SpecSimpleCollectionFactoryTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecSimpleCollectionFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSimpleCollectionFactory::class);
    }

    /** @dataProvider provideSamples */
    public function testCreateFromSimpleCollection(SimpleCollection $definition, SpecSimpleCollection $expected)
    {
        self::assertEquals($expected, $this->sut->createFromSimpleCollection($definition));
    }

    public function provideSamples()
    {
        $firstName = Fixtures::firstNameProperty();

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);

        return [
            [
                new SimpleCollection(
                    ClassName::create('MyVendor\\User\\UserFirstName'),
                    null,
                    [],
                    [],
                    [$firstName],
                    [$constructorMethod, $getterMethod],
                    new CollectionOf(
                        ClassName::create('MyVendor\User\Username'),
                        'getId',
                        ClassName::create('MyVendor\User\UserId')
                    )
                ),
                new SpecSimpleCollection(
                    ClassName::create('spec\\MyVendor\\User\\UserFirstNameSpec'),
                    ClassName::create('PhpSpec\\ObjectBehavior'),
                    [],
                    [],
                    [],
                    [
                        new LetMethod([$firstName]),
                        new InitializableMethod(ClassName::create('MyVendor\\User\\UserFirstName'), null, []),
                        new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName),
                    ],
                    ClassName::create('MyVendor\\User\\UserFirstName'),
                    new CollectionOf(
                        ClassName::create('MyVendor\User\Username'),
                        'getId',
                        ClassName::create('MyVendor\User\UserId')
                    )
                ),
            ],
        ];
    }
}
