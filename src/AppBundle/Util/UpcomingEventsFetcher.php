<?php

namespace AppBundle\Util;

use AppBundle\Entity\Event;
use Buzz\Browser;
use \phpQuery;
use Symfony\Component\HttpKernel\Config\FileLocator;
use Symfony\Component\Process\Process;

class UpcomingEventsFetcher
{
    private $fileLocator;

    function __construct(FileLocator $fileLocator)
    {
        $this->fileLocator = $fileLocator;
    }

    public function getEvents()
    {
        $upcomingEventsScriptPath = $this->fileLocator->locate('@AppBundle/Node/get-upcoming-events.js');

        $process = new Process('node ' . $upcomingEventsScriptPath);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        $jsonOutput = $process->getOutput();
        $events = json_decode($jsonOutput, true);
        if(json_last_error() == JSON_ERROR_NONE) {
            $events = array_map([$this, 'processEvent'], $events);
            dump($events);
        } else {
            throw new \RuntimeException("Command output was not JSON");
        }
    }

    private function processEvent($event)
    {
        $eventEntity = new Event();
        $eventEntity->setTitle($event['title']);
        $eventEntity->setImageUrl($event['imageUrl']);

        return $eventEntity;
    }

}