<?php

namespace App\Controller;

use App\Entity\Developer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeveloperController extends AbstractController
{

    /**
     * @param $level
     * @return object[]
     */
    public function level($level)
    {
        $repository = $this->getDoctrine()->getRepository(Developer::class);
        $list = $repository->findBy(['level' => (int) $level]);

        $response = [];
        foreach ($list as $value) {
            $response = [
                'id' => $value->getId(),
                'level' => $value->getLevel()
            ];
        }

       return new JsonResponse($response);
    }
}
