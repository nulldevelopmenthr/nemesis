<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
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
        return $this->provideSourceWithAll()->addConstructorMethod($this->provideConstructorWith1Parameters());
    }

    public function provideSourceWithTwoParamConstructor(): ImprovedClassSource
    {
        return $this->provideSourceWithAll()->addConstructorMethod($this->provideConstructorWith2Parameters());
    }

    public function provideSourceWithThreeParamConstructor(): ImprovedClassSource
    {
        return $this->provideSourceWithAll()->addConstructorMethod($this->provideConstructorWith3Parameters());
    }

    public function provideSourceWithOneClasslessParamConstructor(): ImprovedClassSource
    {
        return $this->provideSourceWithAll()->addConstructorMethod($this->provideConstructorWith1ClasslessParameters());
    }

    public function provideSourceWithOneTypeDeclarationParamConstructor(): ImprovedClassSource
    {
        return $this->provideSourceWithAll()
            ->addConstructorMethod($this->provideConstructorWith1ScalarTypesParameters());
    }

    protected function provideConstructorWith1Parameters(): ConstructorMethod
    {
        return new ConstructorMethod([new Parameter('firstName', new ClassType('FirstName'))]);
    }

    protected function provideConstructorWith1ClasslessParameters(): ConstructorMethod
    {
        return new ConstructorMethod([new Parameter('firstName')]);
    }

    protected function provideConstructorWith1ScalarTypesParameters(): ConstructorMethod
    {
        return new ConstructorMethod([new Parameter('firstName', new StringType())]);
    }

    protected function provideConstructorWith2Parameters(): ConstructorMethod
    {
        $params = [
            new Parameter('firstName', new ClassType('FirstName')),
            new Parameter('lastName', new ClassType('LastName')),
        ];

        return new ConstructorMethod($params);
    }

    protected function provideConstructorWith3Parameters(): ConstructorMethod
    {
        $params = [
            new Parameter('firstName', new ClassType('FirstName')),
            new Parameter('lastName', new ClassType('LastName')),
            new Parameter('amount', new ClassType('Wage', 'HR\\Finances')),
        ];

        return new ConstructorMethod($params);
    }

    public function provideClassType(): ClassType
    {
        return new ClassType('Senior', 'Developer');
    }

    protected function provideParentClassType(): ClassType
    {
        return new ClassType('Person', 'Human');
    }

    protected function provideInterfaceType1(): InterfaceType
    {
        return new InterfaceType('Coder');
    }

    protected function provideInterfaceType2(): InterfaceType
    {
        return new InterfaceType('Coder2');
    }

    protected function provideTraitType1(): TraitType
    {
        return new TraitType('SomeTrait');
    }

    protected function provideTraitType2(): TraitType
    {
        return new TraitType('SomeTrait2');
    }
}
