<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Config;

use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use Webmozart\Assert\Assert;

/**
 * @see ConfigFactorySpec
 * @see ConfigFactoryTest
 */
class ConfigFactory
{
    /** @var array */
    private $input;
    /** @var array */
    private $sourceCodePaths = [];
    /** @var array */
    private $testPaths = [];

    public function __construct(array $input)
    {
        Assert::isArray($input['paths']['code']);
        Assert::isArray($input['paths']['tests']);

        $this->input = $input;

        foreach ($this->input['paths']['code'] as $path => $namespacePrefix) {
            $this->sourceCodePaths[] = new Psr4Path($path, $namespacePrefix);
        }
        foreach ($this->input['paths']['tests'] as $path => $namespacePrefix) {
            $this->testPaths[] = new TestPsr4Path($path, $namespacePrefix);
        }
    }

    public function create(): Config
    {
        return new Config(
            $this->getSourceCodePaths(),
            $this->getTestPaths()
        );
    }

    private function getSourceCodePaths(): array
    {
        return $this->sourceCodePaths;
    }

    private function getTestPaths(): array
    {
        return $this->testPaths;
    }
}
