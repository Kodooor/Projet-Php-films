<!doctype html>
<html>
<head>
<title>Search Film</title>
</head>
<header>
  <h1><img src="../title.png" alt="Search film" style="width:150px;height:70px;"></h1>
</header>
<body>
<?php

$ajoute=[
  array(
		"type"=>"text",
		"name"=>"titre",
		"text" => "Titre original"
	),
  array(
		"type"=>"text",
		"name"=>"titreFr",
		"text" => "Titre français"
	),
  array(
		"type"=>"text",
		"name"=>"Pays",
		"text" => "Pays"
	),
  array(
		"type"=>"text",
		"name"=>"Date",
		"text" => "Date (année)"
	),
  array(
		"type"=>"text",
		"name"=>"Duree",
		"text" => "Durée (minutes)"
	),
  array(
		"type"=>"text",
		"name"=>"Couleur",
		"text" => "Couleur"
	),
  array(
		"type"=>"text",
		"name"=>"Réalisateur",
		"text" => "Réalisateur (numéro)"
	),
  array(
		"type"=>"text",
		"name"=>"Image",
		"text" => "Image (NB.jpeg) "
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
    echo "<input type='submit' value='Ajouter'></form></ol>";

    echo "<form method='POST' action='../accueil/accueil.php'><ol>";
    echo "<input type='submit' value='Accueil'></form>";
  ?>

  </body>
  </html>
