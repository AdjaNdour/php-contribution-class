<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [
        [
            "id" => 1,
            "nom" => "Ndour",
            "prenom" => "Adja",
            "email" => "adja@gmail.com",
            "login" => "adja",
            "password" => "adja",
            "role" => "GERANT"
        ],
        [
            "id" => 2,
            "nom" => "Diop",
            "prenom" => "Kiki",
            "email" => "kiki@gmail.com",
            "login" => "kiki",
            "password" => "kiki",
            "role" => "APPRENANT"
        ],
        [
            "id" => 3,
            "nom" => "Fall",
            "prenom" => "Aly",
            "email" => "aly@gmail.com",
            "login" => "aly",
            "password" => "aly",
            "role" => "COACH"
        ]
    ];
}
$users = &$_SESSION["users"];

function saveUser(array $newUser):array{
    global $users;
    $newUser["id"] = generateId($users);
    $users[] = $newUser;
    return $newUser;
}

function listerUsers():array{
    global $users;
    return $users;
}


function rechercheruserParId($id):array|null{
    global $users;
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function verifierConnexion($email, $password): array|false{
    global $users;
    foreach ($users as $user) {
        if ($user["email"] === $email && $user["password"] === $password) {
            return $user;
        }
    }
    return false;
}

