<?php

declare(strict_types=1);

namespace Tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\ListOfSomeKind;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyCompany\ValueObject\ListOfSomeKind
 * @group  todo
 */
class ListOfSomeKindTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $list;
    /** @var ListOfSomeKind */
    private $listOfSomeKind;

    public function setUp()
    {
        $this->list           = [];
        $this->listOfSomeKind = new ListOfSomeKind($this->list);
    }

    public function testGetList()
    {
        self::assertEquals($this->list, $this->listOfSomeKind->getList());
    }
}
