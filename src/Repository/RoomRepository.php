<?php

namespace App\Repository;

use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Room|null find($id, $lockMode = null, $lockVersion = null)
 * @method Room|null findOneBy(array $criteria, array $orderBy = null)
 * @method Room[]    findAll()
 * @method Room[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);
    }

    public function getHome(): ?Room
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.position = :position')
            ->setParameter('position',0)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    /**
     * @return Room[] Returns an array of BlogEntry objects
     */
    public function getRoomByOrder()
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.position > :position')
            ->setParameter('position',0)
            ->orderBy('r.position', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Room
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
