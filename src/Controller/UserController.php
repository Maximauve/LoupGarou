<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Mercure\PublisherInterface;

class UserController extends AbstractController
{
  #[Route('/profil', name: 'app_user')]
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

  #[Route('/test', name: 'app_test')]
  public function test(UserRepository $userRepository): Response
  {
	if (!$this->getUser()) {
		$this->addFlash(
			'error',
			'Vous devez être connecté pour accéder à cette page.'
		);
		return $this->redirectToRoute('app_login');
	}
	$users = $userRepository->findAll();
    return $this->render('test/test.html.twig', [
		"users" => $users
	]);
  }

  #[Route('/friends', name: 'app_friends')]
  public function friends(): Response
  {
	if (!$this->getUser()) {
		$this->addFlash(
			'error',
			'Vous devez être connecté pour accéder à cette page.'
		);
		return $this->redirectToRoute('app_login');
	}
	
    return $this->render('user/friends.html.twig', [
		
	]);
  }


}
