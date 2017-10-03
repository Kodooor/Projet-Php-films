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
  "text" => "question_text",
);

  echo "<form method='POST' action='accueuil.php'>";
  foreach ($criteres as $c){
    $question_handlers[$c["type"]]($c);
  }
  echo "<div><input type='submit' value='Rechercher'></div>";
?>
</body>
</html>
