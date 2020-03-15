<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Service\HistoryService;

class HistoryController extends AbstractController
{
  public function listHistory(HistoryService $service)
  {
    $history = $service->getHistory();
    return $this->render('base.html.twig', ['history' => $history]);
  }

  public function addToHistory(HistoryService $service, Request $req)
  {
    $url = $req->query->get('url');
    $history = $service->addToHistory($url);
    return $this->redirectToRoute('list-history');
  }

}