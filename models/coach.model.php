<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");

if (!isset($_SESSION["coachs"])) {
    $_SESSION["coachs"] = [
        [
            "id" => 1,
            "idUser" => 3
        ]
    ];
}
$coachs = &$_SESSION["coachs"];


function saveCoach(array $newcoach): void{
    global $coachs;
    $newcoach["id"] = generateId($coachs);
    $coachs[] = $newcoach;
}

function listerCoachs(): array{
    global $coachs;
    return $coachs;
}

function rechercherCoachParId($id): array|null{
    global $coachs;
    foreach ($coachs as $coach) {
        if ($coach["id"] == $id) {
            return $coach;
        }
    }
    return null;
}