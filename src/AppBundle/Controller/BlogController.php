<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $allPosts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        $paginator = $this->get('knp_paginator');
        $posts = $paginator->paginate(
            $allPosts,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('blog/index.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/post/{id}", name="app_post_show")
     */
    public function showAction(Post $post)
    {
        $post->incViews();
        $this->getDoctrine()->getManager()->flush();

        return $this->render('blog/details.html.twig', ['post' => $post]);
    }
}
