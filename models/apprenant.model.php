<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");

if (!isset($_SESSION["apprenants"])) {
    $_SESSION["apprenants"] = [
        [
            "id" => 1,
            "matricule" => "APR001",
            "idUser" => 1
        ],
        [
            "id" => 2,
            "matricule" => "APR002",
            "idUser" => 2
        ]
    ];
}
$apprenants = &$_SESSION["apprenants"];

function saveApprenant(array $newApprenant): void{
    global $apprenants;
    $newApprenant["id"] = generateId($apprenants);
    $newApprenant["matricule"] = generateCode("APPR", $apprenants);
    $apprenants[] = $newApprenant;
}

function listerApprenants(): array{
    global $apprenants;
    return $apprenants;
}

function rechercherApprenantParId($id): array|null{
    global $apprenants;
    foreach ($apprenants as $apprenant) {
        if ($apprenant["id"] == $id) {
            return $apprenant;
        }
    }
    return null;
}