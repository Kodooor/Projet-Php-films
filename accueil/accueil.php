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

  echo "<div id='trouver'>";
  echo "<form method='POST' action='../Recherche/trouverf.php'><ol>";
  echo "<input type='submit' value='Trouver un film'></div></form>";


    // Ajouter
    echo "<aside>";
    echo "<form method='POST' action='../film/ajouter_film.php'><ol>";
    echo "<input type='submit' value='Ajouter un film'></form>". "<br>";



    // Supprimer film

    echo "<form method='POST' action='../film/supprimer_film.php'>";
    echo "<input type='submit' value='Supprimer un film'></form>". "<br>";
    echo "<ol></aside>";


   ?>


<footer> <p>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </p> </footer>
</body>
</html>
