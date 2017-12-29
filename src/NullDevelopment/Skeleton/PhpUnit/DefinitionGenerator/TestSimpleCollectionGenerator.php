<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

/**
 * @see TestSimpleCollectionGeneratorSpec
 * @see TestSimpleCollectionGeneratorTest
 */
class TestSimpleCollectionGenerator implements DefinitionGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function supports(Definition $definition): bool
    {
        if ($definition instanceof TestSimpleCollection) {
            return true;
        }

        return false;
    }

    public function generateAsString(Definition $definition): string
    {
        $code = $this->generate($definition);

        return $code->__toString();
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function generate(Definition $definition): PhpNamespace
    {
        if (null === $definition->getNamespace()) {
            $namespace = new PhpNamespace('');
        } else {
            $namespace = new PhpNamespace($definition->getNamespace());
        }

        $code = $namespace->addClass($definition->getClassName());

        if (true === $definition->hasParent()) {
            $code->setExtends($definition->getParentFullClassName());
            $namespace->addUse($definition->getParentFullClassName());
        }

        foreach ($definition->getInterfaces() as $interface) {
            $code->addImplement($interface->getFullName());
            $namespace->addUse($interface->getFullName());
        }

        foreach ($definition->getProperties() as $property) {
            $propertyCode = $code->addProperty($property->getName())
                ->setVisibility((string) $property->getVisibility());

            if (true === $property->hasDefaultValue()) {
                $propertyCode->setValue($property->getDefaultValue());
            }
            if (true === $property->isNullable()) {
                $propertyCode->addComment(sprintf('@var %s|null', $property->getInstanceNameAsString()));
            } else {
                $propertyCode->addComment(sprintf('@var %s', $property->getInstanceNameAsString()));
            }

            if (true === $property->isObject()) {
                $namespace->addUse($property->getInstanceFullName());
            }
        }

        $var = new SimpleVariable('zzz', $definition->getCollectionOf()->getClassName());

        $exampleValue = $this->exampleMaker->instance($var);

        foreach ($exampleValue->classesToImport() as $codeToImport) {
            $namespace->addUse($codeToImport->getFullName());
        }

        $code->addMethod('setUp')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->elements = [%s];', $exampleValue))
                ->addBody(sprintf('$this->sut = new %s(%s);', substr($definition->getClassName(), 0, -4), '$this->elements'));

        $code->addMethod('testGetElements')
                ->addBody('self::assertSame($this->elements, $this->sut->toArray());');

        $code->addMethod('testSerializeAndDeserialize')
                ->addBody('$serialized = $this->sut->serialize();')
                ->addBody('$serializedJson = json_encode($serialized);')
                ->addBody('self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));');

        return $namespace;
    }
}
