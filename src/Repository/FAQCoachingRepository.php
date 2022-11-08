<?php

namespace App\Repository;

use App\Entity\FAQCoaching;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FAQCoaching>
 *
 * @method FAQCoaching|null find($id, $lockMode = null, $lockVersion = null)
 * @method FAQCoaching|null findOneBy(array $criteria, array $orderBy = null)
 * @method FAQCoaching[]    findAll()
 * @method FAQCoaching[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FAQCoachingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FAQCoaching::class);
    }

    public function add(FAQCoaching $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FAQCoaching $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FAQCoaching[] Returns an array of FAQCoaching objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FAQCoaching
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
