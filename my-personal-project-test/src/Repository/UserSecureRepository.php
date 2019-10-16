<?php

namespace App\Repository;

use App\Entity\UserSecure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserSecure|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSecure|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSecure[]    findAll()
 * @method UserSecure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSecureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserSecure::class);
    }

    // /**
    //  * @return UserSecure[] Returns an array of UserSecure objects
    //  */
    
    public function findByNameUser($username)
    {
        $query = $this->createQueryBuilder('u')
                      ->where('u.username LIKE :searchUsername')
                      ->setParameter('searchUsername', '%' . $username . '%')
                      ->setMaxResults(1);
 

        return $query->getQuery()->getResult();
    }
    

    /*
    public function findOneBySomeField($value): ?UserSecure
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
