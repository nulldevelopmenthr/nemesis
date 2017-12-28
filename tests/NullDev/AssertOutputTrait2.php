<?php

declare(strict_types=1);

namespace Tests\NullDev;

use NullDev\Skeleton\File\OutputResource;

trait AssertOutputTrait2
{
    protected function assertOutputMatches(string $expectedOutputFileName, OutputResource $outputResource)
    {
        if (false === file_exists($expectedOutputFileName)) {
            file_put_contents($expectedOutputFileName, $outputResource->getOutput());
        } else {
            $expectedOutput = file_get_contents($expectedOutputFileName);

            self::assertEquals($expectedOutput, $outputResource->getOutput());
        }
    }
}
