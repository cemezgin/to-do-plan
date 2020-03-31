<?php

namespace App\Adapter\Interfaces;

use Doctrine\Persistence\ObjectManager;

interface ProviderInterface
{
    public function fetch(ObjectManager $objectManager);
}