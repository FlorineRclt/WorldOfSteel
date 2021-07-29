<?php


namespace App\Controller\Front;


use App\Repository\CategoryRepository;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{

    /**
     * @Route("/items", name="itemList")
     */
    public function itemList(ItemRepository $itemRepository) //CategoryRepository $categoryRepository
    {
        // j'affiche dynamiquement les catégories sur la page des petites annonces
        // en allant récuperer les données grâce au CategoryRepository et au findAll
        // qui permet de faire une requête Select en SQL
//        $categories = $categoryRepository->findAll();
        $items = $itemRepository->findAll();

        return $this->render('Front/item_list.html.twig', [
            'items' => $items,
//            'categories' => $categories
        ]);
    }


    /**
     * @Route("/items/{id}", name="itemShow")
     */
    public function itemShow($id, ItemRepository $itemRepository) //?Profiler $profiler
    {
//        if (null !== $profiler) {
//            $profiler->disable();
//        }
        $item = $itemRepository->find($id);

        if (is_null($item)) {
            throw new NotFoundHttpException();
        }

        return $this->render('Front/item_show.html.twig', [
            'item' => $item
        ]);


    }


}