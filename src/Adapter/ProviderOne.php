<?php

namespace App\Adapter;

use App\Adapter\Interfaces\ProviderInterface;
use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\Exception;

class ProviderOne extends BaseProvider implements ProviderInterface
{
    public const PROVIDER = 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7';

    /**
     * @param ObjectManager $objectManager
     * @throws Exception\ClientExceptionInterface
     * @throws Exception\DecodingExceptionInterface
     * @throws Exception\RedirectionExceptionInterface
     * @throws Exception\ServerExceptionInterface
     * @throws Exception\TransportExceptionInterface
     */
    public function fetch(ObjectManager $objectManager)
    {
        foreach ($this->get(self::PROVIDER) as $item) {
            foreach ($item as $key => $taskValue) {
                $task = new Task();
                $task->setTypeId($key);
                $task->setLevel($taskValue['level']);
                $task->setDuration($taskValue['estimated_duration']);
                $objectManager->persist($task);
                $objectManager->flush();
            }
        }
    }
}