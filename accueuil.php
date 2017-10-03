<!doctype html>
<html>
<head>
<title>Search Film</title>
</head>
<header>
  <h1>Search Film </h1>
</header>
<body>
<h2> Trouver un film :</h2>
<?php
$criteres=[
  array(
    "type" => "text",
    "name" => "recherchertitre",
    "text" => "Rechercher via le titre",
  ),
  array(
    "type" => "radio",
    "name" => "critere",
    "choices" => [
      array(
        "text" => "Action",
        "value" => "action"),
      array(
        "text" => "Drame",
        "value" => "drame"),
      array(
        "text" => "Comedie",
        "value" => "comedie"),
      array(
        "text" => "Fiction",
        "value" => "fiction"),
      array(
        "text" => "Horreur",
        "value" => "horreur"),
      array(
        "text" => "Thriller",
        "value" => "thriller"),
      array(
        "text" => "Romance",
        "value" => "romance"),
      ]
  )
];

function question_text($q){
  echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]'>" . "</p>");
}

function question_radio($q){
  $html = "";
  $i = 0;
  foreach ($q["choices"] as $c){
    $i +=1;
    $html .= "<input type='radio' name='$q[name]' id='$q[name]-$i'>";
    $html .= "<label for='$q[name]-i'>$c[text]</label>";
    $html .= "<br>";
  }
  $html .= "</p>";
  echo $html;
}


$question_handlers = array(
  "radio" => "question_radio",
  "text" => "question_text"
);

  echo "<form method='POST' action='accueuil.php'>";
  foreach ($criteres as $c){
    $question_handlers[$c["type"]]($c);
  }
  echo "<div><input type='submit' value='Rechercher'></div>";
?>
</body>
</html>
