<?php

namespace App\Repository;

use App\Entity\PriseMedicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PriseMedicament>
 */
class PriseMedicamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriseMedicament::class);
    }

    //    /**
    //     * @return PriseMedicament[] Returns an array of PriseMedicament objects
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

    //    public function findOneBySomeField($value): ?PriseMedicament
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findPrisesNonEffectuees(int $userId): array
{
    return $this->createQueryBuilder('p')
        ->join('p.medicament', 'm')
        ->where('m.user = :userId')          // ← filtre par utilisateur
        ->andWhere('p.effectuee = false')
        ->setParameter('userId', $userId)
        ->orderBy('p.heurePrevue', 'ASC')
        ->getQuery()
        ->getResult();
}
}
