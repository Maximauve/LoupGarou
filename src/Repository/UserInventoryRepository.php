<?php
//src/Repository/UserInventoryRepository.php
namespace App\Repository;
use App\Entity\UserInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
* @method UserInventory|null find($id, $lockMode = null, $lockVersion = null)
* @method UserInventory|null findOneBy(array $criteria, array $orderBy = null)
* @method UserInventory[]    findAll()
* @method UserInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
*/
class UserInventoryRepository extends ServiceEntityRepository
{
   public function __construct(ManagerRegistry $registry)
   {
       parent::__construct($registry, UserInventory::class);
   }
}