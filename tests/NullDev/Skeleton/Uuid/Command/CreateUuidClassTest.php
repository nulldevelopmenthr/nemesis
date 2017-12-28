<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Uuid\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\Command\CreateUuidClass
 * @group  todo
 */
class CreateUuidClassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $classType;
    /** @var CreateUuidClass */
    private $sut;

    public function setUp()
    {
        $this->classType = Mockery::mock(ClassType::class);
        $this->sut       = new CreateUuidClass($this->classType);
    }

    public function testGetClassType()
    {
        self::assertEquals($this->classType, $this->sut->getClassType());
    }
}
