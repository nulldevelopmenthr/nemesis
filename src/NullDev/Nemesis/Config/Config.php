<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Config;

use NullDev\Skeleton\Path\Path;
use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\SpecPsr4Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use Webmozart\Assert\Assert;

/**
 * @see ConfigSpec
 * @see ConfigTest
 */
class Config
{
    /** @var array */
    private $sourceCodePaths = [];
    /** @var array */
    private $specPaths = [];
    /** @var array */
    private $testPaths = [];
    /** @var string */
    private $testsNamespace;
    /** @var string */
    private $baseTestClassName;
    /** @var array */
    private $testIgnoreInstancesOf = [];
    /** @var array */
    private $testIgnoreIterfaces = [];

    public function __construct(
        array $sourceCodePaths,
        array $specPaths,
        array $testPaths,
        string $testsNamespace,
        string $baseTestClassName,
        array $testIgnoreInstancesOf,
        array $testIgnoreIterfaces
    ) {
        Assert::allIsInstanceOf($sourceCodePaths, Psr4Path::class);
        Assert::allIsInstanceOf($specPaths, SpecPsr4Path::class);
        Assert::allIsInstanceOf($testPaths, TestPsr4Path::class);

        $this->sourceCodePaths       = $sourceCodePaths;
        $this->specPaths             = $specPaths;
        $this->testPaths             = $testPaths;
        $this->testsNamespace        = $testsNamespace;
        $this->baseTestClassName     = $baseTestClassName;
        $this->testIgnoreInstancesOf = $testIgnoreInstancesOf;
        $this->testIgnoreIterfaces   = $testIgnoreIterfaces;
    }

    /** @return Path[]|array */
    public function getSourceCodePaths(): array
    {
        return $this->sourceCodePaths;
    }

    /** @return Path[]|array */
    public function getSpecPaths(): array
    {
        return $this->specPaths;
    }

    /** @return Path[]|array */
    public function getTestPaths(): array
    {
        return $this->testPaths;
    }

    /** @return Path[]|array */
    public function getPaths(): array
    {
        return array_merge($this->testPaths, $this->specPaths, $this->sourceCodePaths);
    }

    public function getTestsNamespace(): string
    {
        return $this->testsNamespace;
    }

    public function getBaseTestClassName(): string
    {
        return $this->baseTestClassName;
    }

    public function getPhpUnitIgnoreInstancesOfList(): array
    {
        return $this->testIgnoreInstancesOf;
    }

    public function getPhpUnitIgnoreInterfacesList(): array
    {
        return $this->testIgnoreIterfaces;
    }
}
