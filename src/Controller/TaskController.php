<?php

namespace App\Controller;

use App\Adapter\AdapterProvider;
use App\Adapter\ProviderOne;
use App\Adapter\ProviderTwo;
use App\Repository\TaskRepository;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @Route("/task", name="task")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TaskController.php',
        ]);
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
