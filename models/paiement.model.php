<?php

require_once(dirname(__DIR__) . "/services/utils/validator.php");
require_once(__DIR__ . "/apprenant.model.php");
require_once(__DIR__ . "/semaine.model.php");
require_once(__DIR__ . "/evenement.model.php");

if (!isset($_SESSION["paiements"])) {
    $_SESSION["paiements"] = [
        [
            "id" => 1,
            "date" => "2026-06-13",
            "heure" => "09:30",
            "montant" => 100,
            "idApprenant" => 1,
            "idSemaine" => 1,
            "idEvenement" => null
        ]
    ];
}
$paiements = &$_SESSION["paiements"];

function savePaiement(array $newPaiement): array{
    global $paiements;
    $idApprenant = (int)$newPaiement["idApprenant"];
    $montantGlobal = (int)$newPaiement["montant"];

    // Ventilation automatique
    if ($newPaiement["idSemaine"] === null && $newPaiement["idEvenement"] === null && isset($newPaiement["automatique"]) && $newPaiement["automatique"] === true) {
        $semaines = &$_SESSION["semaines"];
        // Trier les semaines par numéro pour payer la plus ancienne d'abord
        usort($semaines, function($a, $b) {
            return $a["numero"] <=> $b["numero"];
        });

        $montantRestant = $montantGlobal;

        foreach ($semaines as &$semaine) {
            if ($montantRestant <= 0) {
                break;
            }

            // Calculer combien l'apprenant a déjà payé pour cette semaine
            $dejaPaye = 0;
            foreach ($paiements as $p) {
                if ($p["idApprenant"] == $idApprenant && $p["idSemaine"] == $semaine["id"]) {
                    $dejaPaye += $p["montant"];
                }
            }

            $du = $semaine["montantDemande"] - $dejaPaye;
            if ($du > 0) {
                $payer = min($du, $montantRestant);

                // Créer un sous-paiement ventilé pour cette semaine
                $subPaiement = [
                    "id" => generateId($paiements),
                    "date" => $newPaiement["date"],
                    "heure" => date("H:i"),
                    "montant" => $payer,
                    "idApprenant" => $idApprenant,
                    "idSemaine" => $semaine["id"],
                    "idEvenement" => null
                ];
                $paiements[] = $subPaiement;

                // Mettre à jour les statistiques de la semaine
                $semaine["montantTotaleCotise"] += $payer;
                if ($dejaPaye == 0) {
                    $semaine["nbreCotisation"] += 1;
                }

                $montantRestant -= $payer;
            }
        }

        // Ventiler sur les événements (cotisations ponctuelles) s'il reste un solde
        $evenements = &$_SESSION["evenements"];
        foreach ($evenements as &$evenement) {
            if ($montantRestant <= 0) {
                break;
            }

            // Calculer combien l'apprenant a déjà payé pour cet événement
            $dejaPaye = 0;
            foreach ($paiements as $p) {
                if ($p["idApprenant"] == $idApprenant && $p["idEvenement"] == $evenement["id"]) {
                    $dejaPaye += $p["montant"];
                }
            }

            $du = $evenement["montantDemande"] - $dejaPaye;
            if ($du > 0) {
                $payer = min($du, $montantRestant);

                // Créer un sous-paiement ventilé pour cet événement
                $subPaiement = [
                    "id" => generateId($paiements),
                    "date" => $newPaiement["date"],
                    "heure" => date("H:i"),
                    "montant" => $payer,
                    "idApprenant" => $idApprenant,
                    "idSemaine" => null,
                    "idEvenement" => $evenement["id"]
                ];
                $paiements[] = $subPaiement;

                // Mettre à jour les statistiques de l'événement
                $evenement["montantTotaleCotise"] += $payer;
                if ($dejaPaye == 0) {
                    $evenement["nbreCotisation"] += 1;
                }

                $montantRestant -= $payer;
            }
        }

        // S'il reste de l'argent après ventilation sur toutes les semaines et événements, on l'ajoute en crédit d'avance
        if ($montantRestant > 0) {
            $excessPaiement = [
                "id" => generateId($paiements),
                "date" => $newPaiement["date"],
                "heure" => date("H:i"),
                "montant" => $montantRestant,
                "idApprenant" => $idApprenant,
                "idSemaine" => null,
                "idEvenement" => null
            ];
            $paiements[] = $excessPaiement;
        }

        return $newPaiement;
    } else {
        // Ventilation manuelle
        $newPaiement["id"] = generateId($paiements);
        $newPaiement["heure"] = date("H:i");
        $paiements[] = $newPaiement;

        if (!empty($newPaiement["idSemaine"])) {
            $idSemaine = (int)$newPaiement["idSemaine"];
            if (isset($_SESSION["semaines"])) {
                foreach ($_SESSION["semaines"] as &$semaine) {
                    if ($semaine["id"] == $idSemaine) {
                        $semaine["montantTotaleCotise"] += $newPaiement["montant"];
                        $semaine["nbreCotisation"] += 1;
                        break;
                    }
                }
            }
        } elseif (!empty($newPaiement["idEvenement"])) {
            $idEvenement = (int)$newPaiement["idEvenement"];
            if (isset($_SESSION["evenements"])) {
                foreach ($_SESSION["evenements"] as &$evenement) {
                    if ($evenement["id"] == $idEvenement) {
                        $evenement["montantTotaleCotise"] += $newPaiement["montant"];
                        $evenement["nbreCotisation"] += 1;
                        break;
                    }
                }
            }
        }
        return $newPaiement;
    }
}

function listerPaiements(): array{
    global $paiements;
    return $paiements;
}

function listerPaiementsDetails(): array {
    $paiements = listerPaiements();
    $result = [];
    foreach ($paiements as $p) {
        $apprenant = rechercherApprenantParId($p["idApprenant"]);
        $nomApprenant = "Inconnu";
        if ($apprenant) {
            $user = rechercheruserParId($apprenant["idUser"]);
            if ($user) {
                $nomApprenant = $user["prenom"] . " " . $user["nom"];
            }
        }

        $libelleCotisation = "N/A";
        if (!empty($p["idSemaine"])) {
            $sem = rechercherSemaineParId($p["idSemaine"]);
            if ($sem) {
                $libelleCotisation = "Semaine " . $sem["numero"];
            }
        } elseif (!empty($p["idEvenement"])) {
            $ev = rechercherEvenementParId($p["idEvenement"]);
            if ($ev) {
                $libelleCotisation = $ev["libelle"];
            }
        }

        $p["nomApprenant"] = $nomApprenant;
        $p["libelleCotisation"] = $libelleCotisation;
        $result[] = $p;
    }
    return array_reverse($result);
}
