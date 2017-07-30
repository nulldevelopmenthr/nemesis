<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Config;

use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\SpecPsr4Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use Symfony\Component\Yaml\Yaml;
use Webmozart\Assert\Assert;

/**
 * @see ConfigFactorySpec
 * @see ConfigFactoryTest
 */
class ConfigFactory
{
    /** @var array */
    private $sourceCodePaths = [];
    /** @var array */
    private $specPaths = [];
    /** @var array */
    private $testPaths = [];
    /** @var string */
    private $phpunitBaseNamespace;
    /** @var string */
    private $phpunitBaseTestClassName;

    public function __construct()
    {
        $path          = getcwd().'/nemesis.yml';
        $defaultConfig = $this->getDefaultConfig();

        if (false === is_file($path)) {
            $config = $defaultConfig;
        } else {
            $config = array_merge($defaultConfig, Yaml::parse(file_get_contents($path)));
        }

        Assert::isArray($config['paths']['code']);
        Assert::isArray($config['paths']['spec']);
        Assert::isArray($config['paths']['tests']);

        foreach ($config['paths']['code'] as $path => $namespacePrefix) {
            $this->sourceCodePaths[] = new Psr4Path($path, $namespacePrefix);
        }
        foreach ($config['paths']['spec'] as $path => $namespacePrefix) {
            $this->specPaths[] = new SpecPsr4Path($path, $namespacePrefix);
        }
        foreach ($config['paths']['tests'] as $path => $namespacePrefix) {
            $this->testPaths[] = new TestPsr4Path($path, $namespacePrefix);
        }
        $this->phpunitBaseNamespace     = $config['phpunit']['base_namespace'];
        $this->phpunitBaseTestClassName = $config['phpunit']['base_test_class_name'];
    }

    public function create(): Config
    {
        return new Config(
            $this->getSourceCodePaths(),
            $this->getSpecPaths(),
            $this->getTestPaths(),
            $this->getPhpunitBaseNamespace(),
            $this->getPhpunitBaseTestClassName()
        );
    }

    private function getDefaultConfig()
    {
        return [
            'paths'   => [
                'code'  => [
                    'src/' => '',
                ],
                'spec' => [
                    'spec/' => 'spec\\',
                ],
                'tests' => [
                    'tests/' => 'tests\\',
                ],
            ],
            'phpunit' => [
                'base_namespace'       => 'tests',
                'base_test_class_name' => 'PHPUnit_Framework_TestCase',
            ],
        ];
    }

    private function getSourceCodePaths(): array
    {
        return $this->sourceCodePaths;
    }

    private function getSpecPaths(): array
    {
        return $this->specPaths;
    }

    private function getTestPaths(): array
    {
        return $this->testPaths;
    }

    private function getPhpunitBaseNamespace(): string
    {
        return $this->phpunitBaseNamespace;
    }

    private function getPhpunitBaseTestClassName(): string
    {
        return $this->phpunitBaseTestClassName;
    }
}
