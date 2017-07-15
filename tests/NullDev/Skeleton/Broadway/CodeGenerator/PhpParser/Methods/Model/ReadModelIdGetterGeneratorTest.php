<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model;

use NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\ReadModelIdGetterGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\ReadModelIdGetterGenerator
 * @group nemesis
 */
class ReadModelIdGetterGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var ReadModelIdGetterGenerator */
    private $readModelIdGetterGenerator;

    public function setUp(): void
    {
        $this->readModelIdGetterGenerator = new ReadModelIdGetterGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
