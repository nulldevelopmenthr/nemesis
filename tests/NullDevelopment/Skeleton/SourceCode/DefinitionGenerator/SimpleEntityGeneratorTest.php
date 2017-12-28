<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleEntityGenerator;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleEntityGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SimpleEntityGeneratorTest extends SfTestCase
{
    /** @var SimpleEntityGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleEntityGenerator::class);
    }

    /** @dataProvider provideSimpleEntity */
    public function testSupports(SimpleEntity $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSimpleEntity */
    public function testGenerateAsString(SimpleEntity $definition, string $fileName)
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

    /** @dataProvider provideSimpleEntity */
    public function testGenerate(SimpleEntity $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSimpleEntity(): array
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
                new SimpleEntity(
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
                'simple_entity.id.output',
            ],
        ];
    }
}
