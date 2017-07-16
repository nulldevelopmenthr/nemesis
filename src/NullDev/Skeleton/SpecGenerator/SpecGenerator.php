<?php

declare(strict_types=1);

namespace NullDev\Skeleton\SpecGenerator;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethod;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\InitializableMethodFactory;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\LetMethod;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @see SpecGeneratorSpec
 * @see SpecGeneratorTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SpecGenerator
{
    /** @var ClassSourceFactory */
    private $factory;
    /** @var InitializableMethodFactory */
    private $initializableMethodFactory;

    public function __construct(ClassSourceFactory $factory, InitializableMethodFactory $initializableMethodFactory)
    {
        $this->factory                    = $factory;
        $this->initializableMethodFactory = $initializableMethodFactory;
    }

    public static function default(): SpecGenerator
    {
        return new self(new ClassSourceFactory(), new InitializableMethodFactory());
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function generate(ImprovedClassSource $classSource)
    {
        $specClassType = ClassType::create('spec\\'.$classSource->getFullName().'Spec');

        $specSource = $this->factory->create($specClassType);

        foreach ($classSource->getImports() as $import) {
            // Traits do not need to be imported from source class.
            if (false === $import instanceof TraitType) {
                $specSource->addImport($import);
            }
        }

        $specSource->addImport($classSource->getClassType());
        $specSource->addImport(ClassType::create(Argument::class));
        $specSource->addParent(ClassType::create(ObjectBehavior::class));

        $lets = $classSource->getConstructorParameters();

        foreach ($classSource->getConstructorParameters() as $methodParameter) {
            if ($methodParameter->hasClass()) {
                $specSource->addImport($methodParameter->getClassType());
            }
        }

        if ($classSource->getParentFullName() === EventSourcingRepository::class) {
            $lets[] = new Parameter('eventStore', InterfaceType::create(EventStore::class));
            $lets[] = new Parameter('eventBus', InterfaceType::create(EventBus::class));
            $lets[] = new Parameter('eventStreamDecorators', new ArrayType());
        }

        $specSource->addMethod(new LetMethod($lets));
        $specSource->addMethod(
            $this->initializableMethodFactory->create($classSource)
        );

        $skip = false;

        if ($classSource->getParentFullName() === EventSourcingRepository::class) {
            $skip = true;
        }

        if (false === $skip) {
            $specSource->addMethod(new ExposeConstructorArgumentsAsGettersMethod($lets));
        }

        return $specSource;
    }
}
