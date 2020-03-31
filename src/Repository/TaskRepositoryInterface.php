<?php

namespace App\Repository;

interface TaskRepositoryInterface
{
    public function findByLevel($level);
}