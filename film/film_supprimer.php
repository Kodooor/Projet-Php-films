<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/film_supprimer.css"/>
</head>
<header>
  <header>
    <form method='POST' action='../accueil/accueil.php'>
    <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
    </form>
  </header>
</header>
<body>
<?php

  try{
    function supprimer_un_membre(){
      $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
      $recherche = $_POST['code_film'];
      $delete = "DELETE FROM Films WHERE code_film = '$recherche'";
      $stmt = $file_db->prepare($delete);
      $stmt->execute();

    }
    supprimer_un_membre();
    echo "<p> Vous avez supprimé le film ! </p>";
  }
  catch(PDOException $e){
    echo $e->POSTMessage();
    echo "<p> Aucun film trouvé ! </p>";
  }


echo "<form method='POST' action='../accueil/accueil.php'><ol>";
echo "<input id=submit type='submit' value='Retourner accueil'></form>";



?>
</body>
</html>
