<?php


namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPageController extends AbstractController
{
    /**
     * @Route("/admin/", name="adminHome")
     */
    public function home ()
    {
        return $this->render('Admin/admin_home.html.twig');
    }
}