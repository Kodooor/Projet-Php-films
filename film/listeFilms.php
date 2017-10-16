<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/listeFilms.css"/>
  <title> SQLite_listeFilms </title>
</head>
<body>
  <header>
    <h1>Tous les films</h1>
  </header>
  <?php
  $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
  $result = $file_db->query('SELECT * FROM Films;');


  //Revenir à l'accueil
  echo "<form method='POST' action='../accueil/accueil.php'>";
  echo "<input type='submit' value='Accueil'></form><br>";

  echo "<section>";
  //Affichage des films
  foreach ($result as $film) {
    echo "<li>$film[1]</li>";
  }
  echo "</section>";

  $file_db = null;

?>
</body>
<footer> <p>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </p> </footer>
</html>
