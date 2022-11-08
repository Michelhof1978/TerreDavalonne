<?php

namespace App\Repository;

use App\Entity\ConfigBloc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConfigBloc>
 *
 * @method ConfigBloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigBloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigBloc[]    findAll()
 * @method ConfigBloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigBlocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigBloc::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConfigBloc $entity, bool $flush = true): void
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
    public function remove(ConfigBloc $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ConfigBloc[] Returns an array of ConfigBloc objects
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
    public function findOneBySomeField($value): ?ConfigBloc
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
