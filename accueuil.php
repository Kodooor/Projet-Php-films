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

  echo "</ol>";

  //Rechercher un film

  echo "<div id='rechercher'>";

  echo "<form method='POST' action='accueuil.php'>";

  echo "Titre:" . " <input type ='text' name='Rechercher'>";

  echo "<input type='submit' value='Rechercher'></form></div>";

   ?>

</header>
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
  echo "<aside>";
  echo "<form method='POST' action='ajouter_film.php'>";
  echo "<input type='submit' value='Ajouter un film'></form>". "<br><br>";

  // Supprimer film

  echo "<form method='POST' action='supprimer_film.php'>";
  echo "<input type='submit' value='Supprimer un film'></form>". "<br>";
  echo "</aside>";



?>
</body>
</html>
