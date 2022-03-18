<?php

namespace App\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(){
        return $this->render('site/index.html.twig');
    }

    /**
     * @Route("/categories", name="categories", methods={"GET"})
     */
    public function categories(CategoryRepository $CategoryRepository): Response{
        return $this->render('site/categories.html.twig', [
            'categories' => $CategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/category/{slug}", name="category", methods={"GET"})
     */
    public function showcategory(string $slug, ProductRepository $ProductRepository): Response{
        return $this->render('site/category.html.twig', [
            'producten' => $ProductRepository->findBy(array('Category' => $slug))
        ]);
    }

    /**
     * @Route("/product/{slug}", name="cat-producten", )
     */
    public function showproduct(string $slug, ProductRepository $ProductRepository, ReviewRepository $ReviewRepository): Response{
        return $this->render('site/product.html.twig', [
            'product' => $ProductRepository->findOneBy(array('id' => $slug))
        ]);
    }
}
