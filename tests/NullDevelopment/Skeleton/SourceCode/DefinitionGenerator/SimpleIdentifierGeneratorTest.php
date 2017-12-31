<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleIdentifierGenerator;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleIdentifierGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SimpleIdentifierGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var SimpleIdentifierGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SimpleIdentifierGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SimpleIdentifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SimpleIdentifier $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SimpleIdentifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
