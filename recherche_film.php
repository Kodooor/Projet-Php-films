<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/accueil.css" />
  <title> Filleul and Co </title>
</head>
<body>
  <?php
    $var = $_GET['nomfilm'];
    echo $var;
    // $idgenre = $file_db->query("SELECT ref_code_genre FROM Genres WHERE nom_genre = '$var';");
    //
    // $idfilmdugenre = $file_db->query("SELECT ref_code_film FROM Classification WHERE ref_code_genre = '$idgenre';");
    //
    // $idfilm = $file_db->query("SELECT * FROM Films WHERE code_film = '$idfilmdugenre';");

  ?>
</body>
</html>
