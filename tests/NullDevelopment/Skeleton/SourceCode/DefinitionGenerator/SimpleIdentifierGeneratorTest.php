<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleIdentifierGenerator;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleIdentifierGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SimpleIdentifierGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;
    /** @var SimpleIdentifierGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleIdentifierGenerator::class);
    }

    /** @dataProvider provideSimpleIdentifier */
    public function testSupports(SimpleIdentifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSimpleIdentifier */
    public function testGenerateAsString(SimpleIdentifier $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideSimpleIdentifier */
    public function testGenerate(SimpleIdentifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSimpleIdentifier(): array
    {
        $class   = Fixtures::userEntity();
        $integer = Fixtures::integerIdProperty();

        $constructorMethod = new ConstructorMethod([$integer]);
        $getIdMethod       = new GetterMethod('getId', $integer);

        $toStringMethod    = new ToStringMethod($integer);
        $serializeMethod   = new SerializeMethod($class, [$integer]);
        $deserializeMethod = new DeserializeMethod($class, [$integer]);

        return [
            [
                new SimpleIdentifier(
                    $class,
                    null,
                    [],
                    [],
                    [$integer],
                    [
                        $constructorMethod,
                        $getIdMethod,
                        $toStringMethod,
                        $serializeMethod,
                        $deserializeMethod,
                    ]
                ),
                'simple_identifier.id.output',
            ],
        ];
    }
}
