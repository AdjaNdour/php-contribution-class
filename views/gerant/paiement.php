<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Paiements — Contribution Class</title>
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

    <main class="flex-1 overflow-y-auto p-6">
      <div class="bg-surface rounded-xl border border-gray-100 p-6 max-w-full">
        <h1 class="font-display font-semibold text-lg text-text mb-6">Ajouter un paiement</h1>

        <form class="space-y-6">
          <!-- Apprenant -->
          <div>
            <label class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">
              SELECTIONNER UN APPRENANT
            </label>
            <div class="relative">
              <select class="w-full appearance-none pl-3 pr-9 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text focus:outline-none focus:ring-2 focus:ring-primary/30">
                <option>Rechercher un apprenant</option>
                <option>Bajene Sene</option>
                <option>Khadija Diop</option>
                <option>Youssou Sall</option>
                <option>Abdou Kebe</option>
              </select>
              <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
          </div>

          <!-- Montant / Date -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label for="montant" class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">MONTANT</label>
              <input id="montant" type="text" placeholder="100 fcfa"
                class="w-full px-3 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div>
              <label for="date" class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">DATE DE PAIEMENT</label>
              <div class="relative">
                <input id="date" type="text" placeholder="mm/dd/yyyy"
                  class="w-full px-3 pr-9 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary/30" />
                <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3.5" y="4.5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/></svg>
              </div>
            </div>
          </div>

          <!-- Evenement -->
          <div>
            <label class="block text-xs font-semibold tracking-wide text-text-muted mb-2">EVENEMENT</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

              <label class="relative flex items-center gap-2.5 border-2 border-primary bg-secondary-100 rounded-lg px-4 py-3 cursor-pointer">
                <div class="w-7 h-7 rounded-md bg-white flex items-center justify-center text-primary shrink-0">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="4.5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/></svg>
                </div>
                <span class="text-sm font-medium text-text">Semaine 14</span>
                <input type="radio" name="evenement" checked class="absolute right-3 top-3 w-4 h-4 accent-[#4F46E5]" />
              </label>

              <label class="relative flex items-center gap-2.5 border border-gray-200 rounded-lg px-4 py-3 cursor-pointer hover:border-primary/40">
                <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary shrink-0">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7.5-4.6-10-9.2C.4 8 2 4.5 5.5 4.2 8 4 10 5.4 12 8c2-2.6 4-4 6.5-3.8C22 4.5 23.6 8 22 11.8 19.5 16.4 12 21 12 21Z"/></svg>
                </div>
                <span class="text-sm font-medium text-text">Anniversaire</span>
                <input type="radio" name="evenement" class="absolute right-3 top-3 w-4 h-4 accent-[#4F46E5]" />
              </label>

              <label class="relative flex items-center gap-2.5 border border-gray-200 rounded-lg px-4 py-3 cursor-pointer hover:border-primary/40">
                <div class="w-7 h-7 rounded-md bg-danger/10 flex items-center justify-center text-danger shrink-0">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3 3 7v6c0 5 4 8 9 8s9-3 9-8V7l-9-4Z"/></svg>
                </div>
                <span class="text-sm font-medium text-text">Deces</span>
                <input type="radio" name="evenement" class="absolute right-3 top-3 w-4 h-4 accent-[#4F46E5]" />
              </label>

            </div>
          </div>

          <div class="pt-2">
            <button type="submit" class="bg-primary hover:bg-primary-600 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors">
              enregistrer
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>
</body>
</html>