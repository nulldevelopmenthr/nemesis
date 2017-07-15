<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Config;

use NullDev\Skeleton\Path\Psr4Path;
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
    private $testPaths = [];

    public function __construct(array $sourceCodePaths, array $testPaths)
    {
        Assert::allIsInstanceOf($sourceCodePaths, Psr4Path::class);
        Assert::allIsInstanceOf($testPaths, TestPsr4Path::class);

        $this->sourceCodePaths = $sourceCodePaths;
        $this->testPaths       = $testPaths;
    }

    public function getSourceCodePaths(): array
    {
        return $this->sourceCodePaths;
    }

    public function getTestPaths(): array
    {
        return $this->testPaths;
    }

    public function getPaths(): array
    {
        return array_merge($this->testPaths, $this->sourceCodePaths);
    }
}
