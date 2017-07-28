<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use PhpParser\PrettyPrinter\Standard;

trait OutputGeneratorTestTrait
{
    /** @var Standard */
    private $printer;

    public function setUp(): void
    {
        $this->printer = new Standard();
    }

    public function assertOutputMatches($method, string $fileName): void
    {
        $generated = $this->getGenerator()->generate($method);

        $node = $generated->getNode();

        $output = $this->printer->prettyPrintFile([$node]);

        $expected = file_get_contents($this->getBasePath().'/'.$fileName.'.output');

        self::assertEquals($expected, $output);
    }

    public function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-data/'.$currentTestClassName;
    }

    abstract public function getGenerator();

    abstract public function provideParameters(): array;
}
