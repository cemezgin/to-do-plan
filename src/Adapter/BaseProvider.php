<?php

namespace App\Adapter;

use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class BaseProvider
{
    public const PROVIDER_LIST = [
        'ProviderOne' => ProviderOne::class,
        'ProviderTwo' => ProviderTwo::class
    ];
    protected const REQUEST_GET = 'GET';

    /**
     * @param $providerUrl
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    protected function get($providerUrl)
    {
        try {
        $client  = new CurlHttpClient();
        $response = $client->request(self::REQUEST_GET, $providerUrl);

        return $response->toArray();

        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }
}