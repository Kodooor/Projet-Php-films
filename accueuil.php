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
$theme=["Action"," Comédie","Drame", "Fiction","Horreur","Romance","Thriller"];
$criteres=[
  array(
    "type" => "text",
    "name" => "recherchertitre",
    "text" => "Rechercher avec le titre :",
  )
];



function question_text($q){
  echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]'>" . "</p>");
}

$question_handlers = array(
  "text" => "question_text"
);


// Bouton de recherche Film


if ($_SERVER["REQUEST_METHOD"]=="GET"){
  
	echo "<form method='POST' action='accueuil.php'><ol>";


  echo "Trouver film";
  // echo "<form method='POST' action='accueuil.php'>";
  foreach ($criteres as $c){
    $question_handlers[$c["type"]]($c);
  }
  echo "<div><input type='submit' value='Rechercher'></div>";

  echo "<ol>";
  foreach($theme as $t){
    echo "<li><input type='submit' value=$t ></li>";
  }
  echo "</ol>";
}
  else{
  	echo "" ;
  }


// Ajouter + Supprimer film

if ($_SERVER["REQUEST_METHOD"]=="GET"){
	// echo "<form method='POST' action='ajouter_film.php'>";
  //
  // echo "Ajouter film";
  // echo "<input type='submit' value='Ajouter'>";

  echo "<form method='POST' action='ajouter_film.php'><ol>";

  echo "Ajouter film";


  echo "<div><input type='submit' value='Ajouter'></div>";
}
else{
    echo "<form method='POST' action='ajouter_film.php'>";
}







  //
  // echo "<input type='submit' value='Supprimer'></div>";



?>
</body>
</html>
