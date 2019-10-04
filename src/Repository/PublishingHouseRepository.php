<?php

namespace App\Repository;

use App\Entity\PublishingHouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PublishingHouse|null find($id, $lockMode = null, $lockVersion = null)
 * @method PublishingHouse|null findOneBy(array $criteria, array $orderBy = null)
 * @method PublishingHouse[]    findAll()
 * @method PublishingHouse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublishingHouseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PublishingHouse::class);
    }

    // /**
    //  * @return PublishingHouse[] Returns an array of PublishingHouse objects
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
    public function findOneBySomeField($value): ?PublishingHouse
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
