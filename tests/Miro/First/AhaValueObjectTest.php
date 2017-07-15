<?php

declare(strict_types=1);

namespace tests\Miro\First;

use Miro\First\AhaValueObject;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Miro\First\AhaValueObject
 * @group nemesis
 */
class AhaValueObjectTest extends PHPUnit_Framework_TestCase
{
    /** @var AhaValueObject */
    private $ahaValueObject;

    public function setUp(): void
    {
        $this->ahaValueObject = new AhaValueObject('name', 1);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
