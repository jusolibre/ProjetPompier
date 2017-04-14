<?php
namespace App\Api;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class CreateRoomApi
{
    private $view;
    private $logger;
    private $container;
    private $rooms;

    public function __construct(Twig $view, LoggerInterface $logger, $container)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $request->getBody();
        $json = json_decode($data, true);
        if ((isset($json["nom"])) && (isset($json["places"])) && (isset($json["vehicule"]))) {
            $nom = $json["nom"];
            $places = $json["places"];
            $vehicule = $json["vehicule"];
            $this->container["App\Model\Requester"]->addRoom($nom, $places, $vehicule);
        }
        return $response;
    }
 
}
