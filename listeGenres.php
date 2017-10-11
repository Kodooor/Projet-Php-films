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
    $file_db = new PDO('sqlite:BD/listeGenres.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS Genres(
      code_genre INTEGER,
      nom_genre TEXT
    )"
  );

    // $lines = file('genres.txt');
    // foreach ($lines as $lineContent)
    // {
    // 	echo "array" . $lineContent . "<br>";
    // }
    $genres_test = array(
      array(26, 'à l\'antique '),
array(4, 'c\'était demain '),
array(5, 'pas drôle mais beau '),
array(6, 'pauvre espèce humaine '),
array(10, 'jeu dans le jeu '),
array(15, 'poésie en image '),
array(11, 'en France profonde '),
array(7, 'du rire aux larmes (et retour) '),
array(28, 'docu '),
array(17, 'les chocottes à zéro '),
array(19, 'la parole est d\'or '),
array(20, 'Paris '),
array(14, 'culte ou my(s)tique '),
array(13, 'pour petits et grands enfants '),
array(9, 'en avant la musique '),
array(23, 'Los Angeles & Hollywood '),
array(3, 'cadavre(s) dans le(s) placard(s) '),
array(21, 'vive la (critique) sociale ! '),
array(22, 'épique pas toc '),
array(27, 'du Moyen-Age à 1914 '),
array(12, 'New-York '),
array(1, 'heurs et malheurs à deux '),
array(30, 'Bollywooderie '),
array(16, 'conte de fées relooké '),
array(25, 'entre Berlin et Moscou '),
array(8, 'portrait d\'époque (après 1914) '),
array(2, 'carrément à l\'ouest '),
array(29, 'vers le soleil levant '),
array(24, 'perle de nanard ')
    );
    $insert = "INSERT INTO Genres (code_genre, nom_genre)
    VALUES (:code_genre,:nom_genre)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_genre', $code_genre);
    $stmt->bindParam(':nom_genre', $nom_genre);

    foreach($genres_test as $c){
      $code_genre = $c[0];
      $nom_genre = $c[1];
      $stmt->execute();
    }
    echo "Les genres" . "<br>";
    $result = $file_db->query('SELECT * FROM Genres;');

    foreach($result as $m){
      echo $m[0] . ' ' . $m[1] . ' ' . "<br>";
    }
    $file_db = null;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
?>
</body>
</html>
