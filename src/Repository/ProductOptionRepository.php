<?php

namespace App\Repository;

use App\Entity\ProductOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Option>
 *
 * @method Option|null find($id, $lockMode = null, $lockVersion = null)
 * @method Option|null findOneBy(array $criteria, array $orderBy = null)
 * @method Option[]    findAll()
 * @method Option[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductOption::class);
    }

    public function add(ProductOption $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProductOption $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
