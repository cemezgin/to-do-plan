<?php

namespace App\Controller;

use App\Repository\MatchTaskRepository;
use App\Service\MatchTaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MatchTaskController extends AbstractController
{
    private $matchTaskService;

    public function __construct(MatchTaskService $matchTaskService)
    {
        $this->matchTaskService = $matchTaskService;
    }

    /**
     * @Route("/match/task", name="match_task")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MatchTaskController.php',
        ]);
    }
}
