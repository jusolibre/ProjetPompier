<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class HistoriqueAction
{
    private $view;
    private $logger;
    private $container;
    
    public function __construct(Twig $view, LoggerInterface $logger, $c)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->container = $c;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $historique = $this->container[\App\Model\Requester::class]->getAllHistory();
        $this->view->render($response, 'historique.twig', array(
            "root" => WEBROOT,
            "history" => $historique
        ));
        return $response;
    }
}
