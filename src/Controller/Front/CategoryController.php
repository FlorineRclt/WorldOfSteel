<?php


namespace App\Controller\Front;


use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{


    /**
     * @Route("/categories/{id}", name="categoryShow")
     */
    public function categoryShow ($id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($id);

        // si la categorie n'a pas été trouvée, je renvoie une exception (erreur)
        // pour afficher une 404
        if (is_null($category)) {
            throw new NotFoundHttpException();
        }

        /*on va chercher la page html twig et on l'interprete dans le navigateur
         on lui envoie les données du tableau pour pouvoir travailler dessus */
        return $this->render('Front/category_show.html.twig', [
            'category' => $category
        ]);
    }
}