<?php

namespace App\Repository;

interface DeveloperRepositoryInterface
{
    public function findByDeveloperLevel($level);
    public function findAll();
}