<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonSourceCodeExtension\Result;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Result
 * @group  unit
 */
class ResultTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ClassDefinition */
    private $classType;

    /** @var PhpNamespace */
    private $generated;

    /** @var Result */
    private $sut;

    public function setUp()
    {
        $this->classType = Mockery::mock(ClassDefinition::class);
        $this->generated = new PhpNamespace('');
        $this->sut       = new Result($this->classType, $this->generated);
    }

    public function testGetClassDefinition()
    {
        self::assertEquals($this->classType, $this->sut->getClassDefinition());
    }

    public function testGetGenerated()
    {
        self::assertEquals($this->generated, $this->sut->getGenerated());
    }
}
