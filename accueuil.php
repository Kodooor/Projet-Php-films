<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="accueuil.css"/>
</head>
<body>
<header>
  <h1><img src="title.png" alt="Search film" style="width:150px;height:70px;"></h1>
  <?php
  $theme=["Action"," Comédie","Drame", "Fiction","Horreur","Romance","Thriller"];
  $criteres=[
    array(
      "type" => "text",
      "name" => "recherchertitre",
      "text" => "Titre:",
    )
  ];

  function question_text($q){
    echo ("<p>" . $q["text"] . "<input type ='text' name='$q[name]'>" . "</p>");
  }

  $question_handlers = array(
    "text" => "question_text",
    "select" => "question_select"
  );


  //Boutons recherches
    echo "<ol>";

    foreach($theme as $t){
    echo "<li><input type='submit' value=$t ></li>";
  }

  echo "</ol></form>";

  //Rechercher un film

  echo "<div id='rechercher'>";

  echo "<form method='POST' action='accueuil.php'><ol>";

  echo "Titre:" . " <input type ='text' name='Rechercher'>";

  echo "<input type='submit' value='Rechercher'></div></form>";

   ?>

</header>
<?php


// redirection des pages par les boutons


// if ($_SERVER["REQUEST_METHOD"]=="GET"){




  // Ajouter
  echo "<aside>";
  echo "<form method='POST' action='ajouter_film.php'><ol>";
  echo "<input type='submit' value='Ajouter un film'></form>". "<br>";



  // Supprimer film

  echo "<form method='POST' action='supprimer_film.php'><ol>";
  echo "<input type='submit' value='Supprimer un film'></form>". "<br>";
  echo "</aside>";





?>
</body>
</html>
