<?php

declare(strict_types=1);

namespace tests\Nesto\Domain;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nesto\Domain\MiroModel;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Nesto\Domain\MiroModel
 * @group todo
 */
class MiroModelTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MiroModel */
    private $miroModel;

    public function setUp()
    {
        $this->miroModel = new MiroModel();
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
