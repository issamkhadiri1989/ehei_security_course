<?php

declare(strict_types=1);

namespace App\Controller;

use App\Account\Factory\DefaultAccountFactory;
use App\Account\Handler\AccountHandler;
use App\DTO\RegistrationRequest;
use App\Form\Type\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(
        Request $request,
        DefaultAccountFactory $accountFactory,
        AccountHandler $handler,
    ): Response {
        $registrationRequest = new RegistrationRequest();
        $form = $this->createForm(RegisterType::class, $registrationRequest);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $account = $accountFactory->createUserInstance($registrationRequest);

            $handler->save($account, true);

            return $this->redirectToRoute('app_register');
        }

        return $this->render('register/index.html.twig', [
            'registration_form' => $form,
        ]);
    }
}
