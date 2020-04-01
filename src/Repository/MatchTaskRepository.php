<?php

namespace App\Repository;

use App\Entity\MatchTask;
use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ObjectManager;

/**
 * @method MatchTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchTask[]    findAll()
 * @method MatchTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatchTask::class);
    }

}
