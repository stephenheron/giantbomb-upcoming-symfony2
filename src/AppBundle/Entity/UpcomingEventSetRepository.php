<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UpcomingEventSetRepository extends EntityRepository
{
    public function findActiveUpcomingEventSet()
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT es FROM AppBundle:UpcomingEventSet WHERE es.active = TRUE'
            );
        $query->setFetchMode('AppBundle:UpcomingEventSet', 'events', ClassMetadata::FETCH_EAGER);
        return $query->getResult();
    }
}