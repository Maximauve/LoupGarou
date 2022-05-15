<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Mercure\HubInterface;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function index(): Response
  {
    return $this->render('home/index.html.twig', 
			[
        'message' => 'Coucou toi !',
    	]);
  }

	#[Route('/ping', name: 'app_ping', methods: ['POST'])]
	public function ping(HubInterface $hub) : Response
	{
		$update = new Update(
			"http://127.0.0.1",
			json_encode(['Response' => 'Pong !'])
		);

		$hub->publish($update);
		
		return new Response('published !');
	}
}
 