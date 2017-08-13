<?php

declare(strict_types=1);

namespace NullDev\Skeleton;

use League\Tactician\Middleware;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;

class PhpParserGeneratorMiddleware implements Middleware
{
    /** @var PhpParserGenerator */
    private $codeGenerator;
    /** @var FileFactory */
    private $fileFactory;

    public function __construct(PhpParserGenerator $codeGenerator, FileFactory $fileFactory)
    {
        $this->codeGenerator = $codeGenerator;
        $this->fileFactory   = $fileFactory;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $outputs = [];

        foreach ($returnValue as $item) {
            if ($item instanceof ImprovedClassSource) {
                $outputs[] = $this->fileFactory->createOutputResource($item, $this->codeGenerator->getOutput($item));
            } else {
                throw new \Exception('ERR 32242398: Got '.get_class($item).' expected instance of ImprovedClassSource');
            }
        }

        return $outputs;
    }
}
