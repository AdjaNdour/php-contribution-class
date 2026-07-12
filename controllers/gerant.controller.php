<?php

require_once(dirname(__DIR__) . "/models/gerant.model.php");
require_once(dirname(__DIR__) . "/models/semaine.model.php");
require_once(dirname(__DIR__) . "/models/evenement.model.php");
require_once(dirname(__DIR__) . "/models/apprenant.model.php");
require_once(dirname(__DIR__) . "/services/utils/validator.php");

$action = $_GET['action'] ?? 'dashboard';

function dashboard(){
    global $action;
    $semaines = listerSemaines();
    $evenements = listerEvenements();
    $totalApprenants = count(listerApprenants());
    require_once(dirname(__DIR__) . "/views/gerant/dashboard.php");
}

function campagnes(){
    global $action;
    $semaines = listerSemaines();
    $evenements = listerEvenements();
    $totalApprenants = count(listerApprenants());
    require_once(dirname(__DIR__) . "/views/gerant/campagnes.php");
}

function addEvenement(){
    global $action;
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $libelle = trim($_POST["libelle"] ?? '');
        $dateDebut = trim($_POST["dateDebut"] ?? '');
        $dateFin = trim($_POST["dateFin"] ?? '');
        $type = trim($_POST["type"] ?? '');
        $montantDemande = (int)($_POST["montantDemande"] ?? 0);

        required('libelle', $libelle, $errors);
        required('dateDebut', $dateDebut, $errors);
        required('dateFin', $dateFin, $errors);
        required('type', $type, $errors);

        $evenements = listerEvenements();
        unicite('libelle',$libelle,$evenements,$errors,"Le libellé $libelle existe déjà.");
        unicite('dateDebut',$dateDebut,$evenements,$errors,"La date de début $dateDebut est déjà utilisée.");
        unicite('dateFin',$dateFin,$evenements,$errors,"La date de fin $dateFin est déjà utilisée.");
      
        if ($montantDemande <= 0) {
            $errors[] = "Le montant demandé doit être supérieur à 0.";
        }

        if (empty($errors)) {
            $newEvent = [
                "libelle" => $libelle,
                "dateDebut" => $dateDebut,
                "dateFin" => $dateFin,
                "type" => $type,
                "montantDemande" => $montantDemande
            ];
            saveEvenement($newEvent);
            header("Location: index.php?controller=gerant&action=campagnes");
            exit;
        }
    }
    require_once(dirname(__DIR__) . "/views/gerant/formEvenement.php");
}

function editEvenement(){
    global $action;
    $id = (int)($_GET["id"] ?? 0);
    $evenement = rechercherEvenementParId($id);
    if (!$evenement) {
        die("Événement introuvable");
    }

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $libelle = trim($_POST["libelle"] ?? '');
        $dateDebut = trim($_POST["dateDebut"] ?? '');
        $dateFin = trim($_POST["dateFin"] ?? '');
        $type = trim($_POST["type"] ?? '');
        $montantDemande = (int)($_POST["montantDemande"] ?? 0);

        required('libelle', $libelle, $errors);
        required('dateDebut', $dateDebut, $errors);
        required('dateFin', $dateFin, $errors);
        required('type', $type, $errors);

        $evenements = listerEvenements();

        if ($libelle !== $evenement["libelle"]) {
            unicite('libelle',$libelle,$evenements,$errors,"Le libellé $libelle existe déjà.");
        }

        if ($dateDebut !== $evenement["dateDebut"]) {
            unicite('dateDebut',$dateDebut,$evenements,$errors,"La date de début $dateDebut est déjà utilisée.");
        }

        if ($dateFin !== $evenement["dateFin"]) {
            unicite('dateFin',$dateFin,$evenements,$errors,"La date de fin $dateFin est déjà utilisée.");
        }

        if ($montantDemande <= 0) {
            $errors[] = "Le montant demandé doit être supérieur à 0.";
        }

        if (empty($errors)) {
            $updatedEvent = [
                "libelle" => $libelle,
                "dateDebut" => $dateDebut,
                "dateFin" => $dateFin,
                "type" => $type,
                "montantDemande" => $montantDemande
            ];
            modifierEvenement($id, $updatedEvent);
            header("Location: index.php?controller=gerant&action=campagnes");
            exit;
        }
    }
    require_once(dirname(__DIR__) . "/views/gerant/editEvenement.php");
}

function addSemaine(){
    global $action;
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero = (int)($_POST["numero"] ?? 0);
        $dateDebut = trim($_POST["dateDebut"] ?? '');
        $dateFin = trim($_POST["dateFin"] ?? '');
        $montantDemande = (int)($_POST["montantDemande"] ?? 0);

        if ($numero <= 0) {
            $errors[] = "Le numéro de semaine est requis et doit être supérieur à 0.";
        }
        required('dateDebut', $dateDebut, $errors);
        required('dateFin', $dateFin, $errors);
        if ($montantDemande <= 0) {
            $errors[] = "Le montant demandé doit être supérieur à 0.";
        }
        $semaines = listerSemaines();
        unicite('numero', $numero, $semaines, $errors, "Le numéro de semaine $numero est déjà configuré.");
        unicite('dateDebut', $dateDebut, $semaines, $errors, "Le numéro de semaine $dateDebut est déjà configuré.");
        unicite('dateFin', $dateFin, $semaines, $errors, "La date de Fin de semaine $dateFin est déjà configuré.");

        if (empty($errors)) {
            $newSemaine = [
                "numero" => $numero,
                "dateDebut" => $dateDebut,
                "dateFin" => $dateFin,
                "montantDemande" => $montantDemande
            ];
            saveSemaine($newSemaine);
            header("Location: index.php?controller=gerant&action=campagnes");
            exit;
        }
    }
    require_once(dirname(__DIR__) . "/views/gerant/formSemaine.php");
}

function editSemaine(){
    global $action;
    $id = (int)($_GET["id"] ?? 0);
    $semaine = rechercherSemaineParId($id);
    if (!$semaine) {
        die("Semaine introuvable");
    }

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero = (int)($_POST["numero"] ?? 0);
        $dateDebut = trim($_POST["dateDebut"] ?? '');
        $dateFin = trim($_POST["dateFin"] ?? '');
        $montantDemande = (int)($_POST["montantDemande"] ?? 0);

        if ($numero <= 0) {
            $errors[] = "Le numéro de semaine est requis et doit être supérieur à 0.";
        }
        required('dateDebut', $dateDebut, $errors);
        required('dateFin', $dateFin, $errors);
        $semaines = listerSemaines();

        if ($numero !== (int)$semaine["numero"]) {
            unicite('numero',$numero,$semaines,$errors,"Le numéro de semaine $numero est déjà configuré.");
        }

        if ($dateDebut !== $semaine["dateDebut"]) {
            unicite('dateDebut',$dateDebut,$semaines,$errors,"La date de début $dateDebut est déjà configurée.");
        }

        if ($dateFin !== $semaine["dateFin"]) {
            unicite('dateFin',$dateFin,$semaines,$errors,"La date de fin $dateFin est déjà configurée.");
        }
        
        if ($montantDemande <= 0) {
            $errors[] = "Le montant demandé doit être supérieur à 0.";
        }
        if ($numero !== (int)$semaine["numero"]) {
            $semaines = listerSemaines();
            unicite('numero', $numero, $semaines, $errors, "Le numéro de semaine $numero est déjà configuré.");
        }

        if (empty($errors)) {
            $updatedSemaine = [
                "numero" => $numero,
                "dateDebut" => $dateDebut,
                "dateFin" => $dateFin,
                "montantDemande" => $montantDemande
            ];
            modifierSemaine($id, $updatedSemaine);
            header("Location: index.php?controller=gerant&action=campagnes");
            exit;
        }
    }
    require_once(dirname(__DIR__) . "/views/gerant/editSemaine.php");
}

function apprenants(){
    global $action;
    require_once(dirname(__DIR__) . "/views/gerant/apprenants.php");
}

function paiement(){
    global $action;
    require_once(dirname(__DIR__) . "/views/gerant/paiement.php");
}
