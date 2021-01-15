<?php

namespace App\Repository;

use App\Entity\ResultsGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResultsGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResultsGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResultsGame[]    findAll()
 * @method ResultsGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultsGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResultsGame::class);
    }

    // /**
    //  * @return ResultsGame[] Returns an array of ResultsGame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResultsGame
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
