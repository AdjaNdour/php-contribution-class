<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard — Contribution Class</title>
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

    <?php
      // Calculate stats dynamically
      $totalCollecte = 0;
      foreach ($semaines as $sem) {
          $totalCollecte += $sem['montantTotaleCotise'];
      }
      foreach ($evenements as $ev) {
          $totalCollecte += $ev['montantTotaleCotise'];
      }
      $dernierSemNumero = empty($semaines) ? 0 : end($semaines)['numero'];
    ?>

    <main class="flex-1 overflow-y-auto p-6 space-y-6">

      <!-- Stat cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-success/10 flex items-center justify-center text-success mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 6.5c-1-1.3-2.9-2-5-2-3 0-5 1.3-5 3.5S9 11.5 12 12s5 1.3 5 3.5-2 3.5-5 3.5c-2.1 0-4-.7-5-2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">TOTAL COLLECTE</p>
          <p class="font-display font-semibold text-xl text-text mt-1"><?php echo number_format($totalCollecte, 0, ',', ' '); ?> Fcfa</p>
        </div>
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="3"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6" stroke-linecap="round"/><circle cx="17.5" cy="9" r="2.3"/><path d="M15.5 13.2c2.6.3 4.6 2.3 4.9 5" stroke-linecap="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">TOTAL APPRENANT</p>
          <p class="font-display font-semibold text-xl text-text mt-1"><?php echo $totalApprenants; ?></p>
        </div>
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-danger/10 flex items-center justify-center text-danger mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">RETARDS SIMULÉS</p>
          <p class="font-display font-semibold text-xl text-text mt-1">2</p>
        </div>
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="4.5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">SEMAINE COURANTE</p>
          <p class="font-display font-semibold text-xl text-text mt-1">SMN <?php echo $dernierSemNumero; ?></p>
        </div>
      </div>

      <!-- Table -->
      <div class="bg-surface rounded-xl border border-gray-100 overflow-x-auto">
        <table class="w-full text-sm">
          <tbody class="divide-y divide-gray-100">
            <!-- Weekly contributions -->
            <?php foreach ($semaines as $semaine): ?>
                <tr class="hover:bg-background/60">
                  <td class="px-5 py-4 w-56">
                    <div class="flex items-center gap-2.5">
                      <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="4.5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/></svg>
                      </div>
                      <span class="font-medium text-text">SEMAINE <?php echo htmlspecialchars($semaine['numero']); ?></span>
                    </div>
                  </td>
                  <td class="px-5 py-4 text-text-muted"><?php echo number_format($semaine['montantTotaleCotise'], 0, ',', ' '); ?> / <?php echo number_format($semaine['montantDemande'] * $totalApprenants, 0, ',', ' '); ?> FCFA</td>
                  <td class="px-5 py-4 text-text-muted"><?php echo $semaine['nbreCotisation']; ?> / <?php echo $totalApprenants; ?></td>
                  <td class="px-5 py-4 text-right">
                    <a href="index.php?controller=gerant&action=campagnes" class="inline-block bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">Voir</a>
                  </td>
                </tr>
            <?php endforeach; ?>

            <!-- Event contributions -->
            <?php foreach ($evenements as $evenement): ?>
                <tr class="hover:bg-background/60">
                  <td class="px-5 py-4">
                    <div class="flex items-center gap-2.5">
                      <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7.5-4.6-10-9.2C.4 8 2 4.5 5.5 4.2 8 4 10 5.4 12 8c2-2.6 4-4 6.5-3.8C22 4.5 23.6 8 22 11.8 19.5 16.4 12 21 12 21Z"/></svg>
                      </div>
                      <span class="font-medium text-text"><?php echo htmlspecialchars(strtoupper($evenement['libelle'])); ?></span>
                    </div>
                  </td>
                  <td class="px-5 py-4 text-text-muted"><?php echo number_format($evenement['montantTotaleCotise'], 0, ',', ' '); ?> / <?php echo number_format($evenement['montantDemande'] * $totalApprenants, 0, ',', ' '); ?> FCFA</td>
                  <td class="px-5 py-4 text-text-muted"><?php echo $evenement['nbreCotisation']; ?> / <?php echo $totalApprenants; ?></td>
                  <td class="px-5 py-4 text-right">
                    <a href="index.php?controller=gerant&action=campagnes" class="inline-block bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">Voir</a>
                  </td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>
</body>
</html>