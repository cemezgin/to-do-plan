<?php

namespace App\Adapter;

use App\Adapter\Interfaces\ProviderInterface;
use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\Exception;

class ProviderTwo extends BaseProvider implements ProviderInterface
{
    public const PROVIDER = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';

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
        foreach ($this->get(self::PROVIDER) as $value) {
            $task = new Task();
            $task->setTypeId($value['id']);
            $task->setLevel($value['zorluk']);
            $task->setDuration($value['sure']);
            $objectManager->persist($task);
            $objectManager->flush();
        }
    }
}