<?php

declare(strict_types=1);

namespace Tests\NullDev;

use NullDev\Skeleton\File\OutputResource;

trait AssertOutputTrait
{
    protected function assertOutputResourceMatches(string $outputFilePath, OutputResource $outputResource)
    {
        $this->assertOutputContentMatches($outputFilePath, $outputResource->getOutput());
    }

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
