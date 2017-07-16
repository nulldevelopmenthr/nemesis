<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;
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
        $this->container->addCompilerPass(new AutowirePass(true));

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__));
        $loader->load('services.yml');

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
        $commands = [];

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