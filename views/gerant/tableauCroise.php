<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Tableau Croisé — Contribution Class</title>
<link rel="stylesheet" href="assets/css/output.css">
</head>
<body class="font-body">
<div class="min-h-screen flex bg-background">

    <?php
        require_once(dirname(__DIR__)."/layout/nav-gerant.php");
    ?>

  <!-- Main -->
  <div class="flex-1 flex flex-col min-w-0">

    <?php
        require_once(dirname(__DIR__)."/layout/topbar.php");
    ?>

    <main class="flex-1 overflow-y-auto p-6 space-y-6">
      
      <!-- Crossed Dashboard Matrix Card -->
      <div class="bg-surface rounded-xl border border-gray-100 p-6 max-w-full">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
          <div>
            <h1 class="font-display font-semibold text-lg text-text">Tableau de bord croisé</h1>
            <p class="text-xs text-text-muted mt-1">Vue d'ensemble de l'état des cotisations pour chaque apprenant</p>
          </div>
          
          <!-- Legend of Badges -->
          <div class="flex flex-wrap gap-3 mt-4 md:mt-0 text-xs">
            <div class="flex items-center gap-1.5">
              <span class="inline-flex w-3.5 h-3.5 bg-green-100 border border-green-200 rounded-full"></span>
              <span class="text-text-muted font-medium">Soldé (Entièrement payé)</span>
            </div>
            <div class="flex items-center gap-1.5">
              <span class="inline-flex w-3.5 h-3.5 bg-yellow-100 border border-yellow-200 rounded-full"></span>
              <span class="text-text-muted font-medium">Partiel (Paiement partiel)</span>
            </div>
            <div class="flex items-center gap-1.5">
              <span class="inline-flex w-3.5 h-3.5 bg-red-100 border border-red-200 rounded-full"></span>
              <span class="text-text-muted font-medium">Dû (Non payé)</span>
            </div>
          </div>
        </div>

        <div class="overflow-x-auto border border-gray-100 rounded-xl">
          <table class="w-full text-sm border-collapse min-w-[800px]">
            <thead>
              <tr class="text-left text-xs font-semibold tracking-wide text-text-muted bg-gray-50 border-b border-gray-100">
                <th class="py-4 px-4 font-semibold text-text uppercase">Apprenant</th>
                <th class="py-4 px-4 font-semibold text-text uppercase">Matricule</th>
                <!-- Weeks headers -->
                <?php foreach ($semaines as $s): ?>
                  <th class="py-4 px-2 text-center font-semibold text-text uppercase">S<?php echo htmlspecialchars($s['numero']); ?></th>
                <?php endforeach; ?>
                <!-- Events headers -->
                <?php foreach ($evenements as $e): ?>
                  <th class="py-4 px-3 text-center font-semibold text-text uppercase whitespace-nowrap"><?php echo htmlspecialchars($e['libelle']); ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <?php if (empty($apprenants)): ?>
                <tr>
                  <td colspan="<?php echo 2 + count($semaines) + count($evenements); ?>" class="py-6 text-center text-text-muted">
                    Aucun apprenant enregistré.
                  </td>
                </tr>
              <?php else: ?>
                <?php foreach ($apprenants as $apprenant): ?>
                  <tr class="hover:bg-background/60 transition-colors">
                    <td class="py-3.5 px-4 font-semibold text-text whitespace-nowrap">
                      <?php echo htmlspecialchars($apprenant['prenom'] . ' ' . $apprenant['nom']); ?>
                    </td>
                    <td class="py-3.5 px-4 text-text-muted font-medium">
                      <?php echo htmlspecialchars($apprenant['matricule']); ?>
                    </td>
                    
                    <!-- Week contributions status -->
                    <?php foreach ($semaines as $s): ?>
                      <?php
                        // Get total paid for this student on this week
                        $paid = 0;
                        foreach ($paiements as $p) {
                            if ($p['idApprenant'] == $apprenant['id'] && $p['idSemaine'] == $s['id']) {
                                $paid += $p['montant'];
                            }
                        }
                        
                        if ($paid >= $s['montantDemande']) {
                            // Fully paid
                            echo '<td class="py-3.5 px-2 text-center"><span class="inline-flex items-center justify-center px-2.5 py-1 text-[11px] font-bold bg-green-50 text-green-700 border border-green-200 rounded-full">Soldé</span></td>';
                        } elseif ($paid > 0) {
                            // Partially paid
                            echo '<td class="py-3.5 px-2 text-center"><span class="inline-flex items-center justify-center px-2.5 py-1 text-[11px] font-bold bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-full">' . number_format($paid, 0, ',', ' ') . ' F</span></td>';
                        } else {
                            // Unpaid / due
                            echo '<td class="py-3.5 px-2 text-center"><span class="inline-flex items-center justify-center px-2.5 py-1 text-[11px] font-bold bg-red-50 text-red-600 border border-red-200 rounded-full">Dû (' . number_format($s['montantDemande'], 0, ',', ' ') . ' F)</span></td>';
                        }
                      ?>
                    <?php endforeach; ?>

                    <!-- Event contributions status -->
                    <?php foreach ($evenements as $e): ?>
                      <?php
                        // Get total paid for this student on this event
                        $paid = 0;
                        foreach ($paiements as $p) {
                            if ($p['idApprenant'] == $apprenant['id'] && $p['idEvenement'] == $e['id']) {
                                $paid += $p['montant'];
                            }
                        }
                        
                        if ($paid >= $e['montantDemande']) {
                            // Fully paid
                            echo '<td class="py-3.5 px-3 text-center"><span class="inline-flex items-center justify-center px-2.5 py-1 text-[11px] font-bold bg-green-50 text-green-700 border border-green-200 rounded-full">Soldé</span></td>';
                        } elseif ($paid > 0) {
                            // Partially paid
                            echo '<td class="py-3.5 px-3 text-center"><span class="inline-flex items-center justify-center px-2.5 py-1 text-[11px] font-bold bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-full">' . number_format($paid, 0, ',', ' ') . ' / ' . number_format($e['montantDemande'], 0, ',', ' ') . ' F</span></td>';
                        } else {
                            // Unpaid / due
                            echo '<td class="py-3.5 px-3 text-center"><span class="inline-flex items-center justify-center px-2.5 py-1 text-[11px] font-bold bg-red-50 text-red-600 border border-red-200 rounded-full">Dû (' . number_format($e['montantDemande'], 0, ',', ' ') . ' F)</span></td>';
                        }
                      ?>
                    <?php endforeach; ?>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>
</div>
</body>
</html>
