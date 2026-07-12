<?php

require_once(dirname(__DIR__) . "/models/gerant.model.php");
require_once(dirname(__DIR__) . "/services/utils/validator.php");

$action = $_GET['action'];

switch ($action) {
    case 'dashboard':
        dashboard();
        break;
    default:
        echo "Action authentification introuvable";
        break;
}

function dashboard(){
    require_once(dirname(__DIR__) . "/views/gerant/dashboard.php");
}
