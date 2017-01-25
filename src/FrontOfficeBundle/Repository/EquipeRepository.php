<?php

namespace FrontOfficeBundle\Repository;

/**
 * EquipeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EquipeRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEquipeNotInChampionnat($championnat){
        $qb = $this->createQueryBuilder("e");
        $qb
            ->innerJoin('e.championnat', 'c')
            ->andWhere($qb->expr()->notIn("c.id", ":championnat"))
            ->setParameter("championnat",$championnat);

        $query=$qb->getQuery();

        return $query->getResult();
    }

    public function myFindAllEquipesDuTop14(){
        $queryBuilder=$this->createQueryBuilder('equipe');
        $query=$queryBuilder->getQuery();
        $results=$query->getResult();
        return $results;
    }

}
