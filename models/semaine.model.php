<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");

if (!isset($_SESSION["semaines"])) {
    $_SESSION["semaines"] = [
        [
            "id" => 1,
            "numero" => 1,
            "dateDebut" => "2026-06-13",
            "dateFin" => "2026-06-19",
            "montantDemande" => 100,
            "montantTotaleCotise" => 100,
            "nbreCotisation" => 1
        ]
    ];
}
$semaines = &$_SESSION["semaines"];

function saveSemaine(array $newSemaine): array{
    global $semaines;
    $newSemaine["id"] = generateId($semaines);
    $newSemaine["montantTotaleCotise"] = 0;
    $newSemaine["nbreCotisation"] = 0;
    $semaines[] = $newSemaine;
    return $newSemaine;
}

function listerSemaines(): array{
    global $semaines;
    return $semaines;
}

function rechercherSemaineParId($id): array|null{
    global $semaines;
    foreach ($semaines as $semaine) {
        if ($semaine["id"] == $id) {
            return $semaine;
        }
    }
    return null;
}

function modifierSemaine(int $id, array $updatedSemaine): bool{
    global $semaines;
    foreach ($semaines as &$semaine) {
        if ($semaine["id"] == $id) {
            $semaine["numero"] = $updatedSemaine["numero"];
            $semaine["dateDebut"] = $updatedSemaine["dateDebut"];
            $semaine["dateFin"] = $updatedSemaine["dateFin"];
            $semaine["montantDemande"] = $updatedSemaine["montantDemande"];
            return true;
        }
    }
    return false;
}