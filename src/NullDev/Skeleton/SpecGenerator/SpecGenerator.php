<?php

declare(strict_types=1);

namespace NullDev\Skeleton\SpecGenerator;

use Broadway\EventSourcing\EventSourcingRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethodFactory;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\InitializableMethodFactory;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\LetMethodFactory;
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
        $specClassType = ClassType::create('spec\\'.$classSource->getFullName().'Spec');

        $specSource = $this->factory->create($specClassType);

        $specSource->addImports(...$this->getImports($classSource));
        $specSource->addParent(ClassType::create(ObjectBehavior::class));

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
            ClassType::create(Argument::class),
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
            if (true === $methodParameter->hasClass()) {
                $imports[] = $methodParameter->getClassType();
            }
        }

        return $imports;
    }
}
