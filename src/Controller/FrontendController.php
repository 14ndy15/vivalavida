<?php

namespace App\Controller;

use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    /**
     * @Route("/", name="frontend")
     */
    public function index()
    {
        $home = $this->getDoctrine()
            ->getRepository(Room::class)
            ->getHome();

        $rooms = $this->getDoctrine()
                ->getRepository(Room::class)
                ->getRoomByOrder();

        return $this->render('frontend/index.html.twig', [
            'home' => $home,
            'rooms' => $rooms,
        ]);
    }
}
