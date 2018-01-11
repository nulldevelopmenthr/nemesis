<?php

declare(strict_types=1);

namespace NullDev\Skeleton;

use Exception;
use League\Tactician\Middleware;
use Nette\PhpGenerator\PhpNamespace;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\OutputResource2;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Core\Result;

class PHPParserGeneratorMiddleware implements Middleware
{
    /** @var FileFactory */
    private $fileFactory;

    public function __construct(FileFactory $fileFactory)
    {
        $this->fileFactory = $fileFactory;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);

        $outputs = [];

        foreach ($returnValue as $item) {
            if ($item instanceof PhpNamespace) {
                $namespaceName = $item->getName();
                foreach (array_keys($item->getClasses()) as $className) {
                    $zz = '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.str_replace(
                        "\t", '    ', $item
                    );

                    $outputs[] = new OutputResource2(
                        $this->fileFactory->getPath2(new ClassName($className, $namespaceName)),
                        new ClassName($className, $namespaceName),
                        $zz
                    );
                }
            } elseif ($item instanceof Result) {
                $zz = '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.str_replace(
                    "\t", '    ', $item->getGenerated()
                );

                $outputs[] = new OutputResource2(
                    $this->fileFactory->getPath2($item->getClassDefinition()->getInstanceOf()),
                    $item->getClassDefinition()->getInstanceOf(),
                    $zz
                );
            } else {
                throw new Exception('ERR 32242398: Got '.get_class($item).' expected instance of ImprovedClassSource');
            }
        }

        return $outputs;
    }
}
