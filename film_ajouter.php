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
  function ajouter_un_film(){
    $file_db = new PDO("sqlite:listeFilms.sqlite");
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
}
catch(PDOException $e){
  echo $e->POSTMessage();
}
echo "Vous avez ajouté le film ! ";
echo "<form method='POST' action='accueil.php'><ol>";
echo "<input type='submit' value='Accueil'></form></ol>";

echo "<form method='POST' action='accueil.php'><ol>";
echo "<input type='submit' value='Accueil'></form>";





?>
</body>
</html>
