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

$sup=[
	array(
		"type"=>"text",
		"name"=>"titre",
		"text" => "Titre"
	// ),
  // array(
	// 	"type"=>"text",
	// 	"name"=>"annee",
	// 	"text" => "Année de réalisations"
	// ),
  // array(
	// 	"type"=>"text",
	// 	"name"=>"realisateur",
	// 	"text" => "Réalisateur"
	// ),
  // array(
	// 	"type"=>"text",
	// 	"name"=>"genre",
	// 	"text" => "Genre"
	)];



  function question_text($q){
    echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]'>" . "</p>");
  }

  $question_handlers = array(
    "text" => "question_text"
  );


  	echo "<form method='POST' action='film_supprimer.php'><ol>";
    echo " Veuillez insérer le titre du film : ";

    foreach ($sup as $a){
      $question_handlers[$a["type"]]($a);
    }
    echo "<input type='submit' value='Supprimer'></form>";
    echo "<ol>";






  ?>
  </body>
  </html>
