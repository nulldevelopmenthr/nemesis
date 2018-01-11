<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\PHPParserGeneratorMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\PHPParserGeneratorMiddleware
 * @group  todo
 */
class PHPParserGeneratorMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|FileFactory */
    private $fileFactory;

    /** @var PHPParserGeneratorMiddleware */
    private $sut;

    public function setUp()
    {
        $this->fileFactory = Mockery::mock(FileFactory::class);
        $this->sut         = new PHPParserGeneratorMiddleware($this->fileFactory);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
