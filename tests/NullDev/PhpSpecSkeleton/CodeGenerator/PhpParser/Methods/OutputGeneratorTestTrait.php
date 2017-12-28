<?php

declare(strict_types=1);

namespace Tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use PhpParser\PrettyPrinter\Standard;
use Tests\NullDev\AssertOutputTrait;

trait OutputGeneratorTestTrait
{
    use AssertOutputTrait;
    /** @var Standard */
    private $printer;

    public function setUp(): void
    {
        $this->printer = new Standard();
    }

    public function assertMethodOutputMatches($method, string $fileName): void
    {
        $generated = $this->getGenerator()->generate($method);

        $node = $generated->getNode();

        $output = $this->printer->prettyPrintFile([$node]);

        $outputFilePath = $this->getBasePath().'/'.$fileName.'.output';

        $this->assertOutputContentMatches($outputFilePath, $output);
    }

    protected function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }

    abstract public function getGenerator();

    abstract public function provideParameters(): array;
}
