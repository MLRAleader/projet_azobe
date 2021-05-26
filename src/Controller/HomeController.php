<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArticleRepository $repoArticle): Response
    {
        $articles = $repoArticle->findAll();

      
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
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
}
