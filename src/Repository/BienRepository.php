<?php

namespace App\Repository;

use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bien>
 *
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bien::class);
    }

    public function add(Bien $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Bien $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Bien[] Returns an array of Bien objects
     */
    public function filteredBiens(
        ?bool $transactionType,
        ?string $surfaceMin,
        ?string $surfaceMax,
        ?string $nbPiecesMin,
        ?string $nbPiecesMax,
        ?string $prixMin,
        ?string $prixMax
    ): array {
        $qb = $this->createQueryBuilder('b');
        // dump($transactionType);
        if ($transactionType) {
            $qb->andWhere("b.transactionType = $transactionType");
        }
        if ($surfaceMin) {
            $qb->andWhere("b.surface >= $surfaceMin");
        }
        if ($surfaceMax) {
            $qb->andWhere("b.surface <= $surfaceMax");
        }
        if ($nbPiecesMin) {
            $qb->andWhere("b.surface >= $nbPiecesMin");
        }
        if ($nbPiecesMax) {
            $qb->andWhere("b.surface <= $nbPiecesMax");
        }
        if ($prixMin) {
            $qb->andWhere("b.surface >= $prixMin");
        }
        if ($prixMax) {
            $qb->andWhere("b.surface <= $prixMax");
        }

        return $qb->getQuery()
            ->getResult();
    }

}
