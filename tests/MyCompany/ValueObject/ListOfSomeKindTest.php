<?php

declare(strict_types=1);

namespace tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\ListOfSomeKind;
use PHPUnit_Framework_TestCase;

/**
 * @covers \MyCompany\ValueObject\ListOfSomeKind
 * @group  todo
 */
class ListOfSomeKindTest extends PHPUnit_Framework_TestCase
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
