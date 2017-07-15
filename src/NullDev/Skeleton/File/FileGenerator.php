<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGeneratorFactory;
use PhpCsFixer\Config;
use PhpCsFixer\Console\ConfigurationResolver;
use Symfony\Component\Filesystem\Filesystem;

class FileGenerator
{
    /** @var Filesystem */
    private $filesystem;
    /** @var PhpParserGenerator */
    private $codeGenerator;

    public function __construct(Filesystem $filesystem, PhpParserGenerator $codeGenerator)
    {
        $this->filesystem    = $filesystem;
        $this->codeGenerator = $codeGenerator;
    }

    public static function default(): FileGenerator
    {
        return new self(new Filesystem(), PhpParserGeneratorFactory::create());
    }

    public function generate(FileResource $fileResource)
    {
        $fileName = $fileResource->getFileName();
        $content  = $this->codeGenerator->getOutput($fileResource->getClassSource());

        $csFixerDefaultConfig = new Config();

        $resolver = new ConfigurationResolver($csFixerDefaultConfig, [], getcwd());

        $runner = new MiroMiroMiro($resolver->getFixers());

        $new = $runner->fixContent($content);

        //$this->filesystem->dumpFile($fileName, $content);
        $this->filesystem->dumpFile($fileName, $new);

        return true;
    }
}
