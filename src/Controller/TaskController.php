<?php

namespace App\Controller;

use App\Adapter\AdapterProvider;
use App\Adapter\ProviderOne;
use App\Adapter\ProviderTwo;
use App\Repository\TaskRepository;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TaskController extends AbstractController
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @return JsonResponse
     */
    public function fetch()
    {
       $this->taskService->fetchTasks($this->getDoctrine()->getManager());
        return $this->json([
            'message' => 'Fetch successful.'
        ]);
    }
}
