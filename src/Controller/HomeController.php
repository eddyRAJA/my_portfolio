<?php

namespace App\Controller;

use App\Repository\AboutMeRepository;
use App\Repository\TimelineRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function aboutMe(AboutMeRepository $aboutMeRepo): Response
    {
        $aboutMe = $aboutMeRepo->findOneBy(['id' => '1']);
        //dd($aboutMe);
        return $this->render('home/index.html.twig', [
            'aboutMe' => $aboutMe
        ]);
    }

    /**
     * @Route("/more", name="more")
     */
    public function moreAboutMe(TimelineRepository $timelineRepo): Response
    {
        $timeline = $timelineRepo->findAll();
        //dd($timeline);
        return $this->render('home/timeline.html.twig', [
            'timeline' => $timeline,
        ]);
    }


}
