<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetUpcomingEventsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('giantbomb:get-upcoming-events')
            ->setDescription('Check giantbomb.com for upcoming events');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fetcher = $this->getContainer()->get('upcoming_events_fetcher');
        $events = $fetcher->getEvents();
    }

}