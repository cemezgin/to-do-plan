<?php

namespace App\Service;

class MatchTaskService
{
    private $developerService;
    private $taskService;

    public function __construct(
        DeveloperService $developerService,
        TaskService $taskService
    ) {
        $this->developerService = $developerService;
        $this->taskService = $taskService;
    }

    public function group()
    {
        $levelList = [];
        foreach ($this->developerService->getAll() as $developer) {
            $levelList[$developer->getLevel()][] = $this->taskService->getByLevel($developer->getLevel());
        }

        return $levelList;
    }
}