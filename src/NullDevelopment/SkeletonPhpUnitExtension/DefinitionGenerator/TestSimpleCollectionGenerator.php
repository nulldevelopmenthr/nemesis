<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleCollection;

/**
 * @see TestSimpleCollectionGeneratorSpec
 * @see TestSimpleCollectionGeneratorTest
 */
class TestSimpleCollectionGenerator extends BaseTestDefinitionGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(array $methodGenerators, ExampleMaker $exampleMaker)
    {
        parent::__construct($methodGenerators);
        $this->exampleMaker = $exampleMaker;
    }

    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSimpleCollection) {
            return true;
        }

        return false;
    }

    protected function processMethods(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        $var = new SimpleVariable('zzz', $definition->getCollectionOf()->getClassName());

        $exampleValue = $this->exampleMaker->instance($var);

        foreach ($exampleValue->classesToImport() as $netteCodeToImport) {
            $namespace->addUse($netteCodeToImport->getFullName());
        }

        $netteCode->addMethod('setUp')
            ->setVisibility(Visibility::PUBLIC)
            ->addBody(sprintf('$this->elements = [%s];', $exampleValue))
            ->addBody(
                sprintf('$this->sut = new %s(%s);', $definition->getSubjectUnderTest()->getName(), '$this->elements')
            );

        $netteCode->addMethod('testGetElements')
            ->addBody('self::assertSame($this->elements, $this->sut->toArray());');

        if (true === $definition->isSerializationEnabled()) {
            $netteCode->addMethod('testSerializeAndDeserialize')
                ->addBody('$serialized = $this->sut->serialize();')
                ->addBody('$serializedJson = json_encode($serialized);')
                ->addBody(
                    'self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));'
                );
        }
    }
}
