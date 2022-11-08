<?php

namespace App\Repository;

use App\Entity\GoldBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GoldBook>
 *
 * @method GoldBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoldBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoldBook[]    findAll()
 * @method GoldBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoldBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoldBook::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(GoldBook $entity, bool $flush = true): void
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
    public function remove(GoldBook $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return GoldBook[] Returns an array of GoldBook objects
     */
    public function findAllValid($value = 1)
    {
        return $this->createQueryBuilder('GoldBook')
            ->andWhere('GoldBook.isValid = :val')
            ->setParameter('val', $value)
            ->orderBy('GoldBook.created_at', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?GoldBook
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
