<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Source\ImprovedClassSource;

class SeniorDeveloperProvider
{
    public function provideSourceWithParent(): ImprovedClassSource
    {
        $source = new ImprovedClassSource($this->provideClassType());

        return $source->addParent($this->provideParentClassType());
    }

    public function provideSourceWithInterface(): ImprovedClassSource
    {
        $source = new ImprovedClassSource($this->provideClassType());

        return $source->addInterface($this->provideInterfaceType1());
    }

    public function provideSourceWithTrait(): ImprovedClassSource
    {
        $source = new ImprovedClassSource($this->provideClassType());

        return $source->addTrait($this->provideTraitType1());
    }

    public function provideSourceWithAll(): ImprovedClassSource
    {
        return $this->provideSourceWithParent()
            ->addInterface($this->provideInterfaceType1())
            ->addTrait($this->provideTraitType1());
    }

    public function provideSourceWithAllMulti(): ImprovedClassSource
    {
        return $this->provideSourceWithAll()
            ->addInterface($this->provideInterfaceType2())
            ->addTrait($this->provideTraitType2());
    }

    public function provideSourceWithOneParamConstructor(): ImprovedClassSource
    {
        $constructorParams = $this->provide1Parameter();

        $source = $this->provideSourceWithAll()
            ->addConstructorMethod(new ConstructorMethod($constructorParams));

        foreach ($constructorParams as $constructorParam) {
            $property = Property::createFromParameter($constructorParam);
            $source->addGetterMethod($property);
            $source->addProperty($property);
        }

        return $source;
    }

    public function provideSourceWithTwoParamConstructor(): ImprovedClassSource
    {
        $constructorParams = $this->provide2Parameters();

        $source = $this->provideSourceWithAll()
            ->addConstructorMethod(new ConstructorMethod($constructorParams));

        foreach ($constructorParams as $constructorParam) {
            $property = Property::createFromParameter($constructorParam);
            $source->addGetterMethod($property);
            $source->addProperty($property);
        }

        return $source;
    }

    public function provideSourceWithThreeParamConstructor(): ImprovedClassSource
    {
        $constructorParams = $this->provide3Parameters();

        $source = $this->provideSourceWithAll()
            ->addConstructorMethod(new ConstructorMethod($constructorParams));

        foreach ($constructorParams as $constructorParam) {
            $property = Property::createFromParameter($constructorParam);
            $source->addGetterMethod($property);
            $source->addProperty($property);
        }

        return $source;
    }

    public function provideSourceWithOneClasslessParamConstructor(): ImprovedClassSource
    {
        $constructorParams = $this->provide1ParameterWithoutType();

        $source = $this->provideSourceWithAll()
            ->addConstructorMethod(new ConstructorMethod($constructorParams));

        foreach ($constructorParams as $constructorParam) {
            $property = Property::createFromParameter($constructorParam);
            $source->addGetterMethod($property);
            $source->addProperty($property);
        }

        return $source;
    }

    public function provideSourceWithOneTypeDeclarationParamConstructor(): ImprovedClassSource
    {
        $constructorParams = $this->provide1ParameterWithScalarTypes();

        $source = $this->provideSourceWithAll()
            ->addConstructorMethod(new ConstructorMethod($constructorParams));

        foreach ($constructorParams as $constructorParam) {
            $property = Property::createFromParameter($constructorParam);
            $source->addGetterMethod($property);
            $source->addProperty($property);
        }

        return $source;
    }

    private function provide1Parameter(): array
    {
        return [
            Parameter::create('firstName', 'FirstName'),
        ];
    }

    private function provide1ParameterWithoutType(): array
    {
        return [
            Parameter::create('firstName'),
        ];
    }

    private function provide1ParameterWithScalarTypes(): array
    {
        return [
            Parameter::create('firstName', 'string'),
        ];
    }

    private function provide2Parameters(): array
    {
        return [
            Parameter::create('firstName', 'FirstName'),
            Parameter::create('lastName', 'LastName'),
        ];
    }

    private function provide3Parameters(): array
    {
        return [
            Parameter::create('firstName', 'FirstName'),
            Parameter::create('lastName', 'LastName'),
            Parameter::create('amount', 'HR\Finances\Wage'),
        ];
    }

    public function provideClassType(): ClassType
    {
        return new ClassType('Senior', 'Developer');
    }

    private function provideParentClassType(): ClassType
    {
        return new ClassType('Person', 'Human');
    }

    private function provideInterfaceType1(): InterfaceType
    {
        return new InterfaceType('Coder');
    }

    private function provideInterfaceType2(): InterfaceType
    {
        return new InterfaceType('Coder2');
    }

    private function provideTraitType1(): TraitType
    {
        return new TraitType('SomeTrait');
    }

    private function provideTraitType2(): TraitType
    {
        return new TraitType('SomeTrait2');
    }
}
