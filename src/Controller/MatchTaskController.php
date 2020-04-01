<?php

namespace App\Controller;

use App\Repository\MatchTaskRepository;
use App\Service\MatchTaskService;
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
    public function match()
    {
        $this->matchTaskService->matchDuration($this->getDoctrine()->getManager());
        return $this->json([
            'message' => 'Match successful.'
        ]);
    }
}
