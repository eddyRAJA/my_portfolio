<?php

namespace App\Controller;

use App\Repository\Project;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    /**
     * @Route("/all_project", name="app_project")
     */
    public function index(ProjectRepository $projectRepo): Response
    {
        $projects = $projectRepo->findAll();
        //dd($projects);

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}
