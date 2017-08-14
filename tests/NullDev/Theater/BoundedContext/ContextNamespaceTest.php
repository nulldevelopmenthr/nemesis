<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\BoundedContext;

use Exception;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\ContextNamespace;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\ContextNamespace
 * @group  unit
 */
class ContextNamespaceTest extends PHPUnit_Framework_TestCase
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
        self::expectException(Exception::class);
        self::expectExceptionMessage($expectedExceptionMessage);

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
