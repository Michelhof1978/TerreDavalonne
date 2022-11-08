<?php

namespace App\Repository;

use App\Entity\ParametersGeneraux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ParametersGeneraux>
 *
 * @method ParametersGeneraux|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParametersGeneraux|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParametersGeneraux[]    findAll()
 * @method ParametersGeneraux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParametersGenerauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParametersGeneraux::class);
    }

    public function add(ParametersGeneraux $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ParametersGeneraux $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ParametersGeneraux[] Returns an array of ParametersGeneraux objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ParametersGeneraux
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
