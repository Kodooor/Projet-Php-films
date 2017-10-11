<!doctype html>
<html>
<head>
<title>Search Film</title>
</head>
<header>
  <h1><img src="title.png" alt="Search film" style="width:150px;height:70px;"></h1>
</header>
<body>
<?php

  try{
    function supprimer_un_membre(){
      $file_db = new PDO('sqlite:BD/listeFilms.sqlite');
      $recherche = $_POST['code_film'];
      $delete = "DELETE FROM Films WHERE code_film = '$recherche'";
      $stmt = $file_db->prepare($delete);
      $stmt->execute();

    }
    supprimer_un_membre();
  }
  catch(PDOException $e){
    echo $e->POSTMessage();
  }


echo "Vous avez supprimé le film ! ";
echo "<form method='POST' action='accueil.php'><ol>";
echo "<input type='submit' value='Accueil'></form>";

echo "<form method='POST' action='accueil.php'><ol>";
echo "<input type='submit' value='Accueil'></form>";


?>
</body>
</html>
