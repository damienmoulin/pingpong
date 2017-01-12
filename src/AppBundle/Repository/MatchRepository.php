<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 12/01/17
 * Time: 20:46
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class MatchRepository
 * @package AppBundle\Repository
 */
class MatchRepository extends EntityRepository
{
    public function findNextRounds($round, $player) 
    {
        $result = $this->getEntityManager()
            ->createQueryBuilder('m')
            ->select('m')
            ->from('AppBundle:Match', 'm')
            ->where('m.round = :round')
            ->andWhere('m.playerone = :player OR m.playertwo = :player')
            ->setParameters(
                [
                    ':round' => $round,
                    ':player' => $player
                ]
            )
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return $result;
    }
}