<?php

declare(strict_types=1);

namespace MyVendor\Application\Repository;

use Doctrine\ORM\EntityRepository;
use MyVendor\Application\Entity\ShowReadEntity;

/**
 * @see \spec\MyVendor\Application\Repository\ShowReadRepositorySpec
 * @see \Tests\MyVendor\Application\Repository\ShowReadRepositoryTest
 */
class ShowReadRepository extends EntityRepository
{
    public function save(ShowReadEntity $entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();
    }

    public function remove(ShowReadEntity $entity)
    {
        $this->_em->remove($entity);
        $this->_em->flush();
    }
}
