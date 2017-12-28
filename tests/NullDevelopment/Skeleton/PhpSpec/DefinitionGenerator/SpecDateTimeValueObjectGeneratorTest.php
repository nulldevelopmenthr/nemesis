<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecDateTimeValueObject;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeToStringMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecDateTimeValueObjectGenerator
 * @group  integration
 */
class SpecDateTimeValueObjectGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;
    /** @var SpecDateTimeValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecDateTimeValueObjectGenerator::class);
    }

    /** @dataProvider provideSpecDateTimeValueObject */
    public function testSupports(SpecDateTimeValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSpecDateTimeValueObject */
    public function testGenerateAsString(SpecDateTimeValueObject $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideSpecDateTimeValueObject */
    public function testGenerate(SpecDateTimeValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSpecDateTimeValueObject(): array
    {
        $sutClassName = ClassName::create('MyVendor\\UserCreatedAt');
        $class        = ClassName::create('spec\\MyVendor\\UserCreatedAtSpec');
        $parent       = ClassName::create('PhpSpec\\ObjectBehavior');

        return [
            [
                new SpecDateTimeValueObject(
                    $class,
                    $parent,
                    [],
                    [],
                    [],
                    [
                        new SpecDateTimeToStringMethod(),
                        new SpecDateTimeCreateFromFormatMethod(),
                        new SpecDateTimeSerializeMethod(),
                        new SpecDateTimeDeserializeMethod($sutClassName),
                    ],
                    $sutClassName
                ),
                'datetime.output',
            ],
        ];
    }
}
