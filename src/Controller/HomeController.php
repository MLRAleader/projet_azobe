<?php

namespace App\Controller;

use App\Entity\Appel;
use App\Entity\AppelCategory;
use App\Entity\Article;
use App\Repository\AppelCategoryRepository;
use App\Repository\AppelRepository;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArticleRepository $repoArticle, AppelRepository $repoAppel, AppelCategoryRepository $repoCatAppel): Response
    {
        $articles = $repoArticle->findAll();
        $appels = $repoAppel->findAll();
        $category_appels = $repoCatAppel->findAll();

      
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
            'appels'   => $appels,
            'category_appels'=> $category_appels
        ]);
    }

    /**
     * @Route("article/{slug}", name="article_details")
     */
    public function show(?Article $article): Response{
        if(!$article){
            return $this->redirectToRoute('home');
        }

        return $this->render("home/single_article.html.twig", [
            'article'=>$article
        ]);
    }

    /**
     * @Route("appel/{slug}", name="appel_detail")
     */
    public function appel_show(?Appel $appel): Response
    {
        if (!$appel) {
            return $this->redirectToRoute('home');
        }

        return $this->render("home/single_appel.html.twig", [
            'appel' => $appel
        ]);
    }
}
