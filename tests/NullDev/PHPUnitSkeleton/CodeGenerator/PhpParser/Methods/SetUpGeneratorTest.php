<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;
use tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator
 * @group  nemesis
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SetUpGeneratorTest extends PHPUnit_Framework_TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): SetUpGenerator
    {
        return new SetUpGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     * @dataProvider provideParameters2
     */
    public function testOutput(ImprovedClassSource $classSource, string $fileName): void
    {
        $method = new SetUpMethod($classSource);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        $provider = new SeniorDeveloperProvider();

        return [
            [new ImprovedClassSource($provider->provideClassType()), '0-no-param'],
            [$provider->provideSourceWithParent(), '0-no-param'],
            [$provider->provideSourceWithInterface(), '0-no-param'],
            [$provider->provideSourceWithTrait(), '0-no-param'],
            [$provider->provideSourceWithAll(), '0-no-param'],
            [$provider->provideSourceWithAllMulti(), '0-no-param'],
            [$provider->provideSourceWithOneParamConstructor(), '1-type-one-param'],
            [$provider->provideSourceWithTwoParamConstructor(), '2-type-two-params'],
            [$provider->provideSourceWithThreeParamConstructor(), '3-type-three-params'],
            [$provider->provideSourceWithOneClasslessParamConstructor(), '1-no-type-one-param'],
            [$provider->provideSourceWithOneTypeDeclarationParamConstructor(), '1-no-type-one-param'],
        ];
    }

    public function provideParameters2(): \Generator
    {
        $classType = ClassType::createFromFullyQualified('BlaBla\Lol');

        $source = new ImprovedClassSource($classType);
        $source->addConstructorMethod(
            new ConstructorMethod(
                [
                    new Parameter('id', new IntType()),
                    new Parameter('name', new StringType()),
                    new Parameter('price', new FloatType()),
                    new Parameter('smart', new BoolType()),
                    new Parameter('tags', new ArrayType()),
                    new Parameter('randomValue'),
                ]
            )
        );

        yield [$source, '2-mix-of-parameters'];
    }
}
