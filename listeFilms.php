<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="header.css"/>
  <title> SQLite_listeFilms </title>
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
// PARTIE TRIE + FILMS

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


echo "<div id='trier' >";

//Trier les films
foreach ($tri as $t){
  $question_handlers[$t["type"]]($t);




}
echo "</div>";




  try{
    $file_db = new PDO('sqlite:listeFilms.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS Films(
      code_film INTEGER,
      titre_original TEXT,
      titre_francais TEXT,
      pays TEXT,
      date INTEGER,
      duree INTEGER,
      couleur TEXT,
      realisateur INTEGER,
      image TEXT
    )"
    );
    // $lines = file('films.txt');
    // foreach ($lines as $lineContent)
    // {
    // 	echo "array" . $lineContent . "<br>";
    // }



    $films_test = array
);
    $insert = "INSERT INTO Films (code_film,titre_original,
titre_francais, pays, date, duree, couleur, realisateur,image)
VALUES (:code_film,:titre_original,:titre_francais,:pays,:date,:duree,
 :couleur,:realisateur,:image)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_film', $code_film);
    $stmt->bindParam(':titre_original', $titre_original);
    $stmt->bindParam(':titre_francais', $titre_francais);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':realisateur', $realisateur);
    $stmt->bindParam(':image', $image);

    foreach($films_test as $c){
      $code_film = $c[0];
      $titre_original = $c[1];
      $titre_francais = $c[2];
      $pays = $c[3];
      $date = $c[4];
      $duree = $c[5];
      $couleur = $c[6];
      $realisateur = $c[7];
      $image = $c[8];
      $stmt->execute();
    }
    echo "Quelques films". "<br>";
    $result = $file_db->query('SELECT * FROM Films;');

    echo "<div id='tous' >";
    foreach($result as $m){
      echo "<div id='film'>" . $m[0] . ' ' . $m[1] . ' ' .
      $m[2] . ' ' . $m[3] . ' ' . $m[4] . ' ' .
      $m[5] . ' ' . $m[6] . ' ' . $m[7] . ' ' . $m[8] . "<br>". "</div>";
    }
    $file_db = null;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  echo "</div>";
?>
</body>
</html>
