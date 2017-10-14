<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
<link rel="stylesheet" href="../CSS/header.css"/>
  <title> Search Films </title>
</head>
<header>
  <img src="../title.png" alt="Search film" style="width:300px;height:140px;">
</header>
<body>
  <?php
  // Réessayer
  echo "<form method='POST' action='../Recherche/trouverf.php'>";
  echo "<input type='submit' value='Réessayer'></div></form>";

  // Revenir a l'accueuil
  echo "<form method='POST' action='../accueil/accueil.php'>";
  echo "<input type='submit' value='Accueil'></div></form>";

    $var = $_GET['codefilm'];
    $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
    $result = $file_db->query("SELECT * FROM Films where code_film='$var' ;");
    $result1 = $file_db->query("SELECT * FROM Films where code_film='$var' ;");
    $donne=$result1 ->fetch();
    echo "<h2> Le(s) film(s) trouvé(s) de code << $var >> sont : </h2><br>";

    if ($donne[0] == ''  or $donne[0]==' '){
      echo " Aucun resultat trouvé pour votre recherche";
    }
    else{
      foreach ($result as $f) {

        echo "<ol> Le film n°$f[0] s'appelle $f[1] <br>";
    }
    echo "</ol>";
  }


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
