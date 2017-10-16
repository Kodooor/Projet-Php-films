<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/rechercheGenre.css"/>
  <title> Search Film </title>
</head>
<header>
  <img src="../title.png" alt="Search film" style="width:300px;height:140px;">
</header>
<body>
  <?php

  // Réessayer
  echo "<section><form method='POST' action='../Recherche/trouverf.php'>";
  echo "<p><input type='submit' value='Rechercher'></p></div></form>";

  // Revenir a l'accueuil
  echo "<form method='POST' action='../accueil/accueil.php'>";
  echo "<p><input type='submit' value='Accueil'></p></div></form></section>";


    $var = $_GET['nomgenre'];
    $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');

    //
    // $result = $file_db->query("SELECT * FROM Films NATURAL JOIN Classification NATURAL JOIN Genres
    //   WHERE nom_genre='$var' and code_genre=ref_code_genre and ref_code_film=code_film ;");

  echo"<section>";
    $g=$file_db->query("SELECT code_genre FROM Genres WHERE nom_genre = '$var'");
    $donne = $g->fetch();
    $fg=$file_db->query("SELECT ref_code_film FROM Classification WHERE ref_code_genre =$donne[0];");
    echo "<h2> Les films de genre << $var >> sont : </h2><br> ";

    foreach($fg as $tonfilm){
      $result=$file_db->query("SELECT * FROM Films WHERE code_film = $tonfilm[0] ;");
      foreach($result as $lefilm){
        if($donne[0] == " "){
          echo " Aucun resultat trouvé pour votre recherche";
        }
        else{
            echo "<ol><li>  $lefilm[1]</li><br>";
            # code...
        }
        echo "</ol>";
      }
    }
  echo"</section>";

  ?>
</body>
<footer> <p>     Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI     </p> </footer>
</html>
