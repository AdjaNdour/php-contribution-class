<?php

require_once(dirname(__DIR__) . "/models/user.model.php");
require_once(dirname(__DIR__) . "/models/apprenant.model.php");
require_once(dirname(__DIR__) . "/models/coach.model.php");
require_once(dirname(__DIR__) . "/models/gerant.model.php");
require_once(dirname(__DIR__) . "/services/utils/validator.php");


function connexion(){
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"] ?? '');
        $password = trim($_POST["password"] ?? '');
        required('email', $email, $errors);
        required('password', $password, $errors);

        if (empty($errors)) {
            $user = verifierConnexion($email, $password);
            if ($user) {
                session_start();
                $_SESSION["user"] = $user;
                switch ($user["role"]) {
                    case "GERANT":
                        header("Location: index.php?controller=gerant&action=dashboard");
                        exit;

                    case "APPRENANT":
                        header("Location: index.php?controller=apprenant&action=dashboard");
                        exit;

                    case "COACH":
                        header("Location: index.php?controller=coach&action=dashboard");
                        exit;
                }
            } else {
                $errors["connexion"] = "Email ou mot de passe incorrect.";
            }
        }
    }
    require_once(dirname(__DIR__) . "/views/authentification/connexion.php");
}

function deconnexion(){
    session_destroy();
    header("Location: index.php?controller=authentification&action=connexion");
    exit;
}

function inscription(){
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nom = trim($_POST["nom"] ?? '');
        $prenom = trim($_POST["prenom"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $login = trim($_POST["login"] ?? '');
        $password = trim($_POST["password"] ?? '');
        $role = $_POST["role"] ?? '';

        required('nom', $nom, $errors);
        required('prenom', $prenom, $errors);
        required('email', $email, $errors);
        required('login', $login, $errors);
        required('password', $password, $errors);
        required('role', $role, $errors);

        if (empty($errors)) {
            $users = listerUsers();
            unicite('email', $email, $users, $errors, "Cette adresse email est déjà utilisée.");
            unicite('login', $login, $users, $errors, "Ce login est déjà utilisé.");
        }

        if (empty($errors)) {
            $newUser = [
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "login" => $login,
                "password" => $password,
                "role" => $role
            ];
          
            $newUserCreated= saveUser($newUser);

            $newEntity=[
                "idUser" => $newUserCreated['id']
            ];

            switch ($newUserCreated["role"]) {
                case "GERANT":
                    saveGerant($newEntity);
                    break;
                case "APPRENANT":
                    saveApprenant($newEntity);
                    break;
                case "COACH":
                    saveCoach($newEntity);
                    break;
            }
            header("Location: index.php?controller=authentification&action=connexion");
            exit;
        }
    }
    require_once(dirname(__DIR__) . "/views/authentification/inscription.php");
}