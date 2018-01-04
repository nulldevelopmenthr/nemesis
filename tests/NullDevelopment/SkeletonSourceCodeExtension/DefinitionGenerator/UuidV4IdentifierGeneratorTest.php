<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\UuidV4IdentifierGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\UuidV4IdentifierGenerator
 * @group todo
 */
class UuidV4IdentifierGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var UuidV4IdentifierGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new UuidV4IdentifierGenerator($this->methodGenerators);
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHandleUuidV4Identifier()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerateAsString()
    {
        $this->markTestSkipped('Skipping');
    }
}
