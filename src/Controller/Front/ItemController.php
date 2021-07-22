<?php


namespace App\Controller\Front;


use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{

    /**
     * @Route("/items", name="itemList")
     */
    public function itemList(ItemRepository $itemRepository)
    {
        $items = $itemRepository->findAll();

        return $this->render('Front/item_list.html.twig', [
            'items' => $items
        ]);
    }


}