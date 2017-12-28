<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\TestCase;

abstract class BaseOutputGeneratorTestCase extends TestCase
{
    /** @var Standard */
    private $printer;

    public function setUp(): void
    {
        $this->printer = new Standard();
    }

    protected function assertOutputMatches($method, string $fileName): void
    {
        $generated = $this->getGenerator()->generate($method);

        $node = $generated->getNode();

        $output = $this->printer->prettyPrintFile([$node]);

        $outputFilePath = $this->getBasePath().'/'.$fileName.'.output';

        if (false === file_exists($outputFilePath)) {
            file_put_contents($outputFilePath, $output);
            $this->markTestSkipped('Generating output to '.$outputFilePath);
        } else {
            $expected = file_get_contents($outputFilePath);

            self::assertEquals($expected, $output);
        }
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
