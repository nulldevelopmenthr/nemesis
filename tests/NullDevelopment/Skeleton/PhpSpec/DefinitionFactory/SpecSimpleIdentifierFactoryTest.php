<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleIdentifier;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleIdentifierFactory
 * @group  integration
 */
class SpecSimpleIdentifierFactoryTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecSimpleIdentifierFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSimpleIdentifierFactory::class);
    }

    /** @dataProvider provideSamples */
    public function testCreateFromSimpleIdentifier(SimpleIdentifier $definition, SpecSimpleIdentifier $expected)
    {
        self::assertEquals($expected, $this->sut->createFromSimpleIdentifier($definition));
    }

    public function provideSamples()
    {
        $firstName = Fixtures::firstNameProperty();

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);

        return [
            [
                new SimpleIdentifier(
                    ClassName::create('MyVendor\\User\\UserFirstName'),
                    null,
                    [],
                    [],
                    [$firstName],
                    [$constructorMethod, $getterMethod]
                ),
                new SpecSimpleIdentifier(
                    ClassName::create('spec\\MyVendor\\User\\UserFirstNameSpec'),
                    ClassName::create('PhpSpec\\ObjectBehavior'),
                    [],
                    [],
                    [],
                    [
                        new LetMethod([$firstName]),
                        new InitializableMethod(ClassName::create('MyVendor\\User\\UserFirstName'), null, []),
                        new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName),
                    ]
                ),
            ],
        ];
    }
}
