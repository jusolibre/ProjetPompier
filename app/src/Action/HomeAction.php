<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class HomeAction
{
    private $view;
    private $logger;
    private $container;

    public function __construct(Twig $view, LoggerInterface $logger, $c)
    {
        $this->container = $c;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        
        $this->view->render($response, 'home.twig', array(
            "root" => WEBROOT
        ));
        // $this->logger->info("Home page action dispatched");
        
        // $data = $this->container[\App\Model\Requester::class]->selectAll();
        
        // $data = $this->container[\App\Model\Requester::class]();
        

        
        return $response;
    }
}