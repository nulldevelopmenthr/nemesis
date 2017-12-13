<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Path\Readers;

use hanneskod\classtools\Iterator\ClassIterator;
use NullDev\Nemesis\Config\Config;
use ReflectionClass;
use Symfony\Component\Finder\Finder;
use Throwable;

/**
 * @see SourceCodePathReaderSpec
 * @see SourceCodePathReaderTest
 */
class SourceCodePathReader
{
    /** @var FinderFactory */
    private $finderFactory;
    /** @var Config */
    private $config;

    public function __construct(FinderFactory $finderFactory, Config $config)
    {
        $this->finderFactory = $finderFactory;
        $this->config        = $config;
    }

    public function getSourceClasses(array $paths): array
    {
        $list = [];
        $iter = new ClassIterator($this->getPhpFiles2($paths));

        foreach ($iter->getClassMap() as $className => $path) {
            if (true === $this->isTestOrSpec($className)) {
                continue;
            }

            try {
                $reflection = new ReflectionClass($className);
            } catch (Throwable $exception) {
                echo $exception->getMessage();

                continue;
            }

            if ($reflection->isAbstract() || $reflection->isTrait() || $reflection->isInterface()) {
                continue;
            }

            $list[$className] = $path;
        }

        return $list;
    }

    public function getTestClasses(array $paths): array
    {
        $list = [];
        $iter = new ClassIterator($this->getPhpFiles2($paths));

        foreach (array_keys($iter->getClassMap()) as $className) {
            if ('Test' !== substr($className, -4)) {
                continue;
            }

            $list[$className] = $className;
        }

        return $list;
    }

    private function isTestOrSpec(string $className): bool
    {
        $skipSuffixes = ['Test', 'Spec'];
        $classSuffix  = substr($className, -4);

        if (true === in_array($classSuffix, $skipSuffixes)) {
            return true;
        }

        return false;
    }

    // Code from previous version.

    public function getExistingSourceCodeNamespaces(): array
    {
        $namespaces = [];

        foreach ($this->findAllTypeDeclarationNamesInSourceCode() as $typeDeclarationName) {
            try {
                $reflection = new ReflectionClass($typeDeclarationName);
            } catch (Throwable $exception) {
                continue;
            }

            if ($reflection->inNamespace()) {
                $namespaceList = explode('\\', $reflection->getNamespaceName());

                $namespace = '';
                foreach ($namespaceList as $namespacePart) {
                    $namespace .= $namespacePart.'\\';

                    if (false === array_key_exists($namespace, $namespaces)) {
                        $namespaces[$namespace] = $namespace;
                    }
                }
            }
        }

        return $namespaces;
    }

    /**
     * Returns all class, interface, trait names.
     *
     * @return array
     */
    protected function findAllTypeDeclarationNamesInSourceCode(): array
    {
        $names = [];

        foreach ($this->config->getSourceCodePaths() as $path) {
            $files = $this->getPhpFiles($path->getPathBase());

            $foundNames = array_keys(
                (new ClassIterator($files))->getClassMap()
            );

            $names = array_merge($names, $foundNames);
        }

        return $names;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getExistingSourceCodeClassNames(): array
    {
        $namespaceList = [];
        $classList     = [];
        $list          = [];

        foreach ($this->config->getSourceCodePaths() as $path) {
            $files = $this->getPhpFiles($path->getPathBase());

            $foundNames = array_keys(
                (new ClassIterator($files))->getClassMap()
            );

            foreach ($foundNames as $classname) {
                if (in_array(substr($classname, -4), ['Test', 'Spec'])) {
                    continue;
                }

                try {
                    $reflection = new ReflectionClass($classname);
                } catch (Throwable $exception) {
                    continue;
                }

                if ($reflection->isAbstract() || $reflection->isTrait() || $reflection->isInterface()) {
                    continue;
                }

                if ($reflection->inNamespace()) {
                    $namespaces = explode('\\', $reflection->getNamespaceName());

                    $namespace = '';
                    foreach ($namespaces as $key => $namespacePart) {
                        if ('' !== $namespace) {
                            $namespace .= '/';
                        }
                        $namespace .= $namespacePart;

                        if (!array_key_exists($key, $namespaceList)) {
                            $namespaceList[$key] = [];
                        }

                        $namespaceList[$key][$namespace] = $namespace;
                    }
                }

                $escapedName = str_replace('\\', '/', $classname);

                $classList[$escapedName] = $escapedName;
            }
        }

        foreach ($namespaceList as $namespaceDepthList) {
            $list = array_merge($list, $namespaceDepthList);
        }

        $list = array_merge($list, $classList);

        return $list;
    }

    private function getPhpFiles($path)
    {
        return $this->getFinder()->files()->in($path)->name('*.php');
    }

    private function getPhpFiles2(array $paths)
    {
        $finder = $this->getFinder();

        $finder->files();
        foreach ($paths as $path) {
            $finder->in($path->getPathBase());
        }

        return $finder->name('*.php');
    }

    private function getFinder(): Finder
    {
        return $this->finderFactory->create();
    }
}
