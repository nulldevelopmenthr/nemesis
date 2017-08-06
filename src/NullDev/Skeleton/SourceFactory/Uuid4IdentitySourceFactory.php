<?php

declare(strict_types=1);

namespace NullDev\Skeleton\SourceFactory;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod;
use Ramsey\Uuid\Uuid;

class Uuid4IdentitySourceFactory implements SourceFactory
{
    /** @var ClassSourceFactory */
    private $sourceFactory;

    public function __construct(ClassSourceFactory $sourceFactory)
    {
        $this->sourceFactory = $sourceFactory;
    }

    public function create(ClassType $classType)
    {
        $source = $this->sourceFactory->create($classType);
        $param  = new Parameter('id', new StringType());

        //Add constructor method.
        $source->addConstructorMethod(new ConstructorMethod([$param]));
        //Add getter.
        $source->addGetterMethod($param);
        //Add __toString() method.
        $source->addMethod(new ToStringMethod($param));
        //Add static create() method.
        $source->addMethod(new UuidCreateMethod($classType));
        //Add Ramsey\Uuid\Uuid to imports.
        $source->addImport(ClassType::createFromFullyQualified(Uuid::class));

        return $source;
    }
}
