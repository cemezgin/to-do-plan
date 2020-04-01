<?php

namespace App\Service;

use App\Entity\MatchTask;
use Doctrine\Persistence\ObjectManager;

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

    private function group()
    {
        $levelList = [];
        foreach ($this->developerService->getAll() as $developer) {
            $levelList[$developer->getId()] = $this->taskService->getByLevel($developer->getLevel());
        }

        return $levelList;
    }

    public function matchDuration(ObjectManager $objectManager)
    {
        foreach ($this->group() as $developerId => $value) {
            $duration = 0;
            foreach ($value as $task) {
                $duration += $task['duration'];
                if ($duration <= DeveloperService::WEEKLY_DEVELOPER_DURATION) {
                    $matchTask = new MatchTask();
                    $matchTask->setTaskId($task['id']);
                    $matchTask->setDeveloperId($developerId);
                    $objectManager->persist($matchTask);
                    $objectManager->flush();

                    if ($duration === DeveloperService::WEEKLY_DEVELOPER_DURATION) {
                        continue;
                    }

                } elseif ($duration > DeveloperService::WEEKLY_DEVELOPER_DURATION) {
                    $duration -= $task['duration'];
                }
            }
        }
    }
}