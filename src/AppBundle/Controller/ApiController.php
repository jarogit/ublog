<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends FOSRestController
{
    /**
     * @Rest\Get("/api/post")
     */
    public function listAction()
    {
        $restresult = $this->getDoctrine()->getRepository(Post::class)->findAll();
        if ($restresult === null) {
            return new View("no data", Response::HTTP_NOT_FOUND);
        }

        $view = $this->view($restresult, 200);
        $view->setContext((new Context)->addGroup('list'));

        return $view;
    }

    /**
     * @Rest\Get("/api/post/{id}")
     */
    public function oneAction(Post $post)
    {
        $post->incViews();
        $this->getDoctrine()->getManager()->flush();

        return $post;
    }
}
