<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Domain;

use MyVendor\Theater\Domain\ShowModel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Domain\ShowModel
 * @group  todo
 */
class ShowModelTest extends TestCase
{
    /** @var ShowModel */
    private $sut;

    public function setUp()
    {
        $this->sut = new ShowModel();
    }

    public function testGetAggregateRootId()
    {
        self::assertSame($this->id, $this->sut->getAggregateRootId());
    }
}
