<?php

namespace App\Repository;

use App\Entity\MatchTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MatchTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchTask[]    findAll()
 * @method MatchTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchedTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatchTask::class);
    }

    // /**
    //  * @return MatchTask[] Returns an array of MatchTask objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MatchTask
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
