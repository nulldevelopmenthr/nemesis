<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSingleValueObject;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSingleValueObjectGenerator
 * @group  integration
 */
class SpecSingleValueObjectGeneratorTest extends SfTestCase
{
    /** @var SpecSingleValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSingleValueObjectGenerator::class);
    }

    /** @dataProvider provideSpecSingleValueObject */
    public function testSupports(SpecSingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSpecSingleValueObject */
    public function testGenerateAsString(SpecSingleValueObject $definition, string $fileName)
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

    /** @dataProvider provideSpecSingleValueObject */
    public function testGenerate(SpecSingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSpecSingleValueObject(): array
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
                new SpecSingleValueObject($class, $parent, [], [], [], [$letMethod, $initializableMethod, $exposesFirstName, $exposesValue]),
                'single_value_object.empty.output',
            ],
        ];
    }
}
