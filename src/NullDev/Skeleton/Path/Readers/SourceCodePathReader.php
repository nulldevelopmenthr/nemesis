<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Path\Readers;

use hanneskod\classtools\Iterator\ClassIterator;
use Symfony\Component\Finder\Finder;

class SourceCodePathReader
{
    /** @var FinderFactory */
    private $finderFactory;

    public function __construct(FinderFactory $finderFactory)
    {
        $this->finderFactory = $finderFactory;
    }

    public function getSourceClasses(array $paths): array
    {
        $list = [];
        $iter = new ClassIterator($this->getPhpFiles2($paths));

        foreach (array_keys($iter->getClassMap()) as $className) {
            if (true === $this->isTestOrSpec($className)) {
                continue;
            }

            try {
                $reflection = new \ReflectionClass($className);
            } catch (\Throwable $exception) {
                echo $exception->getMessage();
                continue;
            }

            if ($reflection->isAbstract() || $reflection->isTrait() || $reflection->isInterface()) {
                continue;
            }

            $list[$className] = $className;
        }

        return $list;
    }

    public function getTestClasses(array $paths): array
    {
        $list = [];
        $iter = new ClassIterator($this->getPhpFiles2($paths));

        foreach (array_keys($iter->getClassMap()) as $className) {
            if (substr($className, -4) !== 'Test') {
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

    /*
     *
     * Code from previous version.
     *
     *
     */

    public function getExistingPaths(array $paths): array
    {
        $existingPaths = [];

        foreach ($paths as $path) {
            if (false === $path->isSourceCode()) {
                continue;
            }

            $list = $this->getDirectories($path->getPathBase());

            foreach ($list as $item) {
                if (true === empty($path->getClassBase())) {
                    $name = $item->getRelativePathname();
                } else {
                    $name = $path->getClassBase().$item->getRelativePathname();
                }

                $existingPaths[] = str_replace('/', '\\', $name);
            }
        }

        return $existingPaths;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getExistingClasses(array $paths): array
    {
        $namespaceList = [];
        $classList     = [];
        $list          = [];
        foreach ($paths as $path) {
            if (false === $path->isSourceCode()) {
                continue;
            }
            $iter = new ClassIterator($this->getPhpFiles($path->getPathBase()));

            foreach (array_keys($iter->getClassMap()) as $classname) {
                if (in_array(substr($classname, -4), ['Test', 'Spec'])) {
                    continue;
                }

                try {
                    $reflection = new \ReflectionClass($classname);
                } catch (\Throwable $exception) {
                    continue;
                }

                if ($reflection->isAbstract() || $reflection->isTrait() || $reflection->isInterface()) {
                    continue;
                }

                if ($reflection->inNamespace()) {
                    $namespaces = explode('\\', $reflection->getNamespaceName());

                    $namespace = '';
                    foreach ($namespaces as $key => $namespacePart) {
                        if ($namespace !== '') {
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

    private function getDirectories($path)
    {
        return $this->getFinder()->directories()->in($path);
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
