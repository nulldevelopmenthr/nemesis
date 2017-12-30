<?php

declare(strict_types=1);

namespace Tests\MyCompany\Entity;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\Entity\TransactionEntity;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyCompany\Entity\TransactionEntity
 * @group  todo
 */
class TransactionEntityTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TransactionEntity */
    private $transactionEntity;

    public function setUp()
    {
        $this->transactionEntity = new TransactionEntity();
    }

    public function testGetId()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetId()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetAmount()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetAmount()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetCreatedAt()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetCreatedAt()
    {
        $this->markTestSkipped('Skipping');
    }
}
