<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
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
    /** @var MockInterface|PhpParserGenerator */
    private $codeGenerator;
    /** @var MockInterface|FileFactory */
    private $fileFactory;
    /** @var PHPParserGeneratorMiddleware */
    private $sut;

    public function setUp()
    {
        $this->codeGenerator = Mockery::mock(PhpParserGenerator::class);
        $this->fileFactory   = Mockery::mock(FileFactory::class);
        $this->sut           = new PHPParserGeneratorMiddleware($this->codeGenerator, $this->fileFactory);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
