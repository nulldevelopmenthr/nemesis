<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton;

use Broadway\EventSourcing\EventSourcingRepository;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethodFactory;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @see SpecGeneratorSpec
 * @see SpecGeneratorTest
 */
class SpecGenerator
{
    /** @var ClassSourceFactory */
    private $factory;
    /** @var LetMethodFactory */
    private $letMethodFactory;
    /** @var InitializableMethodFactory */
    private $initializableMethodFactory;
    /** @var ExposeConstructorArgumentsAsGettersMethodFactory */
    private $exposeMethodFactory;

    public function __construct(
        ClassSourceFactory $factory,
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        ExposeConstructorArgumentsAsGettersMethodFactory $exposeMethodFactory
    ) {
        $this->factory                    = $factory;
        $this->letMethodFactory           = $letMethodFactory;
        $this->initializableMethodFactory = $initializableMethodFactory;
        $this->exposeMethodFactory        = $exposeMethodFactory;
    }

    public static function default(): SpecGenerator
    {
        return new self(
            new ClassSourceFactory(),
            new LetMethodFactory(),
            new InitializableMethodFactory(),
            new ExposeConstructorArgumentsAsGettersMethodFactory()
        );
    }

    public function generate(ImprovedClassSource $classSource)
    {
        $specClassType = ClassType::createFromFullyQualified('spec\\'.$classSource->getFullName().'Spec');

        $specSource = $this->factory->createSpec($specClassType);

        $specSource->addImports(...$this->getImports($classSource));
        $specSource->addParent(ClassType::createFromFullyQualified(ObjectBehavior::class));

        $specSource->addMethod(
            $this->letMethodFactory->create($classSource)
        );
        $specSource->addMethod(
            $this->initializableMethodFactory->create($classSource)
        );

        if ($classSource->getParentFullName() !== EventSourcingRepository::class) {
            $specSource->addMethod($this->exposeMethodFactory->create($classSource));
        }

        return $specSource;
    }

    private function getImports(ImprovedClassSource $classSource): array
    {
        $imports = [
            $classSource->getClassType(),
            ClassType::createFromFullyQualified(Argument::class),
        ];

        // Add all imports from source class (except traits).
        foreach ($classSource->getImports() as $import) {
            // Traits do not need to be imported from source class.
            if (false === $import instanceof TraitType) {
                $imports[] = $import;
            }
        }

        // Add all classes used in constructor parameters as imports.
        foreach ($classSource->getConstructorParameters() as $methodParameter) {
            if (true === $methodParameter->hasType()) {
                $imports[] = $methodParameter->getType();
            }
        }

        return $imports;
    }
}
