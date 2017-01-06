<?php

namespace FrontOfficeBundle\Repository;

/**
 * JourneeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JourneeRepository extends \Doctrine\ORM\EntityRepository
{
    public function getJourneeChampionnat($championnat){
        $queryBuilder = $this->createQueryBuilder('j');
        $queryBuilder->innerJoin('FrontOfficeBundle:Championnat','c','with','j.championnat = c.id')
            ->where('c.nom = :championnat order by j.numero ASC')
            ->setParameter('championnat',$championnat);
        $query=$queryBuilder->getQuery();

        return $query->getResult();
    }

    public function getNumeroJournee($journee){
        $queryBuilder = $this->createQueryBuilder('j');
        $queryBuilder->where('j.id = :journee')
                     ->setParameter('journee',$journee);
        $query=$queryBuilder->getQuery();

        return $query->getResult();
    }
}
