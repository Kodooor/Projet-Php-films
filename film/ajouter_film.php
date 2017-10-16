<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/ajouter.css"/>
</head>
<header>
  <form method='POST' action='../accueil/accueil.php'>
  <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
  </form>
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
    echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]' required placeholder='Champ vide' >" . "</p>");
  }

  $question_handlers = array(
    "text" => "question_text"
  );

  	echo "<form method='GET' action='film_ajouter.php'><ol>";
    echo " <h2>Veuillez insérer les infos du film : </h2>";

    foreach ($ajoute as $a){
      $question_handlers[$a["type"]]($a);
    }
    echo "<input id='submit' type='submit' value='Ajouter'></form>";
    echo "<br>";
    echo "<input id='submit' type='reset' value='Remettre à zero'></ol>";
  ?>

  </body>
  </html>
