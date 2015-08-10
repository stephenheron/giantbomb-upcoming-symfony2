<?php

namespace AppBundle\Manager;

use AppBundle\Entity\UpcomingEventSetRepository;

class EventManager
{
    private $eventSetRepository;

    function __construct(UpcomingEventSetRepository $eventSetRepository)
    {
        $this->eventSetRepository = $eventSetRepository;
    }

    public function getUpcomingEvents()
    {
        $upcomingEventSet = $this->eventSetRepository->findActiveUpcomingEventSet();
        if($upcomingEventSet) {
            $events = $upcomingEventSet->getEvents();

        } else {
            return [];
        }
    }
}