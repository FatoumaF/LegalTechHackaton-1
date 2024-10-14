<?php

namespace App\Repository;

use App\Entity\Contrats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contrats>
 *
 * @method Contrats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contrats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contrats[]    findAll()
 * @method Contrats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contrats::class);
    }

    // Example method to get contract status counts
    public function getStatutCounts()
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c.statut, COUNT(c.id) as count')
            ->groupBy('c.statut')
            ->getQuery();

        return $qb->getResult();
    }

    // Example method to get the count of signed contracts
    public function getSignedContractsCount()
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->where('c.statut = :signed')
            ->setParameter('signed', 'signé') // Adjust according to your status naming
            ->getQuery()
            ->getSingleScalarResult();
    }

    // Example method to get the count of contracts under revision
    public function getRevisionContractCount()
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->where('c.statut = :revision')
            ->setParameter('revision', 'révision') // Adjust according to your status naming
            ->getQuery()
            ->getSingleScalarResult();
    }
//    /**
//     * @return Contrats[] Returns an array of Contrats objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Contrats
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
