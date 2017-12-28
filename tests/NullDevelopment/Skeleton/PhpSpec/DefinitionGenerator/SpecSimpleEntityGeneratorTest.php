<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleEntity;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleEntityGenerator
 * @group  integration
 */
class SpecSimpleEntityGeneratorTest extends SfTestCase
{
    /** @var SpecSimpleEntityGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSimpleEntityGenerator::class);
    }

    /** @dataProvider provideSpecSimpleEntity */
    public function testSupports(SpecSimpleEntity $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSpecSimpleEntity */
    public function testGenerateAsString(SpecSimpleEntity $definition, string $fileName)
    {
        $fileName = __DIR__.'/output/'.$fileName;
        $expected = @file_get_contents($fileName);

        $result = $this->sut->generateAsString($definition);

        if (true === empty($expected)) {
            file_put_contents($fileName, $result);
            self::markTestSkipped('Generating output for '.$fileName);
        } else {
            self::assertEquals($expected, $result);
        }
    }

    /** @dataProvider provideSpecSimpleEntity */
    public function testGenerate(SpecSimpleEntity $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSpecSimpleEntity(): array
    {
        $sutClass = Fixtures::userEntity();

        $firstName = Fixtures::firstNameProperty();

        $class  = ClassName::create('spec\\MyVendor\\UserEntitySpec');
        $parent = ClassName::create('PhpSpec\\ObjectBehavior');

        $letMethod           = new LetMethod([$firstName]);
        $initializableMethod = new InitializableMethod($sutClass, null, []);
        $exposesFirstName    = new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName);
        $exposesValue        = new GetterSpecMethod('it_exposes_value', 'getValue', $firstName);

        return [
            [
                new SpecSimpleEntity($class, $parent, [], [], [], [$letMethod, $initializableMethod, $exposesFirstName, $exposesValue]),
                'simple_entity.empty.output',
            ],
        ];
    }
}
