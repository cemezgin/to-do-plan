<?php

namespace App\Service;

use App\Adapter\AdapterProvider;
use App\Repository\TaskRepositoryInterface;
use Doctrine\Persistence\ObjectManager;

class TaskService
{
    public $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function fetchTasks(ObjectManager $objectManager)
    {
        (new AdapterProvider($objectManager))->providerFactory();
    }

    public function getByLevel($level)
    {
        return $this->taskRepository->findByLevel($level);
    }

}