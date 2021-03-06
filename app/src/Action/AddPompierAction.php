<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class AddPompierAction
{
    private $view;
    private $logger;
    private $container;

    public function __construct(Twig $view, LoggerInterface $logger, $container)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $pompiers = $this->container[\App\Model\Requester::class]->selectAll();
        
        $this->view->render($response, 'addPompier.twig', array(
            "root" => WEBROOT,
            "pompiers" => $pompiers
        ));

        return $response;
    }

}
