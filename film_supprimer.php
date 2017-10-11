<!doctype html>
<html>
<head>
<title>Search Film</title>
</head>
<header>
  <h1>Search Film </h1>
</header>
<body>
<?php

  try{
    function supprimer_un_membre(){
      $file_db = new PDO("sqlite:listeFilms.sqlite");
      $recherche = $_POST['code_film'];
        $delete = "DELETE FROM Films WHERE code_film = '$recherche'";
        $stmt = $file_db->prepare($delete);
        $stmt->execute();
        echo "<form action='film_supprimer.php'><br>";
        echo "<input type='submit' value='film_supprimer'></form>";
    }
    supprimer_un_membre();
  }
  catch(PDOException $e){
    echo $e->POSTMessage();
  }


echo "Vous avez supprimé le film ! ";
echo "<form method='POST' action='accueil.php'><ol>";
echo "<input type='submit' value='Accueil'></form>";


?>
</body>
</html>
