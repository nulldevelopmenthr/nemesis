<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator;

use tests\NullDev\ContainerSupportedTestCase;

abstract class BaseCodeGeneratorTest extends ContainerSupportedTestCase
{
    protected function getFileContent(string $fileName): string
    {
        return file_get_contents(__DIR__.'/sample-output/'.$fileName.'.output');
    }
}
