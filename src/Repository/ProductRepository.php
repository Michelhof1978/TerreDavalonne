<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Product::class);
        $this->paginator = $paginator;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Product $entity, bool $flush = true): void
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
    public function remove(Product $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Récupère les produits en lien avec une recherche
     * @return PaginationInterface
     */
    public function findSearch(SearchData $search): PaginationInterface
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('ep', 'p', 'eb', 'es')
            ->join('p.elementPhyto', 'ep')
            ->join('p.elementBase', 'eb')
            ->join('p.elementSabbat', 'es');

        if(!empty($search->q)){
            $query = $query
                ->andWhere('p.name LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->min)){
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', "%{$search->min}%");
        }

        if(!empty($search->max)){
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', "%{$search->max}%");
        }

        if(!empty($search->promo)){
            $query = $query
                ->andWhere('p.promo = 1');
        }

        if(!empty($search->elementPhyto)){
            $query = $query
                ->andWhere('ep.id IN (:elementPhyto)')
                ->setParameter('elementPhyto', $search->elementPhyto);
        }

        if(!empty($search->elementBase)){
            $query = $query
                ->andWhere('eb.id IN (:elementBase)')
                ->setParameter('elementBase', $search->elementBase);
        }

        if(!empty($search->elementSabbat)){
            $query = $query
                ->andWhere('es.id IN (:elementSabbat)')
                ->setParameter('elementSabbat', $search->elementSabbat);
        }

        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
            6
        );
    }

    /**
     * Récupère les produits en lien avec une recherche
     * @return PaginationInterface
     */
    public function listAction(SearchData $search, PaginatorInterface $paginator)
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('ep', 'p', 'eb', 'es')
            ->join('p.elementPhyto', 'ep')
            ->join('p.elementBase', 'eb')
            ->join('p.elementSabbat', 'es');

        $query = $query->getQuery();
        return $paginator->paginate(
            $query,
            $search->page,
            6
        );
    }


    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
