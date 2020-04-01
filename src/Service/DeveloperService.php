<?php

namespace App\Service;

use App\Entity\Developer;
use App\Repository\DeveloperRepositoryInterface;

class DeveloperService
{
    public const WEEKLY_DEVELOPER_DURATION = 45;
    public $developerRepository;

    public function __construct(DeveloperRepositoryInterface $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }

    public function getByLevel($level)
    {
        return $this->developerRepository->findByDeveloperLevel($level);
    }

    /**
     * @return Developer[]
     */
    public function getAll()
    {
        return $this->developerRepository->findAll();
    }

}