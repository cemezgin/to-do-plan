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
    private $entityManager;

    public function __construct(MatchTaskService $matchTaskService, EntityManagerInterface $entityManager)
    {
        $this->matchTaskService = $matchTaskService;
        $this->entityManager = $entityManager;
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

    /**
     * @return JsonResponse
     */
    public function index()
    {

        $list = $this->matchTaskService->matchDuration($this->getDoctrine()->getManager());

        $response = [];
//        foreach ($list as $value) {
//            $response[] = [
//                'task_type' => $value->getTask()->getTypeId(),
//                'duration' => $value->getTask()->getDuration(),
//                'developer_id' => $value->getDeveloperId()
//            ];
//        }

        return new JsonResponse($list);
    }
}
