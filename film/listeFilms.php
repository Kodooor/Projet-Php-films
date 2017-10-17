<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/listeFilms.css"/>
  <title> SQLite_listeFilms </title>
</head>
<body>
  <header>
    <form method='POST' action='../accueil/accueil.php'>
      <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
    </form>
  </header>
  <h1>Tous les films</h1>
  <?php
  $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
  $result = $file_db->query('SELECT * FROM Films;');


  echo "<section>";
  //Affichage des films
  // code_film INTEGER,
  // titre_original TEXT,
  // titre_francais TEXT,
  // pays TEXT,
  // date INTEGER,
  // duree INTEGER,
  // couleur TEXT,
  // realisateur INTEGER,
  // image TEXT

  foreach ($result as $film) {
    echo "<li>";
    echo "<img src=$film[8] alt='IMAGE NON DISPONIBLE' style='width:240px;height:300px;'>";
    echo "<p id='code_film'>Film n°$film[0] </p>";
    echo "<h2 id='titre_original'>$film[1] </h2>";
    echo "<p id='titre_francais'>Titre français: $film[2] </p>";
    echo "<p id='realisateur'>Realisateur: $film[7] </p>";
    echo "<p id='date'>Date: $film[4] </p>";
    echo "<p id='duree'>Duree: $film[5] </p>";
    echo "<p id='couleur'>Couleur: $film[6] </p>";
    echo "<p id='pays'>Pays: $film[3] </p>";
    echo "</li>";
  }
  echo "</section>";

    //Revenir en haut de la page
  echo "<form method='POST' action='listeFilms.php'>";
  echo "<input type='submit' id='haut' value='Haut de page'></form><br>";


    //Revenir à l'accueil
  echo "<form method='POST' action='../accueil/accueil.php'>";
  echo "<input type='submit' id='submit' value='Retour accueil'></form><br>";

  $file_db = null;

?>
</body>
<footer> <p>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </p> </footer>
</html>
