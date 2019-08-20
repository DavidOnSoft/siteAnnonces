<?php
namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{slug}",name="category.show",methods="GET")
     * @param Category $category
     * @return Response
     */
    public function show(Category $category):Response
    {
        return $this->render('category/show.html.twig',['category'=>$category
        ]);
    }
}