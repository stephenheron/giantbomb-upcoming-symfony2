<?php

namespace AppBundle\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/event-category")
 */
class EventCategoryController extends Controller
{
    /**
     * @Route("/")
     */
    public function getEventCategoriesAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:EventCategory');
        $categories = $repository->findAll();

        $serializer = $this->get('jms_serializer');
        $jsonContent = $serializer->serialize($categories, 'json');

        $response = new JsonResponse();
        $response->setContent($jsonContent);

        return $response;
    }
}