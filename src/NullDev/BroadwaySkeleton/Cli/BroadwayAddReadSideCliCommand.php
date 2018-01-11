<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideConfigFactory;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use NullDev\Theater\ReadSide\ReadSideName;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BroadwayAddReadSideCliCommand extends BaseSkeletonGeneratorCommand
{
    /** @var SymfonyStyle */
    protected $io;

    /** @var ReadSideName Read side name */
    protected $name;

    /** @var ReadSideNamespace Read side namespace */
    protected $namespace;

    /** @var ReadSideImplementation */
    private $implementation;

    /** @var Property[]|array */
    private $readEntityProperties;

    protected function configure()
    {
        $this->setName('broadway:read-side:add')
            ->setDescription('Add Broadway read side');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        $this->name                 = $this->handleNameInput();
        $this->namespace            = $this->handleNamespaceInput();
        $this->implementation       = $this->pickImplementation();
        $this->readEntityProperties = $this->getConstuctorParameters();
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = $this->getTheaterConfig();

        if (true === $config->hasReadSideByName($this->name)) {
            $message = sprintf('Read side with that name already exists');

            $this->io->error($message);

            return;
        }

        $newReadSide = $this->getService(ReadSideConfigFactory::class)->create(
            $this->name, $this->namespace, $this->implementation, $this->readEntityProperties
        );

        $config->addReadSide($newReadSide);
        $this->writeTheaterConfig($config);

        if ('DoctrineORM' === $this->implementation->getValue()) {
            $this->generateDefinition($newReadSide);
        }

        $this->io->writeln('DoNE');
    }

    private function generateDefinition(ReadSideConfig $newReadSide)
    {
        $entityClassName     = $newReadSide->getReadEntity()->getFullName();
        $repositoryClassName = $newReadSide->getReadRepository()->getFullName();
        $factoryClassName    = $newReadSide->getReadFactory()->getFullName();
        $projectorClassName  = $newReadSide->getReadProjector()->getFullName();

        $properties = [];

        /** @var Property $parameter */
        foreach ($newReadSide->getProperties() as $parameter) {
            $properties[$parameter->getName()] = [
                'instanceOf' => $parameter->getInstanceFullName(),
                'nullable'   => false,
                'hasDefault' => false,
                'default'    => null,
                'examples'   => [],
            ];
        }

        $entityDefinition = [
            'type'       => 'DoctrineReadEntity',
            'instanceOf' => $entityClassName,
            'parent'     => null,
            'interfaces' => [
                'Broadway\ReadModel\Identifiable',
                'Broadway\Serializer\Serializable',
            ],
            'traits'      => [],
            'constants'   => [],
            'constructor' => $properties,
            'methods'     => [],
        ];

        $repositoryDefinition = [
            'type'        => 'DoctrineReadRepository',
            'instanceOf'  => $repositoryClassName,
            'parent'      => 'Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository',
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'constructor' => [],
            'methods'     => [],
            'entity'      => $entityClassName,
        ];
        $factoryDefinition = [
            'type'        => 'DoctrineReadFactory',
            'instanceOf'  => $factoryClassName,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'constructor' => [],
            'methods'     => [],
            'entity'      => $entityClassName,
        ];
        $projectorDefinition = [
            'type'        => 'DoctrineReadProjector',
            'instanceOf'  => $projectorClassName,
            'parent'      => 'Broadway\ReadModel\Projector',
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'constructor' => [
                'repository' => [
                    'instanceOf' => $repositoryClassName,
                    'nullable'   => false,
                    'hasDefault' => false,
                    'default'    => null,
                ],
                'factory' => [
                    'instanceOf' => $factoryClassName,
                    'nullable'   => false,
                    'hasDefault' => false,
                    'default'    => null,
                ],
            ],
            'methods'    => [],
            'repository' => $repositoryClassName,
            'factory'    => $factoryClassName,
        ];

        $this->dumpFile($entityClassName, $entityDefinition);
        $this->dumpFile($repositoryClassName, $repositoryDefinition);
        $this->dumpFile($factoryClassName, $factoryDefinition);
        $this->dumpFile($projectorClassName, $projectorDefinition);
    }

    protected function handleNameInput()
    {
        $question = new Question('Enter read side name');
        $question->setValidator(
            function ($input) {
                return new ReadSideName((string) $input);
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function handleNamespaceInput()
    {
        $question = new Question('Enter read side namespace');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                return new ReadSideNamespace(str_replace('/', '\\', $input));
            }
        );

        return $this->io->askQuestion($question);
    }

    private function pickImplementation()
    {
        $choices = [
            ReadSideImplementation::DOCTRINE_ORM,
            ReadSideImplementation::ELASTICSEARCH,
        ];

        $defaultChoice = ReadSideImplementation::DOCTRINE_ORM;

        $picked = $this->io->choice('Pick  read side implementation', $choices, $defaultChoice);

        return new ReadSideImplementation($picked);
    }

    protected function getSectionMessage(): string
    {
        return 'Adds new Broadway read side';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you adding new Broadway read side.',
            '',
            'First, you need to pick bounded context.',
            '',
        ];
    }
}
