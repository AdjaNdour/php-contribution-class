<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");

if (!isset($_SESSION["evenements"])) {
    $_SESSION["evenements"] = [
        [
            "id" => 1,
            "libelle" => "Anniversaire Juillet",
            "dateDebut" => "2026-07-25",
            "dateFin" => "2026-07-31",
            "type" => "ANNIVERSAIRE",
            "montantDemande" => 1000,
            "montantTotaleCotise" => 25000,
            "nbreCotisation" => 25
        ]
    ];
}
$evenements = &$_SESSION["evenements"];

function saveEvenement(array $newEvent): array{
    global $evenements;
    $newEvent["id"] = generateId($evenements);
    $newEvent["montantTotaleCotise"] = 0;
    $newEvent["nbreCotisation"] = 0;
    $evenements[] = $newEvent;
    return $newEvent;
}

function listerEvenements(): array{
    global $evenements;
    return $evenements;
}

function rechercherEvenementParId($id): array|null{
    global $evenements;
    foreach ($evenements as $evenement) {
        if ($evenement["id"] == $id) {
            return $evenement;
        }
    }
    return null;
}

function modifierEvenement(int $id, array $updatedEvent): bool{
    global $evenements;
    foreach ($evenements as &$evenement) {
        if ($evenement["id"] == $id) {
            $evenement["libelle"] = $updatedEvent["libelle"];
            $evenement["dateDebut"] = $updatedEvent["dateDebut"];
            $evenement["dateFin"] = $updatedEvent["dateFin"];
            $evenement["type"] = $updatedEvent["type"];
            $evenement["montantDemande"] = $updatedEvent["montantDemande"];
            return true;
        }
    }
    return false;
}