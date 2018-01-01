<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\Skeleton\SourceCode\Result;
use Webmozart\Assert\Assert;

/**
 * @see InterfaceGeneratorSpec
 * @see InterfaceGeneratorTest
 */
class InterfaceGenerator implements DefinitionGenerator
{
    /** @var MethodGenerator[] */
    private $methodGenerators;

    public function __construct(array $methodGenerators)
    {
        Assert::allIsInstanceOf($methodGenerators, MethodGenerator::class);
        $this->methodGenerators = $methodGenerators;
    }

    public function supports(Definition $definition): bool
    {
        if ($definition instanceof InterfaceDefinition) {
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

        $interface = $namespace->addInterface($definition->getClassName());

        if (true === $definition->hasParent()) {
            $interface->setExtends($definition->getParentFullClassName());
            $namespace->addUse($definition->getParentFullClassName(), $definition->getParentAlias());
        }

        foreach ($definition->getConstants() as $constant) {
            $interface->addConstant($constant->getConstantName()->__toString(), $constant->getValue());
        }

        return $namespace;
    }

    public function handleInterfaceDefinition(InterfaceDefinition $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
