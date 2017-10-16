<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href=""/>
  <title> SQLite_listeFilms </title>
</head>
<body>
  <header>
    <h1><img src="title.png" alt="Search film" style="width:150px;height:70px;"></h1>
  <?php
  $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
  $result = $file_db->query('SELECT * FROM Films;');


  //Revenir à l'accueil
  echo "<form method='POST' action='../accueil/accueil.php'><ol>";
  echo "<input type='submit' value='Accueil'></form><br>";



  //Affichage des films
  foreach ($result as $film) {
    echo "<br> Le film n°$film[0] s'appelle $film[1]<br>";
  }
  echo "</ol>";


  $file_db = null;

?>
</body>
</html>
