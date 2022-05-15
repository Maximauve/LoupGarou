<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;
use App\Form\CreateGameFormType;

class GameController extends AbstractController
{
    #[Route('/startgame', name: 'app_startgame')]
    public function start(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser()) {
            $this->addFlash(
                'error',
                'Vous devez être connecté pour accéder à cette page.'
            );
            return $this->redirectToRoute('app_login');
        }
        if ($request->isMethod('POST')) {
            $game = new Game();
            $players = 0;
            if ($request->request->get('witch') == 'on' ) {
                $players++;
                $game->setNbWitch(1);
            } else {
                $game->setNbWitch(0);
            }
            if ($request->request->get('seer') == 'on' ) {
                $players++;
                $game->setNbSeer(1);
            } else {
                $game->setNbSeer(0);
            }
            if ($request->request->get('hunter') == 'on' ) {
                $players++;
                $game->setNbHunter(1);
            } else {
                $game->setNbHunter(0);
            }
            $game->setNbVillager($request->request->get('villager'));
            $players += $request->request->get('villager');
            $game->setNbWerewolf($request->request->get('werewolf'));
            $players += $request->request->get('werewolf');
            if ($players < 4) {
                return $this->render('game/start.html.twig', [
                    "message" => "Vous devez être 4 minimum pour lancer une partie"
                ]);
            }
            $game->setNbPlayers($players);
            $game->setStart(false);
            $entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }

        return $this->render('game/start.html.twig', [
            "message" => "Choississez la configuration de votre partie"
        ]);
    }
}
