<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\Behaviour\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod
 * @group  unit
 */
class ConstructorMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $parameters;
    /** @var ConstructorMethod */
    private $sut;

    public function setUp()
    {
        $this->parameters = [];
        $this->sut        = new ConstructorMethod($this->parameters);
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->sut->getParameters());
    }
}
