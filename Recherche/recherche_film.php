<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/accueil.css" />
  <title> Search Films </title>
</head>
<body>
  <?php
    $var = $_GET['codefilm'];
    $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
    $result = $file_db->query("SELECT * FROM Films where code_film='$var' ;");

    if($result == "no rows selected" or $result == ""){
      echo " Aucun resultat trouvé pour votre recherche";
    }
    else{
      foreach ($result as $f) {
        echo "Les films trouvés sont :<br>";
        echo "Le film n°$f[0] s'appelle $f[1]<br>";
        # code...
    }
  }
  // Réessayer
  echo "<form method='POST' action='../Recherche/trouverf.php'><ol>";
  echo "<input type='submit' value='Réessayer'></div></form>";

  // Revenir a l'accueuil
  echo "<form method='POST' action='../accueil/accueil.php'><ol>";
  echo "<input type='submit' value='Accueil'></div></form>";

    //
    //
    // $idgenre = $file_db->query("SELECT ref_code_genre FROM Genres WHERE nom_genre = '$var';");
    // //
    // $idfilmdugenre = $file_db->query("SELECT ref_code_film FROM Classification WHERE ref_code_genre = '$idgenre';");
    // //
    // $idfilm = $file_db->query("SELECT * FROM Films WHERE code_film = '$idfilmdugenre';");

  ?>
</body>
</html>
