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
		"name"=>"titre",
		"text" => "Titre"
	),
  array(
		"type"=>"text",
		"name"=>"annee",
		"text" => "Année de réalisations"
	),
  array(
		"type"=>"text",
		"name"=>"realisateur",
		"text" => "Réalisateur"
	),
  array(
		"type"=>"text",
		"name"=>"genre",
		"text" => "genre"
	)];



  function question_text($q){
    echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]'>" . "</p>");
  }

  $question_handlers = array(
    "text" => "question_text"
  );


  foreach($ajoute as $a){
    echo "<li>";
    $question_handlers[$a["type"]($a)];
  }
  echo "</ol><input type='submit' value='Ajouter Q'>";


  ?>
  </body>
  </html>
