<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="icon" type="image/vnd.icon" href="../../Cours-PHP/public/logo.png">
  <title>Cours-php</title>

  <style>
    #logo_nav{
      margin: 1vw;
    }

  </style>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <header>
    <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(135deg, #ce9bcfff 0%, #c537f0ff 100%);"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img id="logo_nav" src="../../Cours-PHP/public/logo.png" width="40"  alt="">
      <strong><a class="navbar-brand" href="#">Cours PHP Thomas</a></strong>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item active">
            <a class="nav-link" href="../../Cours-PHP/index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <!-- ================================================\\EXERCICES//============================================================= -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Exercice
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../../Cours-PHP/exercices/fonction_tableau.php">Fonction tableau</a>
              <a class="dropdown-item" href="../../Cours-PHP/exercices/form_post.php">Formulaire Post</a>
            </div>
          </li>
          <!-- ================================================\\LECONS//============================================================= -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Leçons
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../../Cours-PHP/lessons/syntaxe_PHP.php">Syntaxe PHP</a>
              <a class="dropdown-item" href="../../Cours-PHP/lessons/min_max.php">Fonction min et max</a>
              <a class="dropdown-item" href="../../Cours-PHP/lessons/tableau.php">Les Tableaux et Boucles</a>
              <a class="dropdown-item" href="../../Cours-PHP/lessons/dump.php">Var Dump et Print_R</a>
              <a class="dropdown-item" href="../../Cours-PHP/lessons/form_post.php">Formulaire Post</a>
            </div>
          </li>
          <!-- ================================================\\EXERCICES//============================================================= -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              TP
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"></a>
            </div>
          </li>


        </ul>
      </div>
    </nav>
  </header>

</body>



<?php

?>