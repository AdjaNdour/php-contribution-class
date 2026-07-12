<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mes Notifications — Contribution Class</title>
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

    <main class="flex-1 overflow-y-auto p-6">
      <div class="bg-surface rounded-xl border border-gray-100 max-w-full">

        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
          <div>
            <h1 class="font-display font-semibold text-lg text-text">Mes Notifications</h1>
            <p class="text-xs text-text-muted mt-0.5">3 notifications non lues</p>
          </div>
        </div>

        <ul class="divide-y divide-gray-100">

          <!-- Non lue — succès -->
          <li class="flex items-start gap-3 px-6 py-4 bg-secondary-100/40">
            <div class="w-9 h-9 rounded-lg bg-success/10 text-success flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="text-sm font-medium text-text">Paiement reçu</p>
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
              </div>
              <p class="text-sm text-text-muted mt-0.5">Votre paiement de 100 FCFA pour la Semaine 14 a bien été enregistré.</p>
            </div>
            <p class="text-xs text-text-muted whitespace-nowrap mt-0.5">il y a 12 min</p>
          </li>

          <!-- Non lue — retard -->
          <li class="flex items-start gap-3 px-6 py-4 bg-secondary-100/40">
            <div class="w-9 h-9 rounded-lg bg-danger/10 text-danger flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="text-sm font-medium text-text">Retard de paiement</p>
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
              </div>
              <p class="text-sm text-text-muted mt-0.5">Vous avez 1 semaine de retard sur votre cotisation. Régularisez avant vendredi.</p>
            </div>
            <p class="text-xs text-text-muted whitespace-nowrap mt-0.5">il y a 2 h</p>
          </li>

          <!-- Non lue — nouvel évènement -->
          <li class="flex items-start gap-3 px-6 py-4 bg-secondary-100/40">
            <div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 10v4a1 1 0 0 0 1 1h2l4.5 3.5a1 1 0 0 0 1.6-.8V6.3a1 1 0 0 0-1.6-.8L6 9H4a1 1 0 0 0-1 1Z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="text-sm font-medium text-text">Nouvel évènement ajouté</p>
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
              </div>
              <p class="text-sm text-text-muted mt-0.5">Le gérant a ajouté l'évènement "Ordinateur" à la campagne de cotisation.</p>
            </div>
            <p class="text-xs text-text-muted whitespace-nowrap mt-0.5">hier</p>
          </li>

          <!-- Lue — rappel -->
          <li class="flex items-start gap-3 px-6 py-4">
            <div class="w-9 h-9 rounded-lg bg-warning/10 text-warning flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01" stroke-linecap="round"/><path d="M10.3 3.9 2.6 18a1.5 1.5 0 0 0 1.3 2.2h16.2a1.5 1.5 0 0 0 1.3-2.2L13.7 3.9a1.5 1.5 0 0 0-2.6 0Z" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-medium text-text">Rappel d'échéance</p>
              <p class="text-sm text-text-muted mt-0.5">La cotisation "Anniversaire" arrive à échéance dans 3 jours.</p>
            </div>
            <p class="text-xs text-text-muted whitespace-nowrap mt-0.5">il y a 2 jours</p>
          </li>

          <!-- Lue — paiement reçu -->
          <li class="flex items-start gap-3 px-6 py-4">
            <div class="w-9 h-9 rounded-lg bg-success/10 text-success flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-medium text-text">Paiement reçu</p>
              <p class="text-sm text-text-muted mt-0.5">Votre paiement de 300 FCFA pour "Anniversaire" a bien été enregistré.</p>
            </div>
            <p class="text-xs text-text-muted whitespace-nowrap mt-0.5">il y a 5 jours</p>
          </li>

        </ul>

        <div class="flex justify-center py-4 border-t border-gray-100">
          <button class="text-xs font-medium text-text-muted hover:text-primary">Voir Plus</button>
        </div>
      </div>
    </main>
  </div>
</div>

</body>
</html>