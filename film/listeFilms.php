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


  //Revenir à l'accueil
  echo "<form method='POST' action='../accueil/accueil.php'>";
  echo "<input type='submit' value='Accueil'></form><br>";

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
    echo "<img src=$film[8] alt='IMAGE NON DISPONIBLE' style='width:240px;height:300px;'>";
    echo "<li id='code_film'>Film n°$film[0]</li>";
    echo "<li id='titre_original'>$film[1]</li>";
    echo "<li id='titre_francais'>Titre français: $film[2]</li>";
    echo "<li id='realisateur'>Realisateur: $film[7]</li>";
    echo "<li id='date'>Date: $film[4]</li>";
    echo "<li id='duree'>Duree: $film[5]</li>";
    echo "<li id='couleur'>Couleur: $film[6]</li>";
    echo "<li id='pays'>Pays: $film[3]</li>";
  }
  echo "</section>";

  $file_db = null;

?>
</body>
<footer> <p>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </p> </footer>
</html>
