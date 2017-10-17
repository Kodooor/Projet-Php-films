<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/rechercheGenre.css"/>
  <title> Search Film </title>
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
  echo "<p><input type='submit' id=submit value='Retour rechercher un film'></p></div></form>";

    $var = $_GET['nomgenre'];
    $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');

    //
    // $result = $file_db->query("SELECT * FROM Films NATURAL JOIN Classification NATURAL JOIN Genres
    //   WHERE nom_genre='$var' and code_genre=ref_code_genre and ref_code_film=code_film ;");

  echo"<section>";
    $g=$file_db->query("SELECT code_genre FROM Genres WHERE nom_genre = '$var'");
    $donne = $g->fetch();
    $fg=$file_db->query("SELECT ref_code_film FROM Classification WHERE ref_code_genre =$donne[0];");
    //echo "<h2> Les films de genre << $var >> sont : </h2><br>";
    foreach($fg as $tonfilm){
      $result=$file_db->query("SELECT * FROM Films WHERE code_film = $tonfilm[0] ;");
      foreach($result as $lefilm){
        if($donne[0] == " "){
          echo " Aucun resultat trouvé pour votre recherche";
        }
        else{
            echo "<ol>";
            echo "<li>";
            echo "<img src=$lefilm[8] alt='IMAGE NON DISPONIBLE' style='width:240px;height:300px;'>";
            echo "<p id='code_film'>Film n°$lefilm[0] </p>";
            echo "<h2 id='titre_original'>$lefilm[1] </h2>";
            echo "<p id='titre_francais'>Titre français: $lefilm[2] </p>";
            echo "<p id='realisateur'>Realisateur: $lefilm[7] </p>";
            echo "<p id='date'>Date: $lefilm[4] </p>";
            echo "<p id='duree'>Duree: $lefilm[5] </p>";
            echo "<p id='couleur'>Couleur: $lefilm[6] </p>";
            echo "<p id='pays'>Pays: $lefilm[3] </p>";
            echo "</li>";
        }
        echo "</ol>";
      }
    }
  echo"</section>";

  // Revenir a l'accueuil
  echo "<form method='POST' action='../accueil/accueil.php'>";
  echo "<p><input type='submit' id=submit value='Accueil'></p></div></form>";

  ?>
</body>
<footer>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </footer>
</html>
