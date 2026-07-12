<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Suivi Cotisations — Coach — Contribution Class</title>
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
    
    <main class="flex-1 overflow-y-auto p-6 space-y-4">

      <div class="flex items-center justify-between">
        <div>
          <h1 class="font-display font-semibold text-lg text-text">Suivi des cotisations hebdomadaires</h1>
          <p class="text-xs text-text-muted mt-0.5">Tableau croisé apprenants / semaines — semaine courante 14 / 40</p>
        </div>
        <div class="flex items-center gap-4 text-xs text-text-muted">
          <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-success"></span> À jour</span>
          <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-danger"></span> Retard</span>
          <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-gray-200"></span> À venir</span>
        </div>
      </div>

      <div class="bg-surface rounded-xl border border-gray-100 overflow-x-auto">
        <table class="w-full text-sm border-collapse">
          <thead>
            <tr class="border-b border-gray-100">
              <th class="sticky left-0 bg-surface px-5 py-3 text-left text-[11px] font-semibold tracking-wide text-text-muted whitespace-nowrap">APPRENANT</th>
              <th class="px-4 py-3 text-[11px] font-semibold tracking-wide text-text-muted text-center whitespace-nowrap">S11</th>
              <th class="px-4 py-3 text-[11px] font-semibold tracking-wide text-text-muted text-center whitespace-nowrap">S12</th>
              <th class="px-4 py-3 text-[11px] font-semibold tracking-wide text-text-muted text-center whitespace-nowrap">S13</th>
              <th class="px-4 py-3 text-[11px] font-semibold tracking-wide text-text-muted text-center whitespace-nowrap">S14</th>
              <th class="px-4 py-3 text-[11px] font-semibold tracking-wide text-text-muted text-center whitespace-nowrap">S15</th>
              <th class="px-4 py-3 text-[11px] font-semibold tracking-wide text-text-muted text-center whitespace-nowrap">S16</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">BS</div>
                  <span class="font-medium text-text">Bajene Sene</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">KD</div>
                  <span class="font-medium text-text">Khadija Diop</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">YS</div>
                  <span class="font-medium text-text">Youssou Sall</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">AK</div>
                  <span class="font-medium text-text">Abdou Kebe</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">AS</div>
                  <span class="font-medium text-text">Abdoulaye Sonko</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-danger"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">MD</div>
                  <span class="font-medium text-text">Mariama Dia</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

            <tr class="hover:bg-background/60">
              <td class="sticky left-0 bg-surface px-5 py-3 whitespace-nowrap">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-secondary-100 flex items-center justify-center text-primary text-[11px] font-semibold">AN</div>
                  <span class="font-medium text-text">Adja Coura Ndour</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-success"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
              <td class="px-4 py-3 text-center"><span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span></td>
            </tr>

          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

</body>
</html>