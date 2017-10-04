<!doctype html>
<html>
<head>
<title>Search Film</title>
<link rel="stylesheet" href="accueuil.css"/>
</head>
<header>
  <h1>Search Film </h1>
  <?php
  $theme=["Action"," Comédie","Drame", "Fiction","Horreur","Romance","Thriller"];
  $criteres=[
    array(
      "type" => "text",
      "name" => "recherchertitre",
      "text" => "Rechercher avec le titre :",
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

  echo "<form method='POST' action='accueuil.php'><ol>";

  echo "<div id='rechercher'>";

  foreach($criteres as $c){
    $question_handlers[$c["type"]]($c);}

  echo "<input type='submit' value='Rechercher'></div>";

   ?>

</header>
<body>
<?php
$tri=[
  array(
    "type" => "select",
    "name" => "trier",
    "text" => "Trier par  ",
    "choices" => [
  	   array(
  		      "name"=>"titre",
  		      "text" => "Titre"
  	       ),
        array(
  		      "name"=>"annee",
  		      "text" => "Année de réalisations"
  	           ),
        array(
  		       "name"=>"realisateur",
  		       "text" => "Réalisateur"
  	        ),
        array(
  		       "name"=>"genre",
  		       "text" => "Genre"
  	        )
  ])
];

function question_select($q){
  $html = "<p>" . $q["text"];
  $i = 0;
  $html .= "<select name='$q[name]'>";
  foreach ($q["choices"] as $c){
    //<option value="chine">Chine</option>
    $i +=1;
    $html .= "<option value='$c[name]'>$c[text]</option>";
  }
  $html .= "</select></p>";
  echo $html;
}

// redirection des pages par les boutons


// if ($_SERVER["REQUEST_METHOD"]=="GET"){




  // Ajouter

  echo "<form method='POST' action='ajouter_film.php'><ol>";
  echo "<input type='submit' value='Ajouter un film'></form>". "<br>";


  // Supprimer film

  echo "<form method='POST' action='supprimer_film.php'><ol>";
  echo "<input type='submit' value='Supprimer un film'></form>". "<br>";



  //Trier les films
  foreach ($tri as $t){
    $question_handlers[$t["type"]]($t);
  }




?>
</body>
</html>
