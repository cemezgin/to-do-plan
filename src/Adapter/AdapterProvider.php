<?php

namespace App\Adapter;

use App\Adapter\Interfaces\ProviderInterface;
use Doctrine\Persistence\ObjectManager;

class AdapterProvider
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function providerFactory()
    {
        foreach (BaseProvider::PROVIDER_LIST as $provider) {
            $this->providerFetch(new $provider());
        }
    }

    private function providerFetch(ProviderInterface $provider)
    {
        $provider->fetch($this->objectManager);
    }
}