<?php

$route = [
    'authentification' => [
        'connexion' => 'connexion',
        'inscription' => 'inscription',
        'deconnexion' => 'deconnexion',
    ],
    'gerant' => [
        'dashboard' => 'dashboard',
        'campagnes' => 'campagnes',
        'addEvenement' => 'addEvenement',
        'editEvenement' => 'editEvenement',
        'addSemaine' => 'addSemaine',
        'editSemaine' => 'editSemaine',
        'apprenants' => 'apprenants',
        'paiement' => 'paiement'
    ],
    
];

$controller = $_GET['controller'] ?? $_POST['controller'] ?? 'authentification';
$action = $_GET['action'] ?? $_POST['action'] ?? 'connexion';

$fonction = $route[$controller][$action];
if ($fonction) {
    require_once(dirname(__DIR__) . "/controllers/".$controller.".controller.php");
    $fonction();
} else {
    http_response_code(404);
    echo "Fonction introuvable";
}
