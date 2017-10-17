<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
<link rel="stylesheet" href="../CSS/rechercheFilm.css"/>
  <title> Search Films </title>
</head>
<header>
  <form method='POST' action='../accueil/accueil.php'>
    <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
  </form>
</header>
<body>
  <?php
  // Réessayer
  echo "<form method='POST' action='../Recherche/trouverf.php'>";
  echo "<input type='submit' id='submit' value='Retour liste des genres'></div></form>";


    $var = $_GET['codefilm'];
    $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
    $result = $file_db->query("SELECT * FROM Films where code_film='$var' ;");
    $result1 = $file_db->query("SELECT * FROM Films where code_film='$var' ;");
    $donne=$result1 ->fetch();
    //echo "<h2> Le film trouvé <strong>$var est : </h2><br>";

    if ($donne[0] == ''  or $donne[0]==' '){
      echo " Aucun resultat trouvé pour votre recherche";
    }
    else{
      foreach ($result as $film) {

        echo "<ol>";
        echo "<img src=$film[8] alt='IMAGE NON DISPONIBLE' style='width:240px;height:300px;'>";
        echo "<p id='code_film'>Film n°$film[0] </p>";
        echo "<p id='titre_original'>$film[1] </p>";
        echo "<p id='titre_francais'>Titre français: $film[2] </p>";
        echo "<p id='realisateur'>Realisateur: $film[7] </p>";
        echo "<p id='date'>Date: $film[4] </p>";
        echo "<p id='duree'>Duree: $film[5] </p>";
        echo "<p id='couleur'>Couleur: $film[6] </p>";
        echo "<p id='pays'>Pays: $film[3] </p>";
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
  <footer>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </footer>
</body>
</html>
