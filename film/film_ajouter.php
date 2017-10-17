<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/film_supprimer.css"/>
</head>
<header>
  <form method='POST' action='../accueil/accueil.php'>
  <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
  </form>
</header>
<body>
<?php
try{
  function ajouter_un_film(){
    $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
    $requete_code = $file_db->query("SELECT max(code_film) FROM Films");
    $donnees = $requete_code->fetch();
    $insert = "INSERT INTO Films (code_film,titre_original,titre_francais, pays, date,
duree, couleur, realisateur,image)
               VALUES (:code_film,:titre_original,:titre_francais,:pays,:date,:duree,
:couleur,:realisateur,:image)";

      $stmt = $file_db->prepare($insert);
      $stmt->bindValue(':code_film',$donnees[0] + 1);
      $stmt->bindParam(':titre_original', $_POST["titre"]);
      $stmt->bindParam(':titre_francais', $_POST["titreFr"]);
      $stmt->bindParam(':pays', $_POST["Pays"]);
      $stmt->bindParam(':date', $_POST["Date"]);
      $stmt->bindParam(':duree', $_POST["Duree"]);
      $stmt->bindParam(':couleur', $_POST["Couleur"]);
      $stmt->bindParam(':realisateur', $_POST["Réalisateur"]);
      $stmt->bindValue(':image', "NB.jpg");
      $stmt->execute();

  }
  ajouter_un_film();
  echo "<p> Vous avez ajouté le film ! </p>";
}
catch(PDOException $e){
  echo $e->POSTMessage();
  echo "L'ajout a échoué ! ";
}

echo "<form method='POST' action='../accueil/accueil.php'><ol>";
echo "<input id=submit type='submit' value='Retour Accueil'></form><br>";





?>
<footer>      Juliette DUBERNET     |     Sofiane FITTIPALDI     |     Omayma OUGOUTI      </footer>

</body>
</html>
