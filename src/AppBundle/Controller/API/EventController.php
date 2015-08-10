<?php

namespace AppBundle\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/event")
 */
class EventController extends Controller
{
    /**
     * @Route("/upcoming")
     */
    public function getEventCategoriesAction(Request $request)
    {
        $events = $this->get('event_manager')->getUpcomingEvents();

        $serializer = $this->get('jms_serializer');
        $jsonContent = $serializer->serialize($events, 'json');

        $response = new JsonResponse();
        $response->setContent($jsonContent);

        return $response;
    }
}