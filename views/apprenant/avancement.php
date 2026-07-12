<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mon avancement — Contribution Class</title>
<link rel="stylesheet" href="../../assets/css/output.css">
</head>
<body class="font-body">
<div class="min-h-screen flex bg-background">

    <?php
        require_once(dirname(__DIR__)."/layout/nav-apprenant.php");
    ?>

  <!-- Main -->
  <div class="flex-1 flex flex-col min-w-0">

    <?php
        require_once(dirname(__DIR__)."/layout/topbar.php");
    ?>

    <main class="flex-1 overflow-y-auto p-6 space-y-6">

      <!-- Carte objectif -->
      <div class="bg-surface rounded-xl border border-gray-100 p-6">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-[11px] font-semibold tracking-wide text-text-muted">BUT 10 MOIS</p>
            <p class="font-display font-semibold text-2xl text-text mt-1">43 000 / 50 000 FCFA</p>
          </div>
          <p class="font-display font-bold text-3xl text-success">82%</p>
        </div>

        <div class="w-full h-2.5 rounded-full bg-secondary-100 mt-4 overflow-hidden">
          <div class="h-full rounded-full bg-primary" style="width: 82%"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-5">
          <div class="border border-secondary-100 bg-secondary-100/40 rounded-lg px-4 py-3">
            <p class="text-[11px] text-text-muted">Tuition Fees</p>
            <p class="font-display font-semibold text-sm text-text mt-0.5">95%</p>
          </div>
          <div class="border border-secondary-100 bg-secondary-100/40 rounded-lg px-4 py-3">
            <p class="text-[11px] text-text-muted">Activities</p>
            <p class="font-display font-semibold text-sm text-text mt-0.5">70%</p>
          </div>
          <div class="border border-secondary-100 bg-secondary-100/40 rounded-lg px-4 py-3">
            <p class="text-[11px] text-text-muted">Materials</p>
            <p class="font-display font-semibold text-sm text-text mt-0.5">45%</p>
          </div>
        </div>
      </div>

      <!-- Historique de paiement -->
      <div class="bg-surface rounded-xl border border-gray-100 p-4 ">
        <div class="flex items-center justify-between mb-4  bg-secondary p-6 rounded-lg">
          <h2 class="font-display font-semibold text-primary text-base">Historique de paiement</h2>
          <div class="relative w-64">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5" stroke-linecap="round"/></svg>
            <input type="text" placeholder="Search records..." class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-200 text-sm bg-background text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary/30" />
          </div>
        </div>

        <table class="w-full text-sm">
          <thead>
            <tr class="text-left bg-primary rounded-lg">
              <th class="px-3 py-2 text-[11px] text-white font-semibold tracking-wide ">REFERENCE</th>
              <th class="px-3 py-2 text-[11px] text-white font-semibold tracking-wide ">EVENEMENT</th>
              <th class="px-3 py-2 text-[11px] text-white font-semibold tracking-wide ">DATE</th>
              <th class="px-3 py-2 text-[11px] text-white font-semibold tracking-wide ">AMOUNT</th>
              <th class="px-3 py-2 text-[11px] text-white font-semibold tracking-wide ">STATUS</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr class="hover:bg-background/60">
              <td class="px-3 py-3 text-text-muted">REF0012</td>
              <td class="px-3 py-3 font-medium text-text">Anniversaire</td>
              <td class="px-3 py-3 text-text-muted">10/12/2026</td>
              <td class="px-3 py-3 text-text-muted">300</td>
              <td class="px-3 py-3 text-text-muted">-</td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-3 py-3 text-text-muted">REF0012</td>
              <td class="px-3 py-3 font-medium text-text">Semaine 10</td>
              <td class="px-3 py-3 text-text-muted">10/12/2026</td>
              <td class="px-3 py-3 text-text-muted">100</td>
              <td class="px-3 py-3 text-text-muted">-</td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-3 py-3 text-text-muted">REF0012</td>
              <td class="px-3 py-3 font-medium text-text">semaine 9</td>
              <td class="px-3 py-3 text-text-muted">10/12/2026</td>
              <td class="px-3 py-3 text-text-muted">100</td>
              <td class="px-3 py-3 text-text-muted">-</td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-3 py-3 text-text-muted">REF0012</td>
              <td class="px-3 py-3 font-medium text-text">Semaine 8</td>
              <td class="px-3 py-3 text-text-muted">10/12/2026</td>
              <td class="px-3 py-3 text-text-muted">100</td>
              <td class="px-3 py-3 text-text-muted">-</td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-3 py-3 text-text-muted">REF0012</td>
              <td class="px-3 py-3 font-medium text-text">Semaine 7</td>
              <td class="px-3 py-3 text-text-muted">10/12/2026</td>
              <td class="px-3 py-3 text-text-muted">100</td>
              <td class="px-3 py-3 text-text-muted">-</td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-3 py-3 text-text-muted">REF0012</td>
              <td class="px-3 py-3 font-medium text-text">Anniversaire</td>
              <td class="px-3 py-3 text-text-muted">10/12/2026</td>
              <td class="px-3 py-3 text-text-muted">300</td>
              <td class="px-3 py-3 text-text-muted">-</td>
            </tr>
          </tbody>
        </table>

        <div class="flex justify-center p-2 bg-secondary rounded-lg">
          <button class="text-xs font-medium  text-text-muted hover:text-primary">Voir Plus</button>
        </div>
      </div>

    </main>
  </div>
</div>

</body>
</html>