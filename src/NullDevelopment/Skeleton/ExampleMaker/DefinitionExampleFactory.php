<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use Symfony\Component\Yaml\Yaml;

class DefinitionExampleFactory
{
    private function loadDefinition(string $fullName): ?array
    {
        $path = getcwd().'/definitions/'.str_replace('\\', '/', $fullName).'.yaml';

        if (false === is_file($path)) {
            return null;
        }

        // Load Yaml file content
        $fileContent = file_get_contents($path);

        // Parse content
        $parsedYaml = Yaml::parse($fileContent);

        // Return definition part.
        return $parsedYaml['definition'];
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function instance(string $fullName)
    {
        $definition = $this->loadDefinition($fullName);

        if (null === $definition) {
            return null;
        }

        if (false === array_key_exists('constructor', $definition)) {
            return null;
        }

        if (null === $definition['constructor']) {
            return null;
        }

        $arguments = [];

        foreach ($definition['constructor'] as $propertyName => $propertyDefinition) {
            $className = ClassName::create($propertyDefinition['instanceOf']);

            if (false === $className->isObject()) {
                if (false === array_key_exists('examples', $propertyDefinition)) {
                    return null;
                }
                if (true === empty($propertyDefinition['examples'])) {
                    return null;
                }
                $exampleValue = array_pop($propertyDefinition['examples']);

                if (true === $className->isArray()) {
                    $arguments[$propertyName] = ArrayExample2::create($exampleValue);
                } else {
                    $arguments[$propertyName] = new SimpleExample($exampleValue);
                }
            } else {
                $result = $this->instance($className->getFullName());

                if (null === $result) {
                    return null;
                }
                $arguments[$propertyName] = $result;
            }
        }

        if (true === empty($arguments)) {
            return null;
        }

        return new InstanceExample(ClassName::create($fullName), $arguments);
    }
}
