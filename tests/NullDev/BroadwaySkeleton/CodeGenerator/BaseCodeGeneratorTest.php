<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator;

use Tests\NullDev\ContainerSupportedTestCase;

abstract class BaseCodeGeneratorTest extends ContainerSupportedTestCase
{
    protected function getFileContent(string $fileName): string
    {
        return file_get_contents($this->getFileName($fileName));
    }

    protected function getFileName(string $fileName): string
    {
        return __DIR__.'/sample-output/'.$fileName.'.output';
    }
}
