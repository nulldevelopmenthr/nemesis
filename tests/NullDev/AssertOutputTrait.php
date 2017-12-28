<?php

declare(strict_types=1);

namespace Tests\NullDev;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;

trait AssertOutputTrait
{
    protected function getCodeGenerator(): PhpParserGenerator
    {
        return $this->getService(PhpParserGenerator::class);
    }

    protected function assertOutputMatches(string $outputFilePath, ImprovedClassSource $classSource)
    {
        $generatedOutput = $this->getCodeGenerator()->getOutput($classSource);

        if (false === file_exists($outputFilePath)) {
            file_put_contents($outputFilePath, $generatedOutput);

            $this->markTestSkipped('Generating output to '.$outputFilePath);
        } else {
            $expectedOutput = file_get_contents($outputFilePath);

            self::assertEquals($expectedOutput, $generatedOutput);
        }
    }
}
