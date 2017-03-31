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

    public function updateSkill($matricule, $skillName, $skillValue) {
        $request = "UPDATE pompier SET " . $skillName . "= :skill WHERE matricule = :matricule";
        
        $query = $this->pdo->prepare($request);
        $query->bindParam(':skill', $skillValue);
        $query->bindParam(':matricule', $matricule);
        $data = $query->execute();
    }

    public function addPompier($data) {
        $request_part1 = "INSERT INTO pompier(matricule, nom, prenom";
        $request_part2 = ") VALUES(:matricule, :nom, :prenom";
        $request_part3 = ")";

        if (isset($data["competence1"])) {
            $request_part1 = $request_part1 . ", competence1";
            $request_part1 = $request_part1 . ", :competence1";
        }
        if (isset($data["competence2"])) {
            $request_part1 = $request_part1 . ", competence2";
            $request_part1 = $request_part1 . ", :competence2";
        }
        if (isset($data["competence3"])) {
            $request_part1 = $request_part1 . ", competence3";
            $request_part1 = $request_part1 . ", :competence3";
        }
        if (isset($data["competence4"])) {
            $request_part1 = $request_part1 . ", competence4";
            $request_part1 = $request_part1 . ", :competence4";
        }
        if (isset($data["competence5"])) {
            $request_part1 = $request_part1 . ", competence5";
            $request_part1 = $request_part1 . ", :competence5";
        }
        $request = $request_part1 . $request_part2 . $request_part3;
        $query = $this->pdo->prepare($request);
        $query->bindParam(':skill', $skillValue);
        $query->bindParam(':matricule', $matricule);
        if (isset($data["competence1"])) {
            $query->bindParam(':competence1', $data["competence1"]);
        }        
        if (isset($data["competence2"])) {
            $query->bindParam(':competence2', $data["competence2"]);
        }        
        if (isset($data["competence3"])) {
            $query->bindParam(':competence3', $data["competence3"]);
        }        
        if (isset($data["competence4"])) {
            $query->bindParam(':competence4', $data["competence4"]);
        }        
        if (isset($data["competence5"])) {
            $query->bindParam(':competence5', $data["competence5"]);
        }        
        $data = $query->execute();
    }
}