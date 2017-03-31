<?php
namespace App\Model;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class Requester
{
    private $view;
    private $logger;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke()
    {        
        return($this->pdo);
    }

    public function test() {
        return ("test");
    }

    public function selectAll() {
        $query = $this->pdo->query("SELECT * FROM pompier");
        $data = $query->fetchAll();
        return ($data);
    }
}