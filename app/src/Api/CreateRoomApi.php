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
        $data = $request->getParsedBody();
        if (isset($data["nom"]) && isset($data['places']) && isset($data["vehicule"])) {
            $nom = $data["nom"];
            $places = $data["places"];
            $vehicule = $data["vehicule"];
            $this->container["App\Model\Requester"]->addRoom($nom, $places, $vehicule);
        }
        return $response;
    }
 
}
