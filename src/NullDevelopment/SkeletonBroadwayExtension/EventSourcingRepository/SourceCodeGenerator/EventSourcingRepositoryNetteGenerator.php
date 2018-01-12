<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\Result;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseSourceCodeDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGeneratorTest
 */
class EventSourcingRepositoryNetteGenerator extends BaseSourceCodeDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof EventSourcingRepository) {
            return true;
        }

        return false;
    }

    public function handle(EventSourcingRepository $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }

    protected function processMethods(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        $constructorCode = $netteCode->addMethod('__construct');

        $constructorCode->addParameter('eventStore')
            ->setTypeHint('Broadway\EventStore\EventStore');
        $constructorCode->addParameter('eventBus')
            ->setTypeHint('Broadway\EventHandling\EventBus');
        $constructorCode->addParameter('eventStreamDecorators')
            ->setTypeHint('array')
            ->setDefaultValue([]);

        $constructorCode
            ->addBody('parent::__construct(')
            ->addBody("\t".'$eventStore,')
            ->addBody("\t".'$eventBus,')
            ->addBody("\t".$definition->getEntity()->getName().'::class,')
            ->addBody("\t".'new PublicConstructorAggregateFactory(),')
            ->addBody("\t".'$eventStreamDecorators')
            ->addBody(');');

        $namespace->addUse('Broadway\EventStore\EventStore');
        $namespace->addUse('Broadway\EventHandling\EventBus');
        $namespace->addUse('Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory');
        $namespace->addUse($definition->getEntity()->getFullName());
    }
}
