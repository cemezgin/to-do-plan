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
    private $week;

//    /**
//     * @ORM\OneToOne(targetEntity="Task", mappedBy="id")
//     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
//     */
//    private $task;

    /**
     * @ORM\Column(type="integer")
     */
    private $developer_id;
//
//    /**
//     * @ORM\OneToOne(targetEntity="Developer", inversedBy="id")
//     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id")
//     */
//    private $developer;

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

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(int $week): self
    {
        $this->week = $week;

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
