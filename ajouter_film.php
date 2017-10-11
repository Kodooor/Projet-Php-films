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
		"name"=>"code",
		"text" => "code_film"
	),
  array(
		"type"=>"text",
		"name"=>"titreO",
		"text" => "titre_original"
	),
  array(
		"type"=>"text",
		"name"=>"titreFr",
		"text" => "titre_francais"
	),
  array(
		"type"=>"text",
		"name"=>"Pays",
		"text" => "pays"
	),
  array(
		"type"=>"text",
		"name"=>"Date",
		"text" => "date"
	),
  array(
		"type"=>"text",
		"name"=>"Duree",
		"text" => "duree"
	),
  array(
		"type"=>"text",
		"name"=>"Couleur",
		"text" => "couleur"
	),
  array(
		"type"=>"text",
		"name"=>"Réalisateur",
		"text" => "realisateur"
	),
  array(
		"type"=>"text",
		"name"=>"Image",
		"text" => "image"
	)
];



  function question_text($q){
    echo ("<p>" . $q["text"] . "</br><input type ='text' name='$q[name]'>" . "</p>");
  }

  function question_select($q){
    $html = "<p>" . $q["text"];
    $i = 0;
    $html .= "<select name='$q[name]'>";
    foreach ($q["choices"] as $c){
      //<option value="chine">Chine</option>
      $i +=1;
      $html .= "<option value='$c[text]'>$c[text]</option>";
    }
    $html .= "</select></p>";
    echo $html;
  }

  $question_handlers = array(
    "text" => "question_text"
  );


  	echo "<form method='POST' action='film_ajouter.php'><ol>";
    echo " Veuillez insérer les infos du film : ";

    foreach ($ajoute as $a){
      $question_handlers[$a["type"]]($a);
    }
    echo "<ol>";

  ?>
  <?php
  try{
    function ajouter_un_film(){
      $file_db = new PDO("sqlite:listeFilms.sqlite");
      $insert = "INSERT INTO Films (code_film,titre_original,titre_francais, pays, date,
duree, couleur, realisateur,image)
                 VALUES (:code_film,:titre_original,:titre_francais,:pays,:date,:duree,
:couleur,:realisateur,:image)";

        $stmt = $file_db->prepare($insert);
        $stmt->bindParam(':code_film',$_GET["code"]);
        $stmt->bindParam(':titre_original', $_GET["titreO"]);
        $stmt->bindParam(':titre_francais', $_GET["titreFr"]);
        $stmt->bindParam(':pays', $_GET["Pays"]);
        $stmt->bindParam(':date', $_GET["Date"]);
        $stmt->bindParam(':duree', $_GET["Duree"]);
        $stmt->bindParam(':couleur', $_GET["Couleur"]);
        $stmt->bindParam(':realisateur', $_GET["Réalisateur"]);
        $stmt->bindParam(':image', $_GET["Image"]);
        $stmt->execute();
        echo $_GET["code"];
        echo "<form action='ajouter_film.php'><br>";
        echo "<input type='submit' value='ajouter_film'></form>";
    }

    ajouter_un_film();
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }


   ?>
  </body>
  </html>
