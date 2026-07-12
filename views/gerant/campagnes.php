<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Campagnes — Contribution Class</title>
<link rel="stylesheet" href="../../assets/css/output.css">

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

    <main class="flex-1 overflow-y-auto p-6 space-y-4">

      <div class="flex justify-start">
        <button class="flex items-center gap-2 bg-primary hover:bg-primary-600 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
          Ajouter un evenement
        </button>
      </div>

      <!-- Table -->
      <div class="bg-surface rounded-xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-background/60">
                    <td class="px-5 py-4 w-56">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-md bg-secondary-100 text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3.5" y="4.5" width="17" height="16" rx="2"/>
                                    <path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <span class="font-medium text-text">SEMAINE 14</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-text-muted">1000 / 5200 FCFA</td>
                    <td class="px-5 py-4 text-text-muted">10 / 52</td>
                    <td class="px-5 py-4 text-right">
                        <button class="bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">
                            Modifier
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-background/60">
                    <td class="px-5 py-4 w-56">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-md bg-secondary-100 text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 21s-7.5-4.6-10-9.2C.4 8 2 4.5 5.5 4.2 8 4 10 5.4 12 8c2-2.6 4-4 6.5-3.8C22 4.5 23.6 8 22 11.8 19.5 16.4 12 21 12 21Z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-text">ANNIVERSAIRE</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-text-muted">12000 / 56000 FCFA</td>
                    <td class="px-5 py-4 text-text-muted">23 / 52</td>
                    <td class="px-5 py-4 text-right">
                        <button class="bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">
                            Modifier
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-background/60">
                    <td class="px-5 py-4 w-56">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-md bg-success/10 text-success flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 3 3 7v6c0 5 4 8 9 8s9-3 9-8V7l-9-4Z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-text">DECES</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-text-muted">12000 FCFA</td>
                    <td class="px-5 py-4 text-text-muted">49 / 52</td>
                    <td class="px-5 py-4 text-right">
                        <button class="bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">
                            Modifier
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-background/60">
                    <td class="px-5 py-4 w-56">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-md bg-secondary-100 text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="4" y="4" width="16" height="12" rx="1.5"/>
                                    <path d="M9 20h6M12 16v4" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <span class="font-medium text-text">ORDINATEUR</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-text-muted">12000 FCFA</td>
                    <td class="px-5 py-4 text-text-muted">51 / 52</td>
                    <td class="px-5 py-4 text-right">
                        <button class="bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">
                            Modifier
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-background/60">
                    <td class="px-5 py-4 w-56">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-md bg-secondary-100 text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3.5" y="4.5" width="17" height="16" rx="2"/>
                                    <path d="M3.5 9.5h17M8 3v3M16 3v3" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <span class="font-medium text-text">SEMAINE 15</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-text-muted">3200 / 5200 FCFA</td>
                    <td class="px-5 py-4 text-text-muted">32 / 52</td>
                    <td class="px-5 py-4 text-right">
                        <button class="bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">
                            Modifier
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-background/60">
                    <td class="px-5 py-4 w-56">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-md bg-secondary-100 text-primary flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 21s-7.5-4.6-10-9.2C.4 8 2 4.5 5.5 4.2 8 4 10 5.4 12 8c2-2.6 4-4 6.5-3.8C22 4.5 23.6 8 22 11.8 19.5 16.4 12 21 12 21Z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-text">VOYAGE DE CLASSE</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-text-muted">25000 / 52000 FCFA</td>
                    <td class="px-5 py-4 text-text-muted">40 / 52</td>
                    <td class="px-5 py-4 text-right">
                        <button class="bg-primary hover:bg-primary-600 text-white text-xs font-semibold px-4 py-2 rounded-lg">
                            Modifier
                        </button>
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