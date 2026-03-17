<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SecurityController extends AbstractController
{
    #[Route('/sign-in', name: 'app.login')]
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
        ]);
    }
}
