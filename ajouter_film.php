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

$ajoute=[
	array(
		"type"=>"text",
		"name"=>"code",
		"text" => "code_film"
	),
  array(
		"type"=>"text",
		"name"=>"titre",
		"text" => "titre_original"
	),
  array(
		"type"=>"text",
		"name"=>"titreFr",
		"text" => "titre_francais"
	),
  array(
		"type"=>"text",
		"name"=>"Pays",
		"text" => "pays"
	),
  array(
		"type"=>"text",
		"name"=>"Date",
		"text" => "date"
	),
  array(
		"type"=>"text",
		"name"=>"Duree",
		"text" => "duree"
	),
  array(
		"type"=>"text",
		"name"=>"Couleur",
		"text" => "couleur"
	),
  array(
		"type"=>"text",
		"name"=>"Réalisateur",
		"text" => "realisateur"
	),
  array(
		"type"=>"text",
		"name"=>"Image",
		"text" => "image"
	)
];



  function question_text($q){
    echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]'>" . "</p>");
  }

  $question_handlers = array(
    "text" => "question_text"
  );




  	echo "<form method='POST' action='film_ajouter.php'><ol>";
    echo " Veuillez insérer les infos du film : ";

    foreach ($ajoute as $a){
      $question_handlers[$a["type"]]($a);
    }
    echo "</ol>";
    echo "<input type='submit' value='Ajouter'></form>";
  ?>

  </body>
  </html>
