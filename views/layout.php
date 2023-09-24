<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="UpTask: Organizador de Proyectos y Tareas.">
  <meta name="author" content="Arturo Hernández">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@arturo_hdzg">
  <meta name="twitter:creator" content="@arturo_hdzg">
  <meta name="twitter:title" content="UpTask">
  <meta name="twitter:description" content="UpTask: Organizador de Proyectos y Tareas.">
  <meta name="twitter:image" content="https://"> <!-- TODO -->
  <meta property="og:title" content="UpTask">
  <meta property="og:description" content="UpTask: Organizador de Proyectos y Tareas.">
  <meta property="og:image" content="https://"> <!-- TODO -->
  <meta property="og:url" content="https://"> <!-- TODO -->
  <meta property="og:type" content="website">
  <meta name="keywords" content="Proyectos, organizador, tareas">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="msapplication-TileImage" content="/favicon/mstile-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-chrome-192x192.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Open+Sans&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="/build/css/app.css">
  <title>UpTask <?php echo isset($title) ? " | " . $title : ""; ?></title>
</head>

<body>

  <?php echo $contenido; ?>
  <?php echo $script ?? ''; ?>

  <footer>
    <p class="copyright">UpTask <?php echo date('Y'); ?>&copy;</p>
    <p class="copyright">Designed by Arturo Hernández Garza</p>
  </footer>

</body>

</html>
