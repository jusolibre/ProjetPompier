<?php
namespace App\Api;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class JoinRoomApi
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
        $data = $request->getParsedBody();
        if (isset($data["matricule"]) && isset($data["id_inter"])) {
            $this->container["App\Model\Requester"]->joinRoom($data["matricule"], $data["id_inter"]);
        }
        return $response;
    }
 
}
