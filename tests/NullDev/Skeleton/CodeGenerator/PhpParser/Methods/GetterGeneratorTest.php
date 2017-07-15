<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator
 * @group nemesis
 */
class GetterGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var GetterGenerator */
    private $getterGenerator;

    public function setUp(): void
    {
        $this->getterGenerator = new GetterGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
