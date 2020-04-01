<?php

namespace App\Controller;

use App\Entity\MatchTask;
use App\Repository\MatchTaskRepository;
use App\Service\MatchTaskService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MatchTaskController extends AbstractController
{
    private $matchTaskService;

    public function __construct(MatchTaskService $matchTaskService)
    {
        $this->matchTaskService = $matchTaskService;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse($this->matchTaskService->matchDuration());
    }
}
