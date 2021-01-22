<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog_list")
     */
    public  function list()
    {
        return new JsonResponse("helloo");
    }

    /**
     * @Route("/{id}", name="blog_by_id")
     */
    public  function post($id)
    {

    }

    /**
     * @Route("/{slug}", name="blog_by_slug")
     */
    public  function postBySlog($slug)
    {

    }
}