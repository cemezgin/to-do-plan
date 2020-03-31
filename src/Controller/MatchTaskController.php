<?php

namespace App\Controller;

use App\Repository\MatchTaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MatchTaskController extends AbstractController
{
    private $matchTaskRepository;

    public function __construct(MatchTaskRepository $matchTaskRepository)
    {
        $this->matchTaskRepository = $matchTaskRepository;
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
