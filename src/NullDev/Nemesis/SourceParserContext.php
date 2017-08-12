<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Webmozart\Assert\Assert;

class SourceParserContext implements Context
{
    /** @var SourceParser */
    private $sourceParser;
    /** @var string */
    private $input;
    /** @var array */
    private $result;

    /**
     * @When source file contains:
     */
    public function sourceFileContains(PyStringNode $input)
    {
        $this->input = $input->getRaw();
    }

    /**
     * @When I parse it
     */
    public function iParseIt()
    {
        $this->sourceParser = new SourceParser();

        $this->result = $this->sourceParser->parse($this->input);
    }

    /**
     * @Then result is an empty array
     */
    public function resultIsAnEmptyArray()
    {
        Assert::isEmpty($this->result);
    }

    /**
     * @Then result is an instance of :className
     */
    public function resultIsAnInstanceOf(string $className)
    {
        Assert::eq($className, $this->getResult()->getFullName());
    }

    /**
     * @Then result has :count import
     * @Then result has :count imports
     */
    public function resultHasImport(int $count)
    {
        Assert::count($this->getResult()->getImports(), $count);
    }

    /**
     * @Then result will have this imports:
     */
    public function resultWillHaveThisImports(TableNode $table)
    {
        $imports = $this->getResult()->getImports();

        $importClassNames = array_map(
            function ($import) {
                return $import->getFullName();
            },
            $imports
        );

        foreach ($table as $item) {
            Assert::true(in_array($item['className'], $importClassNames));
        }
    }

    /**
     * @Then result has no constructor method defined
     */
    public function resultHasNoConstructorMethodDefined()
    {
        Assert::false($this->getResult()->hasConstructorMethod());
    }

    /**
     * @Then result has constructor method defined
     */
    public function resultHasConstructorMethodDefined()
    {
        Assert::true($this->getResult()->hasConstructorMethod());
    }

    /**
     * @Then result has :count constructor parameters
     */
    public function resultHasConstructorParameters(int $count)
    {
        Assert::count($this->getResult()->getConstructorParameters(), $count);
    }

    /**
     * @Then result will have this constructor parameters:
     */
    public function resultWillHaveThisConstructorParameters($table)
    {
        $constructorParameters = $this->getResult()->getConstructorParameters();

        foreach ($table as $key => $item) {
            $param = $constructorParameters[$key];

            if (true === empty($item['className'])) {
                Assert::false($param->hasType());
            } else {
                Assert::eq($item['className'], $param->getType()->getFullName());
            }

            Assert::eq($item['name'], $param->getName());
        }
    }

    /**
     * @Then result has :count properties
     */
    public function resultHasProperties(int $count)
    {
        Assert::count($this->getResult()->getProperties(), $count);
    }

    /**
     * @Then result will have this properties:
     */
    public function resultWillHaveThisProperties(TableNode $table)
    {
        $properties = $this->getResult()->getProperties();

        foreach ($table as $key => $item) {
            $param = $properties[$key];

            if (true === empty($item['className'])) {
                Assert::false($param->hasType());
            } else {
                Assert::eq($item['className'], $param->getType()->getFullName());
            }

            Assert::eq($item['name'], $param->getName());
        }
    }

    /**
     * @Then result has :count methods
     */
    public function resultHasMethods(int $count)
    {
        Assert::count($this->getResult()->getMethods(), $count);
    }

    /**
     * @Then result has :count getter methods
     */
    public function resultHasGetterMethods(int $count)
    {
        $getterMethods = array_filter(
            $this->getResult()->getMethods(),
            function ($method) {
                if ($method instanceof GetterMethod) {
                    return true;
                }

                return false;
            }
        );
        Assert::count($getterMethods, $count);
    }

    /**
     * @Then result will have this getterMethods:
     */
    public function resultWillHaveThisGettermethods(TableNode $table)
    {
        $getterMethods = array_filter(
            $this->getResult()->getMethods(),
            function ($method) {
                if ($method instanceof GetterMethod) {
                    return true;
                }

                return false;
            }
        );

        // Array filter preserves original keys :(
        $getterMethods = array_values($getterMethods);

        foreach ($table as $key => $item) {
            $getterMethod = $getterMethods[$key];
            Assert::eq($item['getterName'], $getterMethod->getMethodName());
            Assert::eq($item['propertyName'], $getterMethod->getPropertyName());
            if (true === empty($item['className'])) {
                Assert::false($getterMethod->getParameter()->hasType());
            } else {
                Assert::eq($item['className'], $getterMethod->getParameter()->getType()->getFullName());
            }
        }
    }

    private function getResult(): ImprovedClassSource
    {
        return $this->result[0];
    }
}