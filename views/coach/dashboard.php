<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard — Coach — Contribution Class</title>
<link rel="stylesheet" href="../../assets/css/output.css">
</head>
<body class="font-body">
<div class="min-h-screen flex bg-background">

    <?php
        require_once(dirname(__DIR__)."/layout/nav-coach.php");
    ?>

  <div class="flex-1 flex flex-col min-w-0">

    <?php
        require_once(dirname(__DIR__)."/layout/topbar.php");
    ?>

    <main class="flex-1 overflow-y-auto p-6 space-y-6">

      <!-- Stat cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-success/10 flex items-center justify-center text-success mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 6.5c-1-1.3-2.9-2-5-2-3 0-5 1.3-5 3.5S9 11.5 12 12s5 1.3 5 3.5-2 3.5-5 3.5c-2.1 0-4-.7-5-2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">TRESORERIE TOTALE</p>
          <p class="font-display font-semibold text-xl text-text mt-1">1 245 000 Fcfa</p>
        </div>
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19V5M4 19h16M8 15l3-3 2.5 2.5L18 9" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">TAUX DE RECOUVREMENT</p>
          <p class="font-display font-semibold text-xl text-text mt-1">82%</p>
        </div>
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-danger/10 flex items-center justify-center text-danger mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">APPRENANTS EN RETARD</p>
          <p class="font-display font-semibold text-xl text-text mt-1">6 / 52</p>
        </div>
        <div class="bg-surface rounded-xl border border-gray-100 p-4">
          <div class="w-8 h-8 rounded-lg bg-warning/10 flex items-center justify-center text-warning mb-3">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 10v4a1 1 0 0 0 1 1h2l4.5 3.5a1 1 0 0 0 1.6-.8V6.3a1 1 0 0 0-1.6-.8L6 9H4a1 1 0 0 0-1 1Z"/></svg>
          </div>
          <p class="text-[11px] font-semibold tracking-wide text-text-muted">CAMPAGNES ACTIVES</p>
          <p class="font-display font-semibold text-xl text-text mt-1">3</p>
        </div>
      </div>

      <!-- Campagnes en cours -->
      <div class="bg-surface rounded-xl border border-gray-100 overflow-x-auto">
        <div class="px-5 py-4 border-b border-gray-100">
          <h2 class="font-display font-semibold text-sm text-text">Campagnes en cours</h2>
        </div>
        <table class="w-full text-sm">
          <tbody class="divide-y divide-gray-100">
            <tr class="hover:bg-background/60">
              <td class="px-5 py-4 w-56">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="4.5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/></svg>
                  </div>
                  <span class="font-medium text-text">SEMAINE 14</span>
                </div>
              </td>
              <td class="px-5 py-4 text-text-muted">1000 / 5200 FCFA</td>
              <td class="px-5 py-4 text-text-muted">46 / 52 apprenants à jour</td>
              <td class="px-5 py-4 text-right">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-success/10 text-success">En cours</span>
              </td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7.5-4.6-10-9.2C.4 8 2 4.5 5.5 4.2 8 4 10 5.4 12 8c2-2.6 4-4 6.5-3.8C22 4.5 23.6 8 22 11.8 19.5 16.4 12 21 12 21Z"/></svg>
                  </div>
                  <span class="font-medium text-text">ANNIVERSAIRE</span>
                </div>
              </td>
              <td class="px-5 py-4 text-text-muted">23000 / 56000 FCFA</td>
              <td class="px-5 py-4 text-text-muted">23 / 52 apprenants à jour</td>
              <td class="px-5 py-4 text-right">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-success/10 text-success">En cours</span>
              </td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-danger">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3 3 7v6c0 5 4 8 9 8s9-3 9-8V7l-9-4Z"/></svg>
                  </div>
                  <span class="font-medium text-text">DECES</span>
                </div>
              </td>
              <td class="px-5 py-4 text-text-muted">49000 FCFA collectés</td>
              <td class="px-5 py-4 text-text-muted">Clôture dans 2 jours</td>
              <td class="px-5 py-4 text-right">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-warning/10 text-warning">Se termine bientôt</span>
              </td>
            </tr>
            <tr class="hover:bg-background/60">
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="12" rx="1.5"/><path d="M9 20h6M12 16v4" stroke-linecap="round"/></svg>
                  </div>
                  <span class="font-medium text-text">ORDINATEUR</span>
                </div>
              </td>
              <td class="px-5 py-4 text-text-muted">12000 FCFA collectés</td>
              <td class="px-5 py-4 text-text-muted">51 / 52 apprenants à jour</td>
              <td class="px-5 py-4 text-right">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 text-text-muted">Clôturée</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

</body>
</html>