<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleEntity;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\SimpleEntityGenerator;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\SimpleEntityGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SimpleEntityGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var SimpleEntityGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SimpleEntityGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SimpleEntity $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SimpleEntity $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SimpleEntity $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
