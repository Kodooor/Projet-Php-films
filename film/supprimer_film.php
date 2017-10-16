<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="../CSS/supprimer_film.css"/>
</head>
<header>
  <form method='POST' action='../accueil/accueil.php'>
  <input type="image" src='../titleB.png' style='width:300px;height:140px;'>
  </form>
</header>
<body>
<?php

$sup=[
	array(
		"type"=>"text",
		"name"=>"code_film",
		"text" => "Film n° :"

	)];


  function question_text($q){
    echo ($q["text"] . "<input id='barretext' type ='text' name='$q[name]'>" . "<br>");
  }

  $question_handlers = array(
    "text" => "question_text"
  );


  	echo "<form method='POST' action='../film/film_supprimer.php'><ol>";
    echo " <p id='veuillez'> Veuillez insérer le code du film que vous souhaitez supprimer </p>";

    echo "<section id=supp>";
    foreach ($sup as $a){
      $question_handlers[$a["type"]]($a);
    }

    echo "<input id='submit' type='submit' value='Supprimer le film'></form>";

    echo "</section>";
  ?>

  </body>
  </html>
