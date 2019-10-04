<?php

namespace App\Repository;

use App\Entity\CollectionName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CollectionName|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectionName|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectionName[]    findAll()
 * @method CollectionName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CollectionName::class);
    }

    // /**
    //  * @return CollectionName[] Returns an array of CollectionName objects
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
    public function findOneBySomeField($value): ?CollectionName
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
