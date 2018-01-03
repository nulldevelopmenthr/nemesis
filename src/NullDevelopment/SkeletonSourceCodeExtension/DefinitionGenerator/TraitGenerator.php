<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\PhpStructure\Type\TraitDefinition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\Core\Result;
use Webmozart\Assert\Assert;

/**
 * @see TraitGeneratorSpec
 * @see TraitGeneratorTest
 */
class TraitGenerator implements DefinitionGenerator
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
        if ($definition instanceof TraitDefinition) {
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

        $trait = $namespace->addTrait($definition->getInstanceOfName());

        if (true === $definition->hasTraits()) {
            foreach ($definition->getTraits() as $subTrait) {
                $trait->addTrait($subTrait->getClassName());
                $namespace->addUse($subTrait->getFullClassName());
            }
        }

        return $namespace;
    }

    public function handleTraitDefinition(TraitDefinition $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
