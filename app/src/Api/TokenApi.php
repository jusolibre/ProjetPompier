<?php
namespace App\Api;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class TokenApi
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
        $data = $request->getBody();
        $json = json_decode($data, true);
        if (isset($json["token_id"])) {
            $this->container["App\Model\Requester"]->saveToken($json["token_id"]);
        }
        return $response;
    }
 
}