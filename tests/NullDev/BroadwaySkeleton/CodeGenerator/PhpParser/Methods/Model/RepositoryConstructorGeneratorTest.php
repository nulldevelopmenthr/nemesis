<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator
 * @group nemesis
 */
class RepositoryConstructorGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var RepositoryConstructorGenerator */
    private $repositoryConstructorGenerator;

    public function setUp(): void
    {
        $this->repositoryConstructorGenerator = new RepositoryConstructorGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
