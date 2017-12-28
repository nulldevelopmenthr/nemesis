<?php

declare(strict_types=1);

namespace tests\NullDevelopment\PhpStructure\CustomType;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\CustomType\CollectionOf
 * @group todo
 */
class CollectionOfTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassName */
    private $className;
    /** @var string */
    private $accessor;
    /** @var MockInterface|ClassName */
    private $has;
    /** @var CollectionOf */
    private $sut;

    public function setUp()
    {
        $this->className = Mockery::mock(ClassName::class);
        $this->accessor  = 'accessor';
        $this->has       = Mockery::mock(ClassName::class);
        $this->sut       = new CollectionOf($this->className, $this->accessor, $this->has);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testGetAccessor()
    {
        self::assertEquals($this->accessor, $this->sut->getAccessor());
    }

    public function testGetHas()
    {
        self::assertEquals($this->has, $this->sut->getHas());
    }
}
