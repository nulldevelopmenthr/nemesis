<?php

declare(strict_types=1);

namespace Tests\NullDev;

trait AssertOutputTrait
{
    protected function assertOutputContentMatches(string $outputFilePath, string $generatedOutput)
    {
        if (false === file_exists($outputFilePath)) {
            file_put_contents($outputFilePath, $generatedOutput);
            $this->markTestSkipped('Generating output to '.$outputFilePath);
        } else {
            $expectedOutput = file_get_contents($outputFilePath);

            self::assertEquals($expectedOutput, $generatedOutput);
        }
    }
}
