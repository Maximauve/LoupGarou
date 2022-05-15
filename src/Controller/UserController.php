<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
  #[Route('/profile', name: 'app_profile')]
  public function index(): Response
  {
		if (!$this->getUser()) {
			$this->addFlash(
				'error',
				'Vous devez être connecté pour accéder à cette page.'
			);
			return $this->redirectToRoute('app_login');
		}
    return $this->render('user/index.html.twig', [
    ]);
  }
}
