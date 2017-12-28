<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\DateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\DateTimeValueObjectGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DateTimeValueObjectGeneratorTest extends SfTestCase
{
    /** @var DateTimeValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DateTimeValueObjectGenerator::class);
    }

    /** @dataProvider provideDateTimeValueObject */
    public function testSupports(DateTimeValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDateTimeValueObject */
    public function testGenerateAsString(DateTimeValueObject $definition, string $fileName)
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

    /** @dataProvider provideDateTimeValueObject */
    public function testGenerate(DateTimeValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDateTimeValueObject(): array
    {
        $class  = ClassName::create('MyVendor\\UserCreatedAt');
        $parent = ClassName::create('DateTime');

        $toString               = new DateTimeToStringMethod();
        $createFromFormatMethod = new DateTimeCreateFromFormatMethod();
        $serializeMethod        = new DateTimeSerializeMethod();
        $deserializeMethod      = new DateTimeDeserializeMethod($class);

        return [
            [
                new DateTimeValueObject(
                    $class,
                    $parent,
                    [],
                    [],
                    [],
                    [$toString, $createFromFormatMethod, $serializeMethod, $deserializeMethod]
                ),
                'datetime.output',
            ],
        ];
    }
}
