<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\PHPParserMethodCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\DependencyInjection\Compiler\AutowirePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class Application extends BaseApplication
{
    /** @var ContainerBuilder */
    protected $container;

    const VERSION = '0';

    public function __construct()
    {
        $this->container = new ContainerBuilder();

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__));
        $loader->load('phpparser-services.yml');
        $loader->load('skeleton-services.yml');
        $loader->load('services.yml');

        $this->container->addCompilerPass(new AutowirePass(true));
        $this->container->addCompilerPass(new PHPParserMethodCompilerPass());
        //$this->container->addCompilerPass(new PHPParserFileCompilerPass());
        $this->container->registerForAutoconfiguration(MethodGenerator::class)->addTag('skeleton.method_generator');

        parent::__construct('Nemesis', self::VERSION);

        $this->container->compile();
    }

    /**
     * {@inheritdoc}
     */
    public function getLongVersion()
    {
        return parent::getLongVersion().' by <comment>Miro Svrtan</comment>';
    }

    /**
     * Gets the default commands that should always be available.
     *
     * @return Command[] An array of default Command instances
     */
    protected function getDefaultCommands()
    {
        $commands = [
           new HelpCommand(),
           new ListCommand(),
        ];

        foreach (array_keys($this->container->findTaggedServiceIds('console.command')) as $commandId) {
            $commands[] = $this->container->get($commandId);
        }

        return $commands;
    }

    public function getContainer(): ContainerBuilder
    {
        return $this->container;
    }
}
