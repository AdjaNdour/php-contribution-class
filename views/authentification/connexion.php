<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Connexion — Contribution Class</title>
<link rel="stylesheet" href="../../assets/css/output.css">
</head>
<body class="min-h-screen font-body">

  <div class="min-h-screen flex items-center justify-center relative overflow-hidden px-4">

    <!-- decorative background wave -->
    <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1200 800" preserveAspectRatio="none" fill="none">
      <path d="M0,500 C200,420 300,600 500,520 C700,440 800,600 1000,500 C1100,450 1150,480 1200,460 L1200,800 L0,800 Z"
            fill="#4F46E5" fill-opacity="0.04" />
      <path d="M0,560 C220,480 320,650 520,570 C720,490 830,640 1030,540 C1130,490 1170,510 1200,500"
            stroke="#4F46E5" stroke-opacity="0.15" stroke-width="2" fill="none" />
    </svg>

    <div class="relative z-10 w-full max-w-md">
      <div class="bg-surface border-2 border-primary rounded-2xl shadow-xl shadow-primary/5 p-8">

        <!-- Logo -->
        <div class="flex flex-col items-center text-center mb-6">
          <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-white font-display font-bold text-lg mb-3">
            C
          </div>
          <h1 class="font-display font-semibold text-lg text-text">Contribution Class</h1>
          <p class="text-sm text-text-muted mt-1">Connectez-vous et gerer vos cotisations</p>
        </div>

        <form class="space-y-4">
          <!-- Email -->
          <div>
            <label for="email" class="block text-xs font-semibold tracking-wide text-text-muted mb-1.5">
              ADRESSE EMAIL
            </label>
            <div class="relative">
              <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M3 6.5A2.5 2.5 0 0 1 5.5 4h13A2.5 2.5 0 0 1 21 6.5v11A2.5 2.5 0 0 1 18.5 20h-13A2.5 2.5 0 0 1 3 17.5v-11Z" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="m4 6 8 6 8-6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <input id="email" type="email" placeholder="email@gmail.com"
                class="w-full pl-9 pr-3 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text placeholder:text-text-muted/70 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" />
            </div>
          </div>

          <!-- Mot de passe -->
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label for="password" class="block text-xs font-semibold tracking-wide text-text-muted">
                MOT DE PASSE
              </label>
            </div>
            <div class="relative">
              <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="4.5" y="10.5" width="15" height="9" rx="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 10.5V7.5a4 4 0 1 1 8 0v3" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
        
              <input id="password" type="password" value="••••••••"
                class="w-full pl-9 pr-9 py-2.5 rounded-lg border border-gray-200 bg-background text-sm text-text focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" />
                <button type="button" aria-label="Afficher le mot de passe" class="absolute right-3 top-1/2 -translate-y-1/2 text-text-muted hover:text-text">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z" stroke-linecap="round" stroke-linejoin="round"/>
                  <circle cx="12" cy="12" r="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
                <a href="#" class="text-xs text-primary font-medium hover:underline">Mot de passe oublié ?</a>
          </div>

          <div class="space-y-3 mt-2">

            <a href="../gerant/dashboard.php"
                class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-primary-600 text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                Se connecter gérant
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <a href="../coach/dashboard.php"
                class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-primary-600 text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                Se connecter coach
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <a href="../apprenant/dashboard.php"
                class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-primary-600 text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                Se connecter apprenant
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            </div>
        </form>

        <p class="text-center text-xs text-text-muted mt-6">
          Pas encore de compte ?
          <a href="#" class="text-primary font-medium hover:underline">Inscrivez-vous ici</a>
        </p>
      </div>
    </div>
  </div>

</body>
</html>