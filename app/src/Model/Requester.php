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

    public function confirmInter($rep, $matricule, $id = 1) {
	$reponse = [
            "oui" => 1
    ];
	$confirm = $this->selectPompierByMatricule($matricule);
    $info = $this->getRoomInfoById($id);
	$count = $this->getInterById($id);
	if ($this->getInterByMatricule($matricule, $id) > 0) {
		return print json_encode([
			"error" => false,
			"message" => "Vous avez déjà envoyé votre demande pour cette intervention!",
			"color" => "#ff0000"
		]);
	} else if (!empty($confirm)) {
		$query = $this->pdo->prepare("UPDATE pompier SET disponibilite = :dp WHERE matricule = :mat");
		$query->bindParam(':dp', $reponse[$rep]);
		$query->bindParam(':mat', $matricule);
		$query->execute();
		if ($count >= $info[0]["nombre_requis"]) {
			return print json_encode([
				"error" => false,
				"message" => "Vous avez été mis comme disponible pour une prochaine intervention.",
				"color" => "#f29704"
			]);
		}
		return print json_encode([
			"error" => false,
			"message" => "OK",
			"color" => "#373737"
		]);
	} else {
		return print json_encode([
			"error" => true,
			"message" => "Not found",
			"color" => NULL
		]);
	}
}
	
    public function saveToken($token) {
		$query = $this->pdo->prepare("SELECT * FROM pompierstoken WHERE token = :token");
		$query->bindParam(":token", $token);
		$query->execute();
		$result = $query->fetch();
		if ($result == false) {
			$insert = $this->pdo->prepare("INSERT into pompierstoken(token) VALUES(:token)");
			$insert->bindParam(':token', $token);
			$insert->execute();
		}
    }

    public function selectAll() {
        $query = $this->pdo->query("SELECT * FROM pompier");
        $data = $query->fetchAll();
        return $data;
    }

    public function getAllRooms() {
        $query = $this->pdo->query("SELECT * FROM intervention");
        $data = $query->fetchAll();
        return $data;
    }

    public function getAllIntervention() {
        $query = $this->pdo->query("SELECT * FROM presence");
        $data = $query->fetchAll();
        return $data;
    }

    public function getAllHistory() {
        $query = $this->pdo->query("SELECT * FROM historique");
        $data = $query->fetchAll();
        return $data;
    }

    public function selectPompierByMatricule($matricule) {
        $query = $this->pdo->prepare("SELECT * FROM pompier WHERE matricule = :matricule");
        $query->bindParam(":matricule", $matricule);
        $query->execute();
        $data = $query->fetch();
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

    public function checkDetails($nom, $prenom, $matricule) {
        $query = $this->pdo->prepare("SELECT * FROM pompier WHERE nom = :nom && prenom = :prenom && matricule = :matricule");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":prenom", $prenom);
        $query->bindParam(":matricule", $matricule);
        $query->execute();
        $data = $query->fetch();
        return print !isset($data["nom"]) ? json_encode([
            "error" => true,
            "message" => "fail"
        ]) : json_encode([
            "error" => false,
            "message" => "ok"
        ]);
    }

    public function deletePompier($id) {
        $query = $this->pdo->prepare("DELETE FROM pompier where id = :id");
        $query->bindParam(":id", $id);
        $ret = $query->execute();
        return print $ret == false ? json_encode([
            "error" => true,
            "message" => "delete failed"
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
            $query->bindParam(':competence1', $data["competence1"], \PDO::PARAM_INT);
        if (isset($data["competence2"]))
            $query->bindParam(':competence2', $data["competence2"], \PDO::PARAM_INT);
        if (isset($data["competence3"]))
            $query->bindParam(':competence3', $data["competence3"], \PDO::PARAM_INT);
        if (isset($data["competence4"]))
            $query->bindParam(':competence4', $data["competence4"], \PDO::PARAM_INT);
        if (isset($data["competence5"]))
            $query->bindParam(':competence5', $data["competence5"], \PDO::PARAM_INT);
        $query->execute();
        print json_encode([
            "error" => false,
            "message" => "ok"
        ]);
    }

    public function addPompier($data) {
        $maxcompetence = 5;
        $request_part1 = "INSERT INTO pompier(matricule, nom, prenom";
        $request_part2 = ") VALUES(:matricule, :nom, :prenom";
        $request_part3 = ")";

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
        for ($i = 1; $i < ($maxcompetence + 1); $i++) {
            if (isset($data["competence$i"])) {
                $query->bindParam(":competence$i", $data["competence$i"]);
            }
        }
        $ret = $query->execute();
        return print $ret == false ? json_encode([
            "error" => true, 
            "message" => "fail"
        ]) : json_encode([
            "error" => false, 
            "message" => "ok"
        ]);
    }

    public function addRoom($nom, $places, $vehicule) {
        $request = "INSERT INTO intervention(nom_inter, vehicule, nombre_requis) VALUES(:nom_inter, :vehicule, :nombre_requis)";

        $query = $this->pdo->prepare($request);
        $query->bindParam(':nom_inter', $nom);
        $query->bindParam(':nombre_requis', $places);
        $query->bindParam(':vehicule', $vehicule);
        $ret = $query->execute();
    }

    public function insertHistory($pompier, $intervention) {
        if ($pompier["date_presence"] != NULL)
            $request = "INSERT INTO historique(nom, prenom, matricule, date_presence, date_intervention, date_reponse) VALUES(:nom, :prenom, :matricule, :date_presence, :date_intervention, :date_reponse)";
        else
            $request = "INSERT INTO historique(nom, prenom, matricule, date_intervention, date_reponse) VALUES(:nom, :prenom, :matricule, :date_intervention, :date_reponse)";

        $query = $this->pdo->prepare($request);
        $query->bindParam(':nom', $pompier["nom"]);
        $query->bindParam(':prenom', $pompier["prenom"]);
        $query->bindParam(':matricule', $pompier["matricule"]);
        if ($pompier["date_presence"] != NULL)
            $query->bindParam(':date_presence', $pompier["date_presence"]);
        $query->bindParam(':date_intervention', $intervention["heure_depard"]);
        $query->bindParam(':date_reponse', $pompier["date_reponse"]);
        $ret = $query->execute();
    }
        
    public function selectRoom($id) {
        $request = "SELECT * FROM intervention where id = :id";
        $query = $this->pdo->prepare($request);
        $query->bindParam(':id', $id);
        $query->execute();
        $data = $query->fetch();
        return $data;
    }
    
    public function setHistory($id) {

        $query = $this->pdo->prepare("SELECT * FROM presence WHERE id_intervention = :id_intervention");
        $query->bindParam(':id_intervention', $id);
        $query->execute();
        $data = $query->fetchAll();

        $inter = $this->selectRoom($id);

        
        foreach ($data as $element) {
            echo "inter => ";
            var_dump($inter);
            $this->insertHistory($element, $inter);
        }
        
        return $data;
    }

    public function deleteRoom($id) {
        $request = "DELETE FROM intervention where id = :id";

        $this->setHistory($id);
        $query = $this->pdo->prepare($request);
        $query->bindParam(':id', $id);
        $ret = $query->execute();
    }
    
    public function joinRoom($matricule) {
        $request = "INSERT INTO presence(id_pompier, matricule, nom, prenom) VALUES(:id_pompier, :matricule, :nom, :prenom)";

        $data = $this->selectPompierByMatricule($matricule);
        $query = $this->pdo->prepare($request);
        $query->bindParam(':id_pompier', $data["id"]);
        $query->bindParam(':matricule', $matricule);
        if (isset($data) && isset($data["nom"]))
            $query->bindParam(':nom', $data["nom"]);
        else
            $query->bindParam(':nom', "nom");
        if (isset($data) && isset($data["prenom"]))
            $query->bindParam(':prenom', $data["prenom"]);
        else
            $query->bindParam(':nom', "prenom");
        $ret = $query->execute();
    }

}
