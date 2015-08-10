<?php

namespace AppBundle\Util;

use Buzz\Browser;
use \phpQuery;

class UpcomingEventsFetcher
{
    private $buzzBrowser;

    function __construct(Browser $buzzBrowser)
    {
        $this->buzzBrowser = $buzzBrowser;
    }

    public function getEvents()
    {
        $content = $this->getPageContent();
        phpQuery::newDocument($content);

        $promoUpcoming = pq('.promo-upcoming');

        $events = [];
        if($promoUpcoming->length) {
            foreach($promoUpcoming->elements as $upcomingEventElement) {
                dump($upcomingEventElement);
            }
        }

        return $events;
    }

    private function getPageContent()
    {
        $response = $this->buzzBrowser->get('http://www.giantbomb.com/');
        $content = $response->getContent();
        return $content;
    }
}