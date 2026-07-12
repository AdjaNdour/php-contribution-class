<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Ajouter un Événement — Contribution Class</title>
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
      
      <div class="max-w-2xl mx-auto bg-surface border border-gray-100 rounded-xl shadow-sm p-8">
        <h2 class="font-display font-semibold text-lg text-text mb-6">Ajouter une cotisation ponctuelle (Événement)</h2>

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

        <form action="index.php?controller=gerant&action=addEvenement" method="POST" class="space-y-5">
          <div>
            <label class="block text-xs font-semibold text-text-muted mb-2">LIBELLÉ DE L'ÉVÉNEMENT</label>
            <input type="text" name="libelle" placeholder="Ex: Voyage de classe, Anniversaire" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-background text-sm focus:ring-2 focus:ring-primary">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-semibold text-text-muted mb-2">DATE DE DÉBUT</label>
              <input type="date" name="dateDebut" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-background text-sm focus:ring-2 focus:ring-primary">
            </div>
            <div>
              <label class="block text-xs font-semibold text-text-muted mb-2">DATE DE FIN</label>
              <input type="date" name="dateFin" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-background text-sm focus:ring-2 focus:ring-primary">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-semibold text-text-muted mb-2">TYPE D'ÉVÉNEMENT</label>
              <select name="type" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-background text-sm focus:ring-2 focus:ring-primary">
                <option value="">Choisir un type</option>
                <option value="ANNIVERSAIRE">Anniversaire</option>
                <option value="DECES">Décès</option>
                <option value="ORDINATEUR">Matériel / Ordinateur</option>
                <option value="AUTRE">Autre</option>
              </select>
            </div>
            <div>
              <label class="block text-xs font-semibold text-text-muted mb-2">MONTANT REQUIS PAR APPRENANT (FCFA)</label>
              <input type="number" name="montantDemande" placeholder="Ex: 1000" min="1" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-background text-sm focus:ring-2 focus:ring-primary">
            </div>
          </div>

          <div class="flex justify-end gap-3 pt-4">
            <a href="index.php?controller=gerant&action=campagnes" class="px-5 py-2.5 rounded-lg border border-gray-300 text-sm font-semibold text-text hover:bg-gray-50 transition">Annuler</a>
            <button type="submit" class="bg-primary hover:bg-primary-600 text-white font-semibold px-5 py-2.5 rounded-lg transition">Enregistrer</button>
          </div>
        </form>
      </div>

    </main>
  </div>
</div>
</body>
</html>
