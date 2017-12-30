<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\BoundedContext;

use Exception;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\ContextNamespace;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\ContextNamespace
 * @group  unit
 */
class ContextNamespaceTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $namespace;

    /** @var ContextNamespace */
    private $contextNamespace;

    public function setUp()
    {
        $this->namespace        = 'MyCompany\SecretProject\Namespace';
        $this->contextNamespace = new ContextNamespace($this->namespace);
    }

    public function testGetValue()
    {
        self::assertEquals($this->namespace, $this->contextNamespace->getValue());
    }

    public function testToString()
    {
        self::assertEquals($this->namespace, $this->contextNamespace->__toString());
    }

    /**
     * @dataProvider provideBadContextNamespaces
     */
    public function testDoesntAcceptName(string $name, string $expectedExceptionMessage)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        new ContextNamespace($name);
    }

    public function provideBadContextNamespaces(): array
    {
        return [
            ['', 'Namespace should not be empty.'],
            ['Something\User\\', 'Namespace must not end with \.'],
        ];
    }
}
