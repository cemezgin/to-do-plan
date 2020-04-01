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
        $matchTask = [];

        foreach ($this->group() as $developerId => $value) {
            $duration = 0;
            $week = 1;
            foreach ($value as $task) {
                $duration += $task['duration'];
                if ($duration <= DeveloperService::WEEKLY_DEVELOPER_DURATION) {

                    $matchTask[$week][] = [
                        'task_id' => $task['id'],
                        'developer_id' => $developerId,
                        'type_id' => $task['typeId'],
                        'duration' => $task['duration'],
                        'week' => $week
                    ];
//                    $matchTask = new MatchTask();
//                    $matchTask->setTaskId($task['id']);
//                    $matchTask->setDeveloperId($developerId);
//                    $matchTask->setWeek($week);
//                    $objectManager->persist($matchTask);
//                    $objectManager->flush();

                    if ($duration === DeveloperService::WEEKLY_DEVELOPER_DURATION) {
                        $duration = 0;
                        $week++;
                    }

                } elseif ($duration > DeveloperService::WEEKLY_DEVELOPER_DURATION) {
                    $duration -= $task['duration'];
                }
            }
        }

        return $matchTask;
    }
}