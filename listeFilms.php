<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet"/>
  <title> SQLite_listeFilms </title>
</head>
<body>
<?php
  try{
    $file_db = new PDO('sqlite:listeFilms.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS Films(
      'code_film' int(11) NOT NULL,
      `titre_original' varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
      `titre_francais' varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
      'pays' varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
      'date' int(11) DEFAULT NULL,
      'duree' int(11) DEFAULT NULL,
      'couleur' varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
      'realisateur' int(11) DEFAULT NULL,
      'image' varchar(20))"
    );

    $films_test = array(
      array()
    );
    $insert = "INSERT INTO Films ('code_film', 'titre_original',
'titre_francais', 'pays', 'date', 'duree', 'couleur', 'realisateur',
 'image') VALUES (:code_film,:titre_original,:titre_francais,:pays,:date,:duree,
 :couleur,:realisateur)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_film', $code_film);
    $stmt->bindParam(':titre_original', $titre_original);
    $stmt->bindParam(':titre_francais', $titre_francais);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':realisateur', $realisateur);
    $stmt->bindParam(':image', $image);

    foreach($films_test as $c){
      $code_film = $c['code_film'];
      $titre_original = $c['titre_original'];
      $titre_francais = $c['titre_francais'];
      $pays = $c['pays'];
      $date = $c['date'];
      $duree = $c['duree'];
      $couleur = $c['couleur'];
      $realisateur = $c['realisateur'];
      $image = $c['image'];

      $stmt->execute();
    }
    echo "Quelques films";
    $result = $file_db->query('SELECT * FROM Films;');

    foreach($result as $m){
      echo $m['code_film'] . ' ' . $m['titre_original'] . ' ' .
      $m['titre_francais'] . ' ' . $m['pays'] . ' ' . $m['date'] . ' ' .
      $m['duree'] . ' ' . $m['couleur'] . ' ' . $m['realisateur'] . ' ' . $m['image'] . "<br>";
    }
    $file_db = null;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
?>
</body>
</html>
