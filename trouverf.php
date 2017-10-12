<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href=""/>
</head>
<body>
<header>
  <h1><img src="title.png" alt="Search film" style="width:300px;height:140px;"></h1>
  <?php

  $theme = array("à l  antique ",
  "c  était demain "
  , "pas drôle mais beau "
  , "pauvre espèce humaine "
  , "jeu dans le jeu "
  , "poésie en image "
  , "en France profonde "
  , "du rire aux larmes (et retour) "
  , "docu "
  , "les chocottes à zéro "
  , "la parole est d\"or "
  , "Paris "
  , "culte ou my(s)tique "
  , "pour petits et grands enfants "
  , "en avant la musique "
  , "Los Angeles & Hollywood "
  , "cadavre(s) dans le(s) placard(s) "
  , "vive la (critique) sociale ! "
  , "épique pas toc "
  , "du Moyen-Age à 1914 "
  , "New-York "
  , "heurs et malheurs à deux "
  , "Bollywooderie "
  , "conte de fées relooké "
  , "entre Berlin et Moscou "
  , "portrait d  époque (après 1914) "
  , "carrément à l  ouest "
  , "vers le soleil levant "
  , "perle de nanard ");

  //Rechercher un film
  // echo "<div id=''>";
  // echo "<form method='POST' action='listeFilms.php'><ol>";
  // echo "<input type='submit' value='Tous les films'></form></div>";

  // echo "<div id='theme'>";
  foreach ($theme as $elem) {
    // echo "<a href='recherche_genre.php?truc=$elem'><h4>$elem</h4></a>";
    echo "<form method='POST' action='recherche_genre.php?nomgenre=$elem'>";
    echo "<input type='submit' value='$elem'></form>". "<br>";


    echo "<form action='recherche_film.php'>"; // champs texte

    echo "<input type='text' name='nomfilm'>";
    echo "<input type='submit' value='Valider'></form>". "<br>";
  }
  // echo "</div>";


   ?>

</header>
<footer> <p>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </p> </footer>
</body>
</html>
