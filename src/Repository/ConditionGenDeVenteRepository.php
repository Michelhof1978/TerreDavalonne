<?php

namespace App\Repository;

use App\Entity\ConditionGenDeVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConditionGenDeVente>
 *
 * @method ConditionGenDeVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConditionGenDeVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConditionGenDeVente[]    findAll()
 * @method ConditionGenDeVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConditionGenDeVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConditionGenDeVente::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConditionGenDeVente $entity, bool $flush = true): void
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
    public function remove(ConditionGenDeVente $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ConditionGenDeVente[] Returns an array of ConditionGenDeVente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConditionGenDeVente
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
