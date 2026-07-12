<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Audit — Coach — Contribution Class</title>
<link rel="stylesheet" href="../../assets/css/output.css">
</head>
<body class="font-body">
<div class="min-h-screen flex bg-background">

    <?php
        require_once(dirname(__DIR__)."/layout/nav-coach.php");
    ?>

  <div class="flex-1 flex flex-col min-w-0">

    <?php
        $topbarButtonClass = 'bg-primary hover:bg-primary-600';
        require_once(dirname(__DIR__)."/layout/topbar.php");
    ?>

    <main class="flex-1 overflow-y-auto p-6 space-y-4">

      <div class="flex items-center justify-between">
        <div>
          <h1 class="font-display font-semibold text-lg text-text">Audit — historique des paiements</h1>
          <p class="text-xs text-text-muted mt-0.5">Tous les paiements enregistrés, tous apprenants confondus</p>
        </div>
        <button class="flex items-center gap-2 border border-gray-200 text-text text-sm font-medium px-4 py-2 rounded-lg hover:bg-background">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v12M7 10l5 5 5-5" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 19h16" stroke-linecap="round"/></svg>
          Exporter
        </button>
      </div>

      <div class="bg-surface rounded-xl border border-gray-100">
        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
          <div class="relative flex-1 max-w-xs">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5" stroke-linecap="round"/></svg>
            <input type="text" placeholder="Rechercher un apprenant..." class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-200 text-sm bg-background text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary/30" />
          </div>
          <div class="relative">
            <select class="appearance-none pl-3 pr-8 py-2 rounded-lg border border-gray-200 bg-background text-sm text-text focus:outline-none focus:ring-2 focus:ring-primary/30">
              <option>Tous les évènements</option>
              <option>Semaine 14</option>
              <option>Anniversaire</option>
              <option>Décès</option>
              <option>Ordinateur</option>
            </select>
            <svg class="absolute right-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>

        <table class="w-full text-sm">
          <thead>
            <tr class="text-left border-b border-gray-100">
              <th class="px-5 py-3 text-[11px] font-semibold tracking-wide text-text-muted">REFERENCE</th>
              <th class="px-5 py-3 text-[11px] font-semibold tracking-wide text-text-muted">APPRENANT</th>
              <th class="px-5 py-3 text-[11px] font-semibold tracking-wide text-text-muted">EVENEMENT</th>
              <th class="px-5 py-3 text-[11px] font-semibold tracking-wide text-text-muted">DATE</th>
              <th class="px-5 py-3 text-[11px] font-semibold tracking-wide text-text-muted">MONTANT</th>
              <th class="px-5 py-3 text-[11px] font-semibold tracking-wide text-text-muted">SAISI PAR</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">

            <?php
              $paiements = [
                ["ref" => "REF0018", "apprenant" => "Khadija Diop",     "evenement" => "Semaine 14",   "date" => "10/07/2026", "montant" => "100 Fcfa", "saisi_par" => "Gérant"],
                ["ref" => "REF0017", "apprenant" => "Youssou Sall",     "evenement" => "Semaine 14",   "date" => "10/07/2026", "montant" => "100 Fcfa", "saisi_par" => "Gérant"],
                ["ref" => "REF0016", "apprenant" => "Mariama Dia",      "evenement" => "Anniversaire", "date" => "09/07/2026", "montant" => "1000 Fcfa","saisi_par" => "Gérant"],
                ["ref" => "REF0015", "apprenant" => "Adja Coura Ndour", "evenement" => "Décès",        "date" => "08/07/2026", "montant" => "300 Fcfa", "saisi_par" => "Gérant"],
                ["ref" => "REF0014", "apprenant" => "Abdou Kebe",       "evenement" => "Semaine 13",   "date" => "05/07/2026", "montant" => "100 Fcfa", "saisi_par" => "Gérant"],
                ["ref" => "REF0013", "apprenant" => "Bajene Sene",      "evenement" => "Ordinateur",   "date" => "03/07/2026", "montant" => "250 Fcfa", "saisi_par" => "Gérant"],
              ];
            ?>

            <?php foreach ($paiements as $p): ?>
              <tr class="hover:bg-background/60">
                <td class="px-5 py-3 text-text-muted"><?= htmlspecialchars($p['ref']) ?></td>
                <td class="px-5 py-3 font-medium text-text"><?= htmlspecialchars($p['apprenant']) ?></td>
                <td class="px-5 py-3 text-text-muted"><?= htmlspecialchars($p['evenement']) ?></td>
                <td class="px-5 py-3 text-text-muted"><?= htmlspecialchars($p['date']) ?></td>
                <td class="px-5 py-3 text-text-muted"><?= htmlspecialchars($p['montant']) ?></td>
                <td class="px-5 py-3 text-text-muted"><?= htmlspecialchars($p['saisi_par']) ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>

        <div class="flex justify-center py-4 border-t border-gray-100">
          <button class="text-xs font-medium text-text-muted hover:text-primary">Voir Plus</button>
        </div>
      </div>

    </main>
  </div>
</div>

</body>
</html>