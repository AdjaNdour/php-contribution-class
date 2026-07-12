<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");
require_once(__DIR__ . "/apprenant.model.php");
require_once(__DIR__ . "/semaine.model.php");
require_once(__DIR__ . "/evenement.model.php");

if (!isset($_SESSION["paiements"])) {
    $_SESSION["paiements"] = [
        [
            "id" => 1,
            "date" => "2026-06-13",
            "heure" => "09:30",
            "montant" => 100,
            "idApprenant" => 1,
            "idSemaine" => 1,
            "idEvenement" => null
        ]
    ];
}
$paiements = &$_SESSION["paiements"];

function savePaiement(array $newPaiement): array{
    global $paiements;
    $newPaiement["id"] = generateId($paiements);
    $newPaiement["heure"] = date("H:i");
    $paiements[] = $newPaiement;

    // Ventilation: increase montantTotaleCotise and nbreCotisation in target week/event
    if (!empty($newPaiement["idSemaine"])) {
        $idSemaine = (int)$newPaiement["idSemaine"];
        if (isset($_SESSION["semaines"])) {
            foreach ($_SESSION["semaines"] as &$semaine) {
                if ($semaine["id"] == $idSemaine) {
                    $semaine["montantTotaleCotise"] += $newPaiement["montant"];
                    $semaine["nbreCotisation"] += 1;
                    break;
                }
            }
        }
    } elseif (!empty($newPaiement["idEvenement"])) {
        $idEvenement = (int)$newPaiement["idEvenement"];
        if (isset($_SESSION["evenements"])) {
            foreach ($_SESSION["evenements"] as &$evenement) {
                if ($evenement["id"] == $idEvenement) {
                    $evenement["montantTotaleCotise"] += $newPaiement["montant"];
                    $evenement["nbreCotisation"] += 1;
                    break;
                }
            }
        }
    }

    return $newPaiement;
}

function listerPaiements(): array{
    global $paiements;
    return $paiements;
}

function listerPaiementsDetails(): array {
    $paiements = listerPaiements();
    $result = [];
    foreach ($paiements as $p) {
        $apprenant = rechercherApprenantParId($p["idApprenant"]);
        $nomApprenant = "Inconnu";
        if ($apprenant) {
            $user = rechercheruserParId($apprenant["idUser"]);
            if ($user) {
                $nomApprenant = $user["prenom"] . " " . $user["nom"];
            }
        }

        $libelleCotisation = "N/A";
        if (!empty($p["idSemaine"])) {
            $sem = rechercherSemaineParId($p["idSemaine"]);
            if ($sem) {
                $libelleCotisation = "Semaine " . $sem["numero"];
            }
        } elseif (!empty($p["idEvenement"])) {
            $ev = rechercherEvenementParId($p["idEvenement"]);
            if ($ev) {
                $libelleCotisation = $ev["libelle"];
            }
        }

        $p["nomApprenant"] = $nomApprenant;
        $p["libelleCotisation"] = $libelleCotisation;
        $result[] = $p;
    }
    return array_reverse($result);
}
