<?php

function required($field, &$value, array &$errors){
    $value = isset($_POST[$field]) ? trim($_POST[$field]) : '';
    if (empty($value)) {
        $errors[] = "Le champ $field est requis.";
    }
}


function generateId(array $data): int{
    if (empty($data)) {
        return 1;
    }
    $lastElement = end($data);
    return $lastElement["id"] + 1;
}

function generateCode(string $prefix, array $data): string{
    $dernierId = 0;
    foreach ($data as $element) {
        if ($element["id"] > $dernierId) {
            $dernierId = $element["id"];
        }
    }
    $nouvelId = $dernierId + 1;
    if ($nouvelId < 10) {
        return $prefix . "00" . $nouvelId;
    }
    if ($nouvelId < 100) {
        return $prefix . "0" . $nouvelId;
    }
    return $prefix . $nouvelId;
}

function unicite(string $field, $value, array $data, array &$errors, string $message = "") {
    if (empty($value)) {
        return;
    }
    foreach ($data as $item) {
        if (isset($item[$field]) && strtolower($item[$field]) === strtolower($value)) {
            $errors[] = $message ?: "La valeur du champ $field existe déjà.";
            return;
        }
    }
}