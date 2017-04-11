<?php
namespace App\Model;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class DeletePompierModel
{
    private $view;
    private $logger;
    private $controller;

    public function __construct(Twig $view, LoggerInterface $logger, $controller)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->controller = $controller;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $request->getBody();
        $json = json_decode($data, true);
        if ((isset($json["nom"]) && (isset($json["prenom"])))) {
            $action = $this->controller[\App\Model\Requester::class]->deletePompier($json["nom"], $json["prenom"]);
        }
    }
}