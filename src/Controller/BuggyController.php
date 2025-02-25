<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuggyController extends AbstractController
{
    #[Route('/bug', name: 'buggy_route')]
    public function buggyAction(): Response
    {
        $data = $this->getData();

        return $this->render('welcome.html.twig', [
            'data' => $data['nonexistent_key'], // Bug : accès à une clé inexistante
        ]);
    }

    private function getData(): array
    {
        return [
            'key1' => 'value1',
            'key2' => 'value2',
        ];
    }
}
