<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchTaskRepository")
 */
class MatchTask
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $task_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $developer_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskId(): ?int
    {
        return $this->task_id;
    }

    public function setTaskId(int $task_id): self
    {
        $this->task_id = $task_id;

        return $this;
    }

    public function getDeveloperId(): ?int
    {
        return $this->developer_id;
    }

    public function setDeveloperId(int $developer_id): self
    {
        $this->developer_id = $developer_id;

        return $this;
    }
}
