<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\DateTimeValueObjectGenerator;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\DateTimeValueObjectGenerator
 * @group  integration
 */
class DateTimeValueObjectGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var DateTimeValueObjectGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(DateTimeValueObjectGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(DateTimeValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(DateTimeValueObject $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(DateTimeValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
