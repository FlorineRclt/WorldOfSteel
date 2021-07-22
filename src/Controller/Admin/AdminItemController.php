<?php


namespace App\Controller\Admin;


use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminItemController extends AbstractController
{


    /**
     * @Route("admin/items", name="adminItemList")
     */
    public function itemList(ItemRepository $itemRepository)
    {
        // je dois faire une requete SQL en bdd sur la table item
        // j'utilise la classe ItemRepository pour faire les requetes SELECT et je l'instancie
        // en utilisant l'autowire, j'indique a sf qu'il doit instancier la classe dans ma variable $itemRepository
        $items = $itemRepository->findAll();

        return $this->render('Admin/admin_item_list.html.twig', [
            'items' => $items
        ]);
    }
}