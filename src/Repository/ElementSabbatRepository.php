<?php

namespace App\Repository;

use App\Entity\ElementSabbat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElementSabbat>
 *
 * @method ElementSabbat|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementSabbat|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementSabbat[]    findAll()
 * @method ElementSabbat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementSabbatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementSabbat::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ElementSabbat $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ElementSabbat $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ElementSabbat[] Returns an array of ElementSabbat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElementSabbat
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
