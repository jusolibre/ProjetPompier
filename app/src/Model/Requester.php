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
        return $this->pdo;
    }

    public function selectAll() {
        $query = $this->pdo->query("SELECT * FROM pompier");
        $data = $query->fetchAll();
        return $data;
    }

    public function selectPompierFromName($nom, $prenom) {
        $query = $this->pdo->prepare("SELECT * FROM pompier WHERE nom = :nom && prenom = :prenom");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":prenom", $prenom);
        $query->execute();
        $data = $query->fetch();
        return $data;
    }

    public function deletePompier($nom, $prenom) {
        $search = $this->selectPompierFromName($nom, $prenom);
        if (!is_array($search)) {
            return print json_encode([
                "error" => true,
                "message" => "fail"
            ]);
        }
        $query = $this->pdo->prepare("DELETE FROM pompier where nom = :nom and prenom = :prenom");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":prenom", $prenom);
        $ret = $query->execute();
        return print $ret == false ? json_encode([
            "error" => true,
            "message" => "fail"
        ]) : json_encode([
            "error" => false,
            "message" => "ok"
        ]);
    }

    public function updatePompier($matricule, $data) {
        $request_part1 = "UPDATE pompier SET ";
        $request_part2 = " WHERE matricule = :matricule";
        $i = 0;
        
        if (isset($data["competence1"])) {
            $request_part1 = $request_part1 . (($i == 0) ? "" : ", ") . "competence1 = :competence1";
            $i++;
        }
        if (isset($data["competence2"])) {
            $request_part1 = $request_part1 . (($i == 0) ? "" : ", ") . "competence2 = :competence2";
            $i++;
        }
        if (isset($data["competence3"])) {
            $request_part1 = $request_part1 . (($i == 0) ? "" : ", ") . "competence3 = :competence3";
            $i++;
        }
        if (isset($data["competence4"])) {
            $request_part1 = $request_part1 . (($i == 0) ? "" : ", ") . "competence4 = :competence4";
            $i++;
        }
        if (isset($data["competence5"])) {
            $request_part1 = $request_part1 . (($i == 0) ? "" : ", ") . "competence5 = :competence5";
            $i++;
        }
        
        $request = $request_part1 . $request_part2;
        $query = $this->pdo->prepare($request);
        $query->bindParam(':matricule', $matricule);
        if (isset($data["competence1"]))
            $query->bindParam(':competence1', $data["competence1"]);
        if (isset($data["competence2"]))
            $query->bindParam(':competence2', $data["competence2"]);
        if (isset($data["competence3"]))
            $query->bindParam(':competence3', $data["competence3"]);
        if (isset($data["competence4"]))
            $query->bindParam(':competence4', $data["competence4"]);
        if (isset($data["competence5"]))
            $query->bindParam(':competence5', $data["competence5"]);
        $query->execute();
    }

    public function addPompier($data) {
        $maxcompetence = 5;
        $request_part1 = "INSERT INTO pompier(matricule, nom, prenom";
        $request_part2 = ") VALUES(:matricule, :nom, :prenom";
        $request_part3 = ")";

        /*if (isset($data["competence1"])) {
            $request_part1 = $request_part1 . ", competence1";
            $request_part2 = $request_part2 . ", :competence1";
        }
        if (isset($data["competence2"])) {
            $request_part1 = $request_part1 . ", competence2";
            $request_part2 = $request_part2 . ", :competence2";
        }
        if (isset($data["competence3"])) {
            $request_part1 = $request_part1 . ", competence3";
            $request_part2 = $request_part2 . ", :competence3";
        }
        if (isset($data["competence4"])) {
            $request_part1 = $request_part1 . ", competence4";
            $request_part2 = $request_part2 . ", :competence4";
        }
        if (isset($data["competence5"])) {
            $request_part1 = $request_part1 . ", competence5";
            $request_part2 = $request_part2 . ", :competence5";
        }*/
        for ($i = 1; $i < ($maxcompetence + 1); $i++) {
            if (isset($data["competence$i"])) {
                $request_part1 = $request_part1 . ", competence$i";
                $request_part2 = $request_part2 . ", :competence$i";
            }
        }
        $request = $request_part1 . $request_part2 . $request_part3;
        $query = $this->pdo->prepare($request);
        $query->bindParam(':nom', $data["nom"]);
        $query->bindParam(':prenom', $data["prenom"]);
        $query->bindParam(':matricule', $data["matricule"]);
        /*if (isset($data["competence1"])) {
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
        }*/
        for ($i = 1; $i < ($maxcompetence + 1); $i++) {
            if (isset($data["competence$i"])) {
                $query->bindParam(":competence$i", $data["competence$i"]);
            }
        }
        $ret = $query->execute();
        return print $ret == false ? json_encode(["error" => true, "message" => "fail"]) : json_encode(["error" => false, "message" => "ok"]);
    }
}