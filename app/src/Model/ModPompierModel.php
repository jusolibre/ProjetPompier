<?php
namespace App\Model;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class ModPompierModel
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
        if ((isset($json["prenom"])) && (isset($json["nom"]))) {
            $ret = $this->controller[\App\Model\Requester::class]->selectPompierFromName($json["nom"], $json["prenom"]);
            if ($ret == NULL) {
                print json_encode([
                    "error" => true,
                    "message" => "get matricule error"
                ]);
                return ;
            }
            $matricule = $ret["matricule"];
            $ret = $this->controller[\App\Model\Requester::class]->updatePompier($matricule, $json);
        }
    }

}
