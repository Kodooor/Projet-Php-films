<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/ajouter.css"/>
</head>
<header>
  <img src="../titleB.png" alt="Search film" style="width:300px;height:140px;">
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
    echo "<input id='submit' type='submit' value='Ajouter'></form>";

    echo "<form method='POST' action='../accueil/accueil.php'>";
    echo "<input id='submit' type='submit' value='Accueil'></form></ol>";
  ?>

  </body>
  </html>
