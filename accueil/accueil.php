<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/accueil.css"/>
</head>

<header>
  <h1><img src="../titleB.png" alt="Search film" style="width:300px;height:140px;"></h1>
</header>
<body>
  <?php


  //Rechercher un film

  echo "<form method='POST' action='../Recherche/trouverf.php'><ol>";
  echo "<input type='submit' id='trouver' value='Trouver un film'></form>";
  echo "<br>";


    // Ajouter
    echo "<section>";
    echo "<form method='POST' action='../film/ajouter_film.php'>";
    echo "<input type='submit' value='Ajouter un film'></form>";



    // Supprimer film

    echo "<form method='POST' action='../film/supprimer_film.php'>";
    echo "<input type='submit' value='Supprimer un film'></form>";
    echo "</section>";


   ?>


<footer>      Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI      </footer>
</body>
</html>
