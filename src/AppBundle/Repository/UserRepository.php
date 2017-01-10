<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository
 * @package AppBundle\Repository
 */
class UserRepository extends EntityRepository
{
    public function findAllByStructure()
    {
        /**
        $result = $this->getEntityManager()
            ->createQueryBuilder('u')
            ->select('COUNT(u)' ,'u.structurename', 'u')
            ->groupBy('u.structurename')
            ->from('AppBundle:User', 'u')
            ->getQuery()
            ->getResult();

        */
        $result = $this->getEntityManager()
            ->createQueryBuilder('p')
            ->select('COUNT(p)', 'p.userstructure')
            ->groupBy('p.userstructure')
            ->from('AppBundle:Player', 'p')
            ->getQuery()
            ->getResult();

        return $result;
    }
}