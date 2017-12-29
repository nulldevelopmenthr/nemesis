<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;

/**
 * @see SpecDeserializeMethodGeneratorSpec
 * @see SpecDeserializeMethodGeneratorTest
 */
class SpecDeserializeMethodGenerator implements MethodGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDeserializeMethod) {
            return true;
        }

        return false;
    }

    public function generateAsString(Method $method): string
    {
        $code = $this->generate($method);

        return $code->__toString();
    }

    public function generate(Method $method): NetteMethod
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceFullName());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $property = $method->getProperties()[0];
            $value    = $this->exampleMaker->value($property);
        } else {
            $values = [];
            foreach ($method->getProperties() as $property) {
                $values[] = sprintf("'%s' => %s", $property->getName(), $this->exampleMaker->value($property));
            }

            $value = '['.implode(', ', $values).']';
        }

        $code->addBody(sprintf('$input = %s;', $value))
            ->addBody('')
            ->addBody(
                sprintf(
                    '$this->deserialize($input)->shouldReturnAnInstanceOf(%s::class);',
                    $method->getClassName()->getName()
                )
            );
    }
}
