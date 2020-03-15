<?php

namespace App\Service;

use App\Entity\History;
use App\Repository\HistoryRepository;
use Doctrine\ORM\EntityManagerInterface;

class HistoryService {

    private $history;
    private $entityManager;

    public function __construct(HistoryRepository $history, EntityManagerInterface $entityManager)
    {
        $this->history = $history;
        $this->entityManager = $entityManager;
    }

    public function addToHistory(String $add){
        $item = new History();
        $item->setUrl($add);
        $this->entityManager->persist($item);
        $this->entityManager->flush();
    }

    public function getHistory(){
        return $this->history->findAll();
    }
}