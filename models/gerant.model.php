<?php

if (!isset($_SESSION["gerants"])) {
    $_SESSION["gerants"] = [
        [
            "id" => 1,
            "idUser" => 1
        ]
    ];
}
$gerants = &$_SESSION["gerants"];


function saveGerant(array $newgerant): void{
    global $gerants;
    $newgerant["id"] = generateId($gerants);
    $gerants[] = $newgerant;
}

function listerGerants(): array{
    global $gerants;
    return $gerants;
}

function rechercherGerantParId($id): array|null{
    global $gerants;
    foreach ($gerants as $gerant) {
        if ($gerant["id"] == $id) {
            return $gerant;
        }
    }
    return null;
}