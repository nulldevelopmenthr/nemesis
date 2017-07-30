<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Config;

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

    public function __construct(
        array $sourceCodePaths,
        array $specPaths,
        array $testPaths,
        string $testsNamespace,
        string $baseTestClassName
    ) {
        Assert::allIsInstanceOf($sourceCodePaths, Psr4Path::class);
        Assert::allIsInstanceOf($specPaths, SpecPsr4Path::class);
        Assert::allIsInstanceOf($testPaths, TestPsr4Path::class);

        $this->sourceCodePaths   = $sourceCodePaths;
        $this->specPaths         = $specPaths;
        $this->testPaths         = $testPaths;
        $this->testsNamespace    = $testsNamespace;
        $this->baseTestClassName = $baseTestClassName;
    }

    public function getSourceCodePaths(): array
    {
        return $this->sourceCodePaths;
    }

    public function getSpecPaths(): array
    {
        return $this->specPaths;
    }

    public function getTestPaths(): array
    {
        return $this->testPaths;
    }

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
}