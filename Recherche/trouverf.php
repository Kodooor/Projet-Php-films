<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/trouverf.css"/>
</head>

  <header>
    <form method='POST' action='../accueil/accueil.php'>
      <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
    </form>

    <section>
    <p>Rechercher à l'aide du code du film</p>
    <form action='../Recherche/recherche_film.php'>
      <input id=barreR type='text' name='codefilm'>
      <input id=valid type="image" src='../CSS/loupe.png' style='width:40px;height:30px;'>
    </form>
  </section>
  </header>
  <body>
  <?php

  $theme = array(
'à l antique',
'c était demain',
'pas drôle mais beau',
'pauvre espèce humaine',
'jeu dans le jeu',
'poésie en image',
'en France profonde',
'du rire aux larmes (et retour)',
'docu',
'les chocottes à zéro',
'la parole est d or',
'Paris',
'culte ou my(s)tique',
'pour petits et grands enfants',
'en avant la musique',
'Los Angeles & Hollywood',
'cadavre(s) dans le(s) placard(s)',
'vive la (critique) sociale !',
'épique pas toc',
'du Moyen-Age à 1914',
'New-York',
'heurs et malheurs à deux',
'Bollywooderie',
'conte de fées relooké',
'entre Berlin et Moscou',
'portrait d époque (après 1914)',
'carrément à l ouest',
'vers le soleil levant',
'perle de nanard'
);


  // Afficher tous les films
  echo "<form method='POST' action='../film/listeFilms.php' >";
  echo "<input type='submit' id='tous' value='Voir tous les films'></form>". "<br>";



  //Tous les thèmes :
  echo "<ol>";
  foreach ($theme as $elem) {
    // echo "<a href='recherche_genre.php?truc=$elem'><h4>$elem</h4></a>";
    echo "<li>";
    echo "<form method='POST' action='../Recherche/recherche_genre.php?nomgenre=$elem'>";
    echo "<input type='submit' id='typef' value='$elem'></form>". "<br>";
    echo "</li>";
  }
  echo "</ol>";



   ?>

<footer>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </footer>
</body>
</html>
