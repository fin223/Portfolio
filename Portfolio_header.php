<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="icon" href="img/Company_Logo.png">
    <title>
      <?php 
        if (isset($title)) {

          echo $title; 

          }
          else {
            echo 'Mon Portfolio';
          }

          ?>
    </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">

    

    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 450px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mon Portfolio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          
          <li class="nav-item">

          
          <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/Portfolio') { ?> active <?php }; ?>" aria-current="page" href="/Portfolio"> <i class="fas fa-home"> </i> Bienvenu</a>

            
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/Portfolio_Competence') { ?> active <?php }; ?>" href="/Portfolio_Competence"> <i class="fas fa-chart-line"> </i> Compétences</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/Portfolio_Projet') { ?> active <?php }; ?>" href="/Portfolio_Projet"> <i class="fas fa-book"> </i> Projet</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/Portfolio_Moi') { ?> active <?php }; ?>" href="/Portfolio_Moi"> <i class="fas fa-address-card"> </i> A propos de moi</a>
          </li>

        </ul>
        <form class="d-flex">
          
        </form>
      </div>
    </div>
  </nav>
</header>