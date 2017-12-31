<?php

declare(strict_types=1);

namespace App;

use App\CompilerPass\TacticianHandlerRegistrationCompilerPass;
use App\CompilerPass\TacticianMiddlewareRegistrationCompilerPass;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\DependencyInjection\Compiler\AutowirePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * @see ApplicationTest
 */
final class Application extends BaseApplication
{
    /** @var ContainerBuilder */
    protected $container;

    const VERSION = '0.1.0';

    public function __construct()
    {
        $path       = getcwd().'/nemesis.yml';
        $extensions = $this->getDefaultExtensions();
        if (is_file($path)) {
            $configAsArray = Yaml::parse(file_get_contents($path));

            $extensions = array_merge($extensions, $configAsArray['extensions']);
        }

        $this->container = new ContainerBuilder();

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__));
        $loader->load('services.yml');
        $loader->load('cli.yml');

        $loader->load('phpparser-services.yml');
        $loader->load('tactician-services.yml');

        foreach ($extensions as $extensionClass => $extensionSettings) {
            if (null === $extensionSettings) {
                $extensionSettings = [];
            }
            $extensionInstance = new $extensionClass();
            $extensionInstance->load($extensionSettings, $this->container);
        }

        $this->container->addCompilerPass(new AutowirePass(true));
        $this->container->addCompilerPass(new TacticianHandlerRegistrationCompilerPass());
        $this->container->addCompilerPass(new TacticianMiddlewareRegistrationCompilerPass());
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

    private function getDefaultExtensions()
    {
        return [
            'NullDev\Skeleton\SkeletonExtension'                                => null,
            'NullDev\BroadwaySkeleton\BroadwaySkeletonExtension'                => null,
            'NullDev\PHPUnitSkeleton\PHPUnitSkeletonExtension'                  => null,
            'NullDev\PhpSpecSkeleton\PhpSpecSkeletonExtension'                  => null,
            'NullDev\Theater\TheaterExtension'                                  => null,
            'NullDevelopment\Skeleton\SkeletonExtension'                        => null,
            'NullDevelopment\SkeletonPhpSpecExtension\SkeletonPhpSpecExtension' => null,
            'NullDevelopment\SkeletonPhpUnitExtension\SkeletonPhpUnitExtension' => null,
        ];
    }

    public function getContainer(): ContainerBuilder
    {
        return $this->container;
    }
}
