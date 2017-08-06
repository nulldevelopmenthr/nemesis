<?php

declare(strict_types=1);

namespace tests\NullDev;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;

trait AssertOutputTrait
{
    protected function getCodeGenerator(): PhpParserGenerator
    {
        return $this->getService(PhpParserGenerator::class);
    }

    protected function assertOutputMatches(string $expectedOutputFileName, ImprovedClassSource $classSource)
    {
        $generatedOutput = $this->getCodeGenerator()->getOutput($classSource);

        if (false === file_exists($expectedOutputFileName)) {
            throw new \Exception('No file '.$expectedOutputFileName.' found');
            //file_put_contents($expectedOutputFileName, $generatedOutput);
        } else {
            $expectedOutput = file_get_contents($expectedOutputFileName);

            self::assertEquals($expectedOutput, $generatedOutput);
        }
    }
}