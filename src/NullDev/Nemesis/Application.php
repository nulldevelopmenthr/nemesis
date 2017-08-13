<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\PHPParserMethodCompilerPass;
use NullDev\Skeleton\TacticianCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\DependencyInjection\Compiler\AutowirePass;
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
        $loader->load('services.yml');
        $loader->load('cli.yml');

        $loader->load('skeleton-services.yml');
        $loader->load('skeleton-cli.yml');

        $loader->load('phpparser-services.yml');
        $loader->load('tactician-services.yml');

        $loader->load('phpspec-services.yml');

        $loader->load('phpunit-services.yml');

        $loader->load('broadway-services.yml');
        $loader->load('broadway-cli.yml');

        $this->container->addCompilerPass(new AutowirePass(true));
        $this->container->addCompilerPass(new PHPParserMethodCompilerPass());
        $this->container->addCompilerPass(new TacticianCompilerPass());
        $this->container->registerForAutoconfiguration(MethodGenerator::class)->addTag('skeleton.method_generator');

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
