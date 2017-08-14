<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Uuid\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\Command\CreateUuidClass
 * @group  todo
 */
class CreateUuidClassTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|ClassType */
    private $classType;
    /** @var CreateUuidClass */
    private $createUuidClass;

    public function setUp()
    {
        $this->classType       = Mockery::mock(ClassType::class);
        $this->createUuidClass = new CreateUuidClass($this->classType);
    }

    public function testGetClassType()
    {
        self::assertEquals($this->classType, $this->createUuidClass->getClassType());
    }
}
