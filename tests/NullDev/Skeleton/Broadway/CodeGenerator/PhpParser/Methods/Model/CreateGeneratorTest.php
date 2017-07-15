<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model;

use NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\CreateGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\CreateGenerator
 * @group nemesis
 */
class CreateGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var CreateGenerator */
    private $createGenerator;

    public function setUp(): void
    {
        $this->createGenerator = new CreateGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
