<?php
namespace App\Action;

use App\Entity\Blog;
use Doctrine\ORM\EntityManager;
use Slim\Router;
use Slim\Views\Twig;


final class BlogAction
{
    private $router;
    private $view;
    private $em;

    public function __construct(Router $router, Twig $view, EntityManager $em)
    {
        $this->router = $router;
        $this->view = $view;
        $this->em = $em;
    }
    
    /**
     * Index controller
     *
     * Called in route GET /
     */
    public function index($request, $response, $args)
    {
        $blogs_lookup = $this->em->getRepository('App\Entity\Blog')->findBy(
            array(),
            array('date_added' => 'DESC')
        );
        
        return $this->view->render($response, 'blog/index.html.twig', array(
            "blogs" => $blogs_lookup,
        ));
    }

    /**
     * Get controller
     *
     * Called in route GET /
     */
    public function get($request, $response, $args)
    {
        $blog_lookup = $this->em->getRepository('App\Entity\Blog')->findBy(
            array("id" => $args["id"]),
            array('date_added' => 'DESC')
        );

        if(sizeof($blog_lookup) >= 1)
        {
            return $this->view->render($response, 'blog/item.html.twig', array(
                "post" => $blog_lookup[0],
            ));
        }
        else
        {
            return $response->withStatus(404);
        }
    }

    /**
     * Create controller
     *
     * Called in route PUT /
     */
    public function create($request, $response, $args)
    {
        $post = $request->getParsedBody();

        $blog = new Blog();
        $blog->setTitle($post["create_title"]);
        $blog->setContent($post["create_content"]);
        $this->em->persist($blog);
        $this->em->flush();

        return $response->withRedirect($this->router->pathFor("blog_index"));
    }
}