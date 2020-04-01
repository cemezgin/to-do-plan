<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ShowPlanCommand extends Command
{
    protected static $defaultName = 'app:show-plan';

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $client  = new CurlHttpClient();
            $response = $client->request('GET', 'http://127.0.0.1:8000/api/v1/tasks');
            var_dump($response->toArray());

        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}