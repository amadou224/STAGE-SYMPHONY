<?php

namespace App\Repository;

use App\Entity\DepartDestination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DepartDestination|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartDestination|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartDestination[]    findAll()
 * @method DepartDestination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartDestinationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DepartDestination::class);
    }

    // /**
    //  * @return DepartDestination[] Returns an array of DepartDestination objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartDestination
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
