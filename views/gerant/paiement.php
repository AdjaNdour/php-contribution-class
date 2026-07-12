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

    <main class="flex-1 overflow-y-auto p-6 space-y-6">
      
      <!-- Formulaire d'ajout de paiement -->
      <div class="bg-surface rounded-xl border border-gray-100 p-6 max-w-full">
        <h1 class="font-display font-semibold text-lg text-text mb-6">Ajouter un paiement (Saisie & Ventilation)</h1>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Des erreurs sont survenues :</h3>
                        <div class="mt-1 text-sm text-red-700">
                            <ul role="list" class="list-disc pl-5 space-y-1">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form action="index.php?controller=gerant&action=paiement" method="POST" class="space-y-6">
          <!-- Apprenant -->
          <div>
            <label class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">
              SÉLECTIONNER UN APPRENANT
            </label>
            <div class="relative">
              <select name="idApprenant" required class="w-full appearance-none pl-3 pr-9 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text focus:outline-none focus:ring-2 focus:ring-primary/30">
                <option value="">Sélectionner un apprenant</option>
                <?php foreach ($apprenants as $apprenant): ?>
                  <option value="<?php echo $apprenant['id']; ?>">
                    <?php echo htmlspecialchars($apprenant['prenom'] . ' ' . $apprenant['nom']); ?> (<?php echo htmlspecialchars($apprenant['matricule']); ?>)
                  </option>
                <?php endforeach; ?>
              </select>
              <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
          </div>

          <!-- Montant / Date -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label for="montant" class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">MONTANT (FCFA)</label>
              <input id="montant" type="number" name="montant" placeholder="Ex: 100" min="1" required
                class="w-full px-3 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary/30" />
            </div>
            <div>
              <label for="date" class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">DATE DE PAIEMENT</label>
              <div class="relative">
                <input id="date" type="date" name="date" required
                  class="w-full px-3 pr-9 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text focus:outline-none focus:ring-2 focus:ring-primary/30" />
              </div>
            </div>
          </div>

          <!-- Ventilation de la cotisation -->
          <div>
            <label class="block text-xs font-semibold tracking-wide text-text-muted mb-3">VENTILATION (CHOISIR LA COTISATION A CRÉDITER)</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
              
              <!-- Weekly contributions -->
              <?php foreach ($semaines as $semaine): ?>
                <label class="relative flex items-center gap-2.5 border border-gray-200 hover:border-primary/40 rounded-lg px-4 py-3 cursor-pointer transition">
                  <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary shrink-0">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="4.5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/></svg>
                  </div>
                  <span class="text-sm font-medium text-text">Semaine <?php echo htmlspecialchars($semaine['numero']); ?></span>
                  <input type="radio" name="contribution" value="semaine_<?php echo $semaine['id']; ?>" class="absolute right-3 top-3 w-4 h-4 accent-[#4F46E5]" required />
                </label>
              <?php endforeach; ?>

              <!-- One-off events -->
              <?php foreach ($evenements as $evenement): ?>
                <label class="relative flex items-center gap-2.5 border border-gray-200 hover:border-primary/40 rounded-lg px-4 py-3 cursor-pointer transition">
                  <div class="w-7 h-7 rounded-md bg-secondary-100 flex items-center justify-center text-primary shrink-0">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7.5-4.6-10-9.2C.4 8 2 4.5 5.5 4.2 8 4 10 5.4 12 8c2-2.6 4-4 6.5-3.8C22 4.5 23.6 8 22 11.8 19.5 16.4 12 21 12 21Z"/></svg>
                  </div>
                  <span class="text-sm font-medium text-text"><?php echo htmlspecialchars($evenement['libelle']); ?></span>
                  <input type="radio" name="contribution" value="evenement_<?php echo $evenement['id']; ?>" class="absolute right-3 top-3 w-4 h-4 accent-[#4F46E5]" required />
                </label>
              <?php endforeach; ?>

            </div>
          </div>

          <div class="pt-2">
            <button type="submit" class="bg-primary hover:bg-primary-600 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors">
              Enregistrer & Ventiler
            </button>
          </div>
        </form>
      </div>

      <!-- Historique des Paiements -->
      <div class="bg-surface rounded-xl border border-gray-100 p-6">
        <h2 class="font-display font-semibold text-lg text-text mb-4">Historique des paiements</h2>
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead>
              <tr class="text-left text-xs font-semibold tracking-wide text-text-muted border-b border-gray-100">
                <th class="pb-3">Apprenant</th>
                <th class="pb-3">Cotisation ventilée</th>
                <th class="pb-3">Montant</th>
                <th class="pb-3">Date</th>
                <th class="pb-3">Heure</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <?php if (empty($paiementsDetails)): ?>
                <tr>
                  <td colspan="5" class="py-4 text-center text-text-muted">Aucun paiement enregistré.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($paiementsDetails as $p): ?>
                  <tr class="hover:bg-background/60">
                    <td class="py-4 font-medium text-text"><?php echo htmlspecialchars($p['nomApprenant']); ?></td>
                    <td class="py-4 text-text-muted"><?php echo htmlspecialchars($p['libelleCotisation']); ?></td>
                    <td class="py-4 text-success font-semibold"><?php echo number_format($p['montant'], 0, ',', ' '); ?> FCFA</td>
                    <td class="py-4 text-text-muted"><?php echo htmlspecialchars($p['date']); ?></td>
                    <td class="py-4 text-text-muted"><?php echo htmlspecialchars($p['heure']); ?></td>
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

<script>
document.querySelectorAll('input[name="contribution"]').forEach(radio => {
  radio.addEventListener('change', function() {
    document.querySelectorAll('input[name="contribution"]').forEach(r => {
      const card = r.closest('label');
      card.classList.remove('border-primary', 'bg-secondary-100');
      card.classList.add('border-gray-200');
    });
    if (this.checked) {
      const card = this.closest('label');
      card.classList.add('border-primary', 'bg-secondary-100');
      card.classList.remove('border-gray-200');
    }
  });
});
</script>
</body>
</html>