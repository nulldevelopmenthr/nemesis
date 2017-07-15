<?php

declare(strict_types=1);

namespace NullDev\Skeleton\File;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
final class MiroMiroMiro
{
    /**
     * @var FixerInterface[]
     */
    private $fixers;

    public function __construct(array $fixers)
    {
        $this->fixers = $fixers;
    }

    public function fixContent(string $content): ?string
    {
        $tokens = Tokens::fromCode($content);

        try {
            foreach ($this->fixers as $fixer) {
                // for custom fixers we don't know is it safe to run `->fix()` without checking `->supports()` and `->isCandidate()`,
                // thus we need to check it and conditionally skip fixing
                if (!$fixer instanceof AbstractFixer && !$fixer->isCandidate($tokens)) {
                    continue;
                }

                //@HACK FILE
                $fixer->fix(new \SplFileInfo(__FILE__), $tokens);

                if ($tokens->isChanged()) {
                    $tokens->clearEmptyTokens();
                    $tokens->clearChanged();
                }
            }
        } catch (\Throwable $e) {
            echo $e->getMessage();

            return null;
        }

        return $tokens->generateCode();
    }
}
