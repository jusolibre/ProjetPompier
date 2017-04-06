<?php
namespace App\Model;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class ModPompierAction
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
        $data = $request->getParsedBody();
        if (isset($data["prenom"]) && isset($data["nom"])) {
            $ret = $this->controller[\App\Model\Requester::class]->selectPompierFromName($data["nom"], $data["prenom"]);
            $matricule = $ret["matricule"];
            $ret = $this->controller[\App\Model\Requester::class]->updatePompier($matricule, $data);
            var_dump($data);
        }
    }

}
