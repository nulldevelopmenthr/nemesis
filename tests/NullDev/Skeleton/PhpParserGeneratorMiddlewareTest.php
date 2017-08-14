<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\PhpParserGeneratorMiddleware;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\PhpParserGeneratorMiddleware
 * @group  todo
 */
class PhpParserGeneratorMiddlewareTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|PhpParserGenerator */
    private $codeGenerator;
    /** @var MockInterface|FileFactory */
    private $fileFactory;
    /** @var PhpParserGeneratorMiddleware */
    private $phpParserGeneratorMiddleware;

    public function setUp()
    {
        $this->codeGenerator                = Mockery::mock(PhpParserGenerator::class);
        $this->fileFactory                  = Mockery::mock(FileFactory::class);
        $this->phpParserGeneratorMiddleware = new PhpParserGeneratorMiddleware($this->codeGenerator, $this->fileFactory);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
