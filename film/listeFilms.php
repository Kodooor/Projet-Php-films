<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href=""/>
  <title> SQLite_listeFilms </title>
</head>
<body>
  <header>
    <h1><img src="title.png" alt="Search film" style="width:150px;height:70px;"></h1>
  <?php
  $file_db = new PDO('sqlite:../../BD/BD_PROJET.sqlite');
  $result = $file_db->query('SELECT * FROM Films;');


  //Revenir à l'accueil
  echo "<form method='POST' action='../accueil/accueil.php'><ol>";
  echo "<input type='submit' value='Accueil'></form><br>";



  //Affichage des films
  foreach ($result as $film) {
    echo "<br> Le film n°$film[0] s'appelle $film[1]<br>";
  }
  echo "</ol>";


//     $criteres=[
//       array(
//         "type" => "text",
//         "name" => "recherchertitre",
//         "text" => "Titre:",
//       )
//     ];
//
//     function question_text($q){
//       echo ("<p>" . $q["text"] . "<input type ='text' name='$q[name]'>" . "</p>");
//     }
//
//     $question_handlers = array(
//       "text" => "question_text",
//       "select" => "question_select"
//     );
//
//     //Rechercher un film
//
//     echo "<div id='rechercher'>";
//
//     echo "<form method='POST' action='accueuil.php'><ol>";
//
//     echo "Titre:" . " <input type ='text' name='Rechercher'>";
//
//     echo "<input type='submit' value='Rechercher'></div></form>";
//
// // PARTIE TRIE + FILMS
//
// $tri=[
//   array(
//     "type" => "select",
//     "name" => "trier",
//     "text" => "Trier par  ",
//     "choices" => [
//   	   array(
//   		      "name"=>"titre",
//   		      "text" => "Titre"
//   	       ),
//         array(
//   		      "name"=>"annee",
//   		      "text" => "Année de réalisations"
//   	           ),
//         array(
//   		       "name"=>"realisateur",
//   		       "text" => "Réalisateur"
//   	        ),
//         array(
//   		       "name"=>"genre",
//   		       "text" => "Genre"
//   	        )
//   ])
// ];

    $file_db = null;
  // }
  // echo "</div>";
?>
</body>
</html>
