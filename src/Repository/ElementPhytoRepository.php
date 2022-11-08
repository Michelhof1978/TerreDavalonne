<?php

namespace App\Repository;

use App\Entity\ElementPhyto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElemenPhyto>
 *
 * @method ElemenPhyto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElemenPhyto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElemenPhyto[]    findAll()
 * @method ElemenPhyto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementPhytoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementPhyto::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ElementPhyto $entity, bool $flush = true): void
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
    public function remove(ElementPhyto $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**

    //  * @return ElementPhyto[] Returns an array of ElementPhyto objects
    //  * @return ElemenPhyto[] Returns an array of ElemenPhyto objects
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
    public function findOneBySomeField($value): ?ElementPhyto
    public function findOneBySomeField($value): ?ElemenPhyto
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
