<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="header.css"/>
</head>
<body>
<header>
  <h1><img src="title.png" alt="Search film" style="width:150px;height:70px;"></h1>
  <?php


  //Rechercher un film

  echo "<div id='trouver'>";

  echo "<form method='POST' action='listeFilms.php'><ol>";

  echo "<input type='submit' value='Trouver un film'></div></form>";


    // Ajouter
    echo "<aside>";
    echo "<form method='POST' action='ajouter_film.php'><ol>";
    echo "<input type='submit' value='Ajouter un film'></form>". "<br>";



    // Supprimer film

    echo "<form method='POST' action='supprimer_film.php'><ol>";
    echo "<input type='submit' value='Supprimer un film'></form>". "<br>";
    echo "</aside>";


   ?>

</header>
</body>
</html>
