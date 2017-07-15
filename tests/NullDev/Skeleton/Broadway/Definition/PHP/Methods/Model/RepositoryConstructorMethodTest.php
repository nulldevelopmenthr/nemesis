<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model;

use NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model\RepositoryConstructorMethod
 * @group nemesis
 */
class RepositoryConstructorMethodTest extends PHPUnit_Framework_TestCase
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
