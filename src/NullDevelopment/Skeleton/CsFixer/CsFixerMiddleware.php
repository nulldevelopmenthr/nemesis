<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\CsFixer;

use Exception;
use League\Tactician\Middleware;
use NullDev\Skeleton\File\OutputResource;
use NullDev\Skeleton\File\OutputResource2;
use PhpCsFixer\Config;
use PhpCsFixer\Console\ConfigurationResolver;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\ToolInfo;
use SplFileInfo;

class CsFixerMiddleware implements Middleware
{
    private $fixers;

    public function __construct()
    {
        $csFixerConfig = new Config();
        $toolInfo      = new ToolInfo();

        $resolver = new ConfigurationResolver($csFixerConfig, [], getcwd(), $toolInfo);

        $this->fixers = $resolver->getFixers();
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $fixed = [];

        foreach ($returnValue as $outputResource) {
            $tokens = Tokens::fromCode($outputResource->getOutput());

            $changes = false;

            $fileInfo = new SplFileInfo($outputResource->getFileName());

            foreach ($this->fixers as $fixer) {
                try {
                    $fixer->fix($fileInfo, $tokens);
                } catch (Exception $exception) {
                    echo $exception->getMessage();
                }

                if ($tokens->isChanged()) {
                    $tokens->clearEmptyTokens();
                    $tokens->clearChanged();
                    $changes = true;
                }
            }

            if (true === $changes) {
                $fixedOutput = $tokens->generateCode();

                if ($outputResource instanceof OutputResource) {
                    $fixed[] = new OutputResource(
                        $outputResource->getFileName(), $outputResource->getClassSource(), $fixedOutput
                    );
                } elseif ($outputResource instanceof OutputResource2) {
                    $fixed[] = new OutputResource2(
                        $outputResource->getFileName(), $outputResource->getClassName(), $fixedOutput
                    );
                }
            } else {
                $fixed[] = $outputResource;
            }
        }

        return $fixed;
    }
}
