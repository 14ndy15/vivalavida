<?php

namespace App\Repository;

use App\Entity\ImageFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageFile[]    findAll()
 * @method ImageFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageFileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageFile::class);
    }

    /**
     * @return ImageGallery[] Returns an array of ImageGallery objects
     */

    public function findByOrder()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?ImageGallery
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
