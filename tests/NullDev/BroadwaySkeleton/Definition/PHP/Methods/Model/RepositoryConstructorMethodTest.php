<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod
 * @group  nemesis
 */
class RepositoryConstructorMethodTest extends TestCase
{
    /** @var RepositoryConstructorMethod */
    private $repositoryConstructorMethod;

    public function setUp(): void
    {
        $this->repositoryConstructorMethod = new RepositoryConstructorMethod(new ClassType('name', 'namespace'));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
