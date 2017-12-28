<?php

declare(strict_types=1);

namespace tests\Nesto\Core;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nesto\Core\MiroId;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Nesto\Core\MiroId
 * @group todo
 */
class MiroIdTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $id;
    /** @var MiroId */
    private $miroId;

    public function setUp()
    {
        $this->id     = 'id';
        $this->miroId = new MiroId($this->id);
    }

    public function testGetId()
    {
        self::assertEquals($this->id, $this->miroId->getId());
    }
}
