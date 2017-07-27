<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * @see ApplicationTest
 */
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

        parent::__construct('Nemesis', self::VERSION);

        $this->container->compile();
    }

    /**
     * Gets the default commands that should always be available.
     *
     * @return Command[] An array of default Command instances
     */
    protected function getDefaultCommands(): array
    {
        $commands = [
            new HelpCommand(),
            new ListCommand(),
        ];

        return $commands;
    }

    public function getContainer(): ContainerBuilder
    {
        return $this->container;
    }
}
