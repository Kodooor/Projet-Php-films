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
    $file_db = new PDO('sqlite:../BD/listeFilms.sqlite');
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



    $films_test = array(
      array(193, 'One, Two, Three ', 'Un, deux, trois ', 'USA ', 1961, 115, 'NB ', 10, '1_2_3.gif '),
array(190, 'Caro diario ', 'Journal intime ', 'Italie ', 1994, 100, 'couleur ', 394, 'journal_intime.gif '),
array(328, 'Little Big Man ', 'Little Big Man ', 'USA ', 1970, 139, 'couleur ', 607, 'little_big_man.jpg '),
array(248, 'Blind Husbands ', 'Maris aveugles ', 'USA ', 1919, 68, 'NB ', 279, 'maris_aveugles.jpg '),
array(530, 'E.T.: The Extra-Terrestrial ', 'E.T. : L Extra-Terrestre ', 'USA ', 1982, 115, 'couleur ', 203, 'E_T.jpeg '),
array(202, 'Rio Bravo ', 'Rio Bravo ', 'USA ', 1959, 141, 'couleur ', 112, 'rio_bravo.gif '),
array(101, 'Nosferatu, eine Symphonie des Grauens ', 'Nosferatu ', 'Allemagne ', 1922, 94, 'NB ', 233, 'nosferatu.jpg '),
array(213, 'African Queen (The) ', 'African Queen (The) ', 'USA ', 1951, 103, 'couleur ', 371, 'african_queen.gif '),
array(403, 'Laura ', 'Laura ', 'USA ', 1944, 88, 'NB ', 336, 'laura.jpeg '),
array(228, 'Maltese Falcon (The) ', 'Faucon maltais (Le) ', 'USA ', 1941, 101, 'NB ', 371, 'faucon_maltais.gif '),
array(529, 'Rumble Fish ', 'Rusty James ', 'USA ', 1983, 94, 'NB/couleur', 405, 'rusty_james.jpeg '),
array(476, 'Big Fish ', 'Big Fish ', 'USA ', 2003, 125, 'couleur ', 216, 'big_fish.jpg '),
array(18, 'Twelve Monkeys ', 'Armée des 12 singes (L ) ', 'USA ', 1995, 125, 'couleur ', 24, 'armee_12_singes.jpg '),
array(185, 'Gendarme de St Tropez (Le) ', 'Gendarme de St Tropez (Le) ', 'France ', 1964, 92, 'NB/couleur', 384, 'gendarme.gif '),
array(320, 'Cardinal (The) ', 'Cardinal (Le) ', 'USA ', 1963, 175, 'couleur ', 336, 'cardinal.jpg '),
array(459, 'Magliari (I) ', 'Profession: magliari ', 'Italie ', 1959, 111, 'NB ', 187, 'magliari.jpeg '),
array(212, 'Enfants terribles (Les) ', 'Enfants terribles (Les) ', 'France ', 1950, 105, 'NB ', 447, 'enfants_terr.jpg '),
array(62, 'Humanité (L ) ', 'Humanité (L ) ', 'France ', 1999, 148, 'couleur ', 157, 'humanite.jpg '),
array(2, 'Johnny Guitar ', 'Johnny Guitar ', 'USA ', 1954, 105, 'couleur ', 8, 'johnny_guitar.jpg '),
array(51, 'Sommaren met Monika ', 'Monika ', 'Suède ', 1953, 96, 'NB ', 93, 'monika.gif '),
array(311, 'Tè nel deserto (Il) ', 'Thé au Sahara (Un) ', 'Italie ', 1990, 138, 'couleur ', 591, 'the_Sahara.jpg '),
array(105, 'Parade ', 'Parade ', 'France ', 1974, 84, 'couleur ', 14, 'parade.jpg '),
array(56, 'Annie Hall ', 'Annie Hall ', 'USA ', 1977, 93, 'couleur ', 139, 'annie_hall.jpg '),
array(182, 'Casino Royale ', 'Casino Royale ', 'USA ', 1967, 131, 'couleur ', 371, 'casino_royale.gif '),
array(531, 'Killing (The) ', 'Ultime razzia ', 'USA ', 1956, 85, 'NB ', 18, 'ultime_razzia.jpeg '),
array(563, 'Alice ', 'Alice ', 'USA ', 1990, 102, 'couleur ', 139, 'alice.jpeg '),
array(158, 'Angel Face ', 'Si doux visage (Un) ', 'USA ', 1952, 91, 'NB ', 336, 'doux_visage.gif '),
array(225, 'L.A. Confidential ', 'L.A. Confidential ', 'USA ', 1997, 138, 'couleur ', 476, 'LA_conf.jpg '),
array(223, 'Invasions barbares (Les) ', 'Invasions barbares (Les) ', 'Canada ', 2003, 112, 'couleur ', 395, 'invasion_bar.jpg '),
array(204, 'Fitzcarraldo ', 'Fitzcarraldo ', 'Allemagne ', 1982, 158, 'couleur ', 422, 'fitzcarraldo.gif '),
array(195, 'Man Who Shot Liberty Valance (The) ', 'Homme qui tua Liberty Valance (L ) ', 'USA ', 1962, 123, 'NB ', 401, 'hom_tua_Liberty.gif '),
array(117, 'Crimes and Misdemeanors ', 'Crimes et délits ', 'USA ', 1989, 107, 'couleur ', 139, 'crimes_delits.gif '),
array(342, 'Fabuleux destin d Amélie Poulain (Le) ', 'Fabuleux destin d Amélie Poulain (Le) ', 'France ', 2001, 129, 'couleur ', 633, 'amelie_poulain.jpg '),
array(42, 'Made in USA ', 'Made in USA ', 'France ', 1966, 91, 'couleur ', 13, 'made_in_USA.jpg '),
array(218, 'Frankenstein ', 'Frankenstein ', 'USA ', 1931, 71, 'NB ', 461, 'Frankenstein.jpg '),
array(36, 'Barefoot Contessa (The) ', 'Comtesse aux pieds nus (La) ', 'USA ', 1954, 125, 'couleur ', 100, 'comtesse.jpeg '),
array(498, 'Année dernière à Marienbad (L ) ', 'Année dernière à Marienbad (L ) ', 'France ', 1961, 94, 'NB ', 132, 'annee_marienbad.jpg '),
array(74, 'French Lieutenant s Woman (The) ', 'Maîtresse du Lieutenant français (La) ', 'Angleterre ', 1981, 127, 'couleur ', 184, 'lieutenant_fr.gif '),
array(187, 'Pépé le Moko ', 'Pépé le Moko ', 'France ', 1937, 90, 'NB ', 389, 'pepe_moko.gif '),
array(29, 'Chong qing sen lin ', 'Chungking Express ', 'Chine-Hong-Kong ', 1994, 100, 'couleur ', 90, 'chungking_expr.gif '),
array(448, '39 Steps (The) ', '39 marches (Les) ', 'Angleterre ', 1935, 86, 'NB ', 26, '39marches.jpeg '),
array(39, 'Eyes Wide Shut ', 'Eyes Wide Shut ', 'USA ', 1999, 159, 'couleur ', 18, 'eyes_wise_shut.jpg '),
array(220, 'Paradine Case (The) ', 'Procès Paradine (Le) ', 'USA ', 1947, 125, 'NB ', 26, 'proces_paradine.jpg '),
array(198, 'Apocalypse Now ', 'Apocalypse Now ', 'USA ', 1979, 202, 'couleur ', 405, 'apocalypse_now.gif '),
array(427, 'Indiana Jones and the Temple of Doom ', 'Indiana Jones et le temple maudit ', 'USA ', 1984, 118, 'couleur ', 203, 'Indiana.jpg '),
array(162, 'Cleopatra ', 'Cléopâtre ', 'USA ', 1963, 243, 'couleur ', 100, 'cleopatra.jpg '),
array(528, 'Zatôichi ', 'Zatôichi ', 'Japon ', 2003, 116, 'couleur ', 580, 'zatoichi.jpeg '),
array(99, 'American in Paris (An) ', 'Américain à Paris (Un) ', 'USA ', 1951, 113, 'couleur ', 229, 'americain_paris.gif '),
array(495, 'Deserto rosso (Il) ', 'Désert rouge (Le) ', 'Italie ', 1964, 120, 'couleur ', 612, 'desert_rouge.jpeg '),
array(186, 'Orphée ', 'Orphée ', 'France ', 1949, 112, 'NB ', 314, 'orphee.jpg '),
array(515, 'Saboteur ', 'Cinquième colonne (La) ', 'USA ', 1942, 108, 'NB ', 26, '5eme_col.jpg '),
array(188, 'Crabe-tambour (Le) ', 'Crabe-tambour (Le) ', 'France ', 1977, 120, 'couleur ', 390, 'crabe_tambour.JPG '),
array(189, 'Pouic-Pouic ', 'Pouic-Pouic ', 'France ', 1963, 90, 'NB ', 384, 'pouic_pouic.jpg '),
array(259, 'Charade ', 'Charade ', 'USA ', 1963, 113, 'couleur ', 220, 'charade.jpg '),
array(412, 'White Heat ', 'Enfer est à lui (L ) ', 'USA ', 1949, 114, 'NB ', 693, 'films_noirs.jpg '),
array(184, 'Arrête ton char... bidasse ! ', 'Arrête ton char... bidasse ! ', 'France ', 1977, 90, 'couleur ', 380, 'arrete_char.jpg '),
array(180, 'Van Gogh ', 'Van Gogh ', 'France ', 1991, 158, 'couleur ', 364, 'van_gogh.jpeg '),
array(65, 'Rear Window ', 'Fenêtre sur cour ', 'USA ', 1954, 112, 'couleur ', 26, 'fenetre_cour.gif '),
array(181, 'Thomas Crown Affair (The) ', 'Affaire Thomas Crown (L ) ', 'USA ', 1968, 102, 'couleur ', 368, 'affaire_thomas.gif '),
array(477, 'Anatomy of a Murder ', 'Autopsie d un meurtre ', 'USA ', 1959, 160, 'NB ', 336, 'autopsie.jpg '),
array(111, 'Viaggio in Italia ', 'Voyage en Italie ', 'Italie ', 1953, 79, 'NB ', 244, 'voyage_italie.jpg '),
array(170, 'Wallace & Gromit ', 'Wallace & Gromit ', 'Angleterre ', 1995, 83, 'couleur ', 85, 'wallace_gromit.jpg '),
array(6, 'Modern Times ', 'Temps modernes (Les) ', 'USA ', 1936, 100, 'NB ', 12, 'temps_modernes.gif '),
array(40, 'North by Northwest ', 'Mort aux trousses (La) ', 'USA ', 1959, 136, 'couleur ', 26, 'mort_trousses.jpeg '),
array(119, 'Casablanca ', 'Casablanca ', 'USA ', 1942, 102, 'NB ', 261, 'casablanca.jpg '),
array(92, 'Hable con ella ', 'Parle avec elle ', 'Espagne ', 2002, 112, 'couleur ', 89, 'parle_avec_elle.gif '),
array(400, 'Tontons flingueurs (Les) ', 'Tontons flingueurs (Les) ', 'France ', 1963, 105, 'NB ', 678, 'tontons_fling.jpeg '),
array(201, 'Misfits (The) ', 'Désaxés (Les) ', 'USA ', 1961, 124, 'NB ', 371, 'misfits.gif '),
array(23, 'Ensayo de un crimen ', 'Vie criminelle d Archibald de la Cruz (La) ', 'Mexique ', 1955, 91, 'NB ', 15, 'archibald.gif '),
array(227, 'Big Sky (The) ', 'Captive aux yeux clairs (La) ', 'USA ', 1952, 122, 'NB ', 112, 'captive_yeux.gif '),
array(90, 'Roma ', 'Fellini Roma ', 'Italie ', 1972, 128, 'couleur ', 135, 'fellini_roma.gif '),
array(86, 'Birds (The) ', 'Oiseaux (Les) ', 'USA ', 1963, 119, 'couleur ', 26, 'oiseaux.gif '),
array(33, 'Höstsonaten ', 'Sonate d automne ', 'Suède ', 1978, 89, 'couleur ', 93, 'sonate_automne.gif '),
array(154, 'Enfants du paradis (Les) ', 'Enfants du paradis (Les) ', 'France ', 1945, 190, 'NB ', 17, 'enfants_paradis.jpg '),
array(260, 'Meet Me in St. Louis ', 'Chant du Missouri (Le) ', 'USA ', 1944, 113, 'couleur ', 229, 'chant_Missouri.jpeg '),
array(445, 'Mummy (The) ', 'Momie (La) ', 'USA ', 1932, 73, 'NB ', 736, 'momie.jpeg '),
array(480, '25th Hour ', '24 heures avant la nuit ', 'USA ', 2002, 135, 'couleur ', 774, '24h_nuit.jpg '),
array(174, 'They Shoot Horses, Don t They ? ', 'On achève bien les chevaux ', 'USA ', 1969, 120, 'couleur ', 240, 'on_acheve_bien.jpg '),
array(28, 'Chicken run ', 'Chicken run ', 'Angleterre ', 2000, 81, 'couleur ', 85, 'chicken_run.gif '),
array(266, 'Juste avant la nuit ', 'Juste avant la nuit ', 'France ', 1971, 100, 'couleur ', 504, 'biches.jpg '),
array(60, 'Purple Rose of Cairo (The) ', 'Rose pourpre du Caire (La) ', 'USA ', 1985, 84, 'couleur ', 139, 'rose_pourpre.gif '),
array(191, 'Jésus de Montréal ', 'Jésus de Montréal ', 'Canada ', 1989, 118, 'couleur ', 395, 'jesus_montreal.jpg '),
array(252, 'Grande vadrouille (La) ', 'Grande vadrouille (La) ', 'France ', 1966, 132, 'couleur ', 524, 'grande_vadr.gif '),
array(277, 'Forrest Gump ', 'Forrest Gump ', 'USA ', 1994, 142, 'couleur ', 555, 'forrest_gump.jpg '),
array(231, 'On the Waterfront ', 'Sur les quais ', 'USA ', 1954, 108, 'NB ', 486, 'sur_les_quais.gif '),
array(164, 'Roma, città aperta ', 'Rome, ville ouverte ', 'Italie ', 1945, 100, 'NB ', 244, 'rome_ouverte.jpg '),
array(69, 'Third Man (The) ', 'Troisième homme (Le) ', 'Angleterre ', 1949, 104, 'NB ', 172, 'troisieme_homme.gif '),
array(123, 'Ran ', 'Ran ', 'Japon ', 1985, 160, 'couleur ', 242, 'ran.jpg '),
array(55, 'Törst ', 'Soif (La) / Fontaine d Arethuse (La) ', 'Suède ', 1949, 83, 'NB ', 93, 'cris_chuchot.gif '),
array(108, 'Ikiru ', 'Vivre ', 'Japon ', 1952, 143, 'NB ', 242, 'vivre.jpg '),
array(173, 'Eureka ', 'Eureka ', 'Japon ', 2000, 210, 'NB/couleur', 353, 'eureka.jpg '),
array(3, 'Woman under the Influence (A) ', 'Femme sous influence (Une) ', 'USA ', 1974, 140, 'couleur ', 9, 'femme_influence.jpg '),
array(50, 'Viskningar och rop ', 'Cris et chuchotements ', 'Suède ', 1972, 106, 'couleur ', 93, 'cris_chuchot.gif '),
array(388, 'Freaks ', 'Freaks ', 'USA ', 1932, 64, 'NB ', 294, 'freaks.jpeg '),
array(113, 'Blaue Engel (Der) ', 'Ange bleu (L ) ', 'Allemagne ', 1930, 99, 'NB ', 251, 'ange_bleu.jpg '),
array(279, 'Star Wars: Episode V, The Empire Strikes Back ', 'Empire contre-attaque (L ) ', 'USA ', 1980, 127, 'couleur ', 561, 'star_wars.jpg '),
array(206, 'Comment je me suis disputé... (ma vie sexuelle) ', 'Comment je me suis disputé... (ma vie sexuelle) ', 'France ', 1996, 178, 'couleur ', 427, 'comment_dispute.jpg '),
array(169, 'It s a Wonderful Life ', 'Vie est belle (La) ', 'USA ', 1946, 130, 'NB ', 349, 'vie_belle.jpeg '),
array(103, 'Trouble in Mind ', 'Wanda s cafe ', 'USA ', 1985, 107, 'couleur ', 235, 'wanda_cafe.jpg '),
array(557, 'Sceicco bianco (Lo) ', 'Cheik blanc (Le) ', 'Italie ', 1952, 86, 'NB ', 135, 'cheik_blanc.jpeg '),
array(370, 'Ugetsu monogatari ', 'Contes de la lune vague après la pluie (Les) ', 'Japon ', 1953, 94, 'NB ', 648, 'contes_lune.jpg '),
array(464, 'Promeneur du champ de Mars (Le) ', 'Promeneur du champ de Mars (Le) ', 'France ', 2005, 117, 'couleur ', 23, 'promeneur_mars.jpeg '),
array(287, 'Nous irons tous au paradis ', 'Nous irons tous au paradis ', 'France ', 1977, 110, 'couleur ', 565, 'elephant_trompe.jpeg'),
array(332, 'Eclisse (L ) ', 'Eclipse (L ) ', 'Italie ', 1962, 118, 'NB ', 612, 'eclipse.jpg '),
array(84, 'Trois couleurs : blanc ', 'Trois couleurs : blanc ', 'France ', 1994, 91, 'couleur ', 205, 'blanc.gif '),
array(145, 'Belle et la bête (La) ', 'Belle et la bête (La) ', 'France ', 1946, 96, 'NB ', 314, 'belle_bete.jpeg '),
array(20, 'Strangers on a Train ', 'Inconnu du Nord-Express (L ) ', 'USA ', 1951, 97, 'NB ', 26, 'inconnus_express.gif'),
array(157, 'Boy with Green Hair (The) ', 'Garçon aux cheveux verts (Le) ', 'USA ', 1948, 82, 'couleur ', 335, 'cheveux_verts.gif '),
array(161, 'Kagemusha ', 'Kagemusha ', 'Japon ', 1980, 179, 'couleur ', 242, 'kagemusha.jpg '),
array(148, 'Ossessione ', 'Amants diaboliques (Les) ', 'Italie ', 1943, 140, 'NB ', 313, 'ossessione.jpg '),
array(324, 'Vivement dimanche ! ', 'Vivement dimanche ! ', 'France ', 1983, 110, 'NB ', 193, 'vivement.gif '),
array(413, 'Bonheur (Le) ', 'Bonheur (Le) ', 'France ', 1965, 79, 'NB ', 533, 'bonheur.jpeg '),
array(79, 'Breaking the Waves ', 'Breaking the Waves ', 'Danemark ', 1996, 159, 'couleur ', 198, 'breaking_waves.jpg '),
array(49, 'Persona ', 'Persona ', 'Suède ', 1966, 85, 'NB ', 93, 'persona.jpg '),
array(284, 'Aleksandr Nevskiy ', 'Alexandre Nevski ', 'Russie ', 1938, 112, 'NB ', 546, 'alex_nevski.gif '),
array(136, 'Carne trémula ', 'En chair et en os ', 'Espagne ', 1997, 103, 'couleur ', 89, 'chair_os.gif '),
array(127, 'Letzte Mann (Der) ', 'Dernier des hommes (Le) ', 'Allemagne ', 1924, 77, 'NB ', 233, 'dernier_homme.jpg '),
array(273, 'Chienne (La) ', 'Chienne (La) ', 'France ', 1931, 91, 'NB ', 126, 'chienne.jpeg '),
array(463, 'Straw Dogs ', 'Chiens de paille (Les) ', 'Angleterre ', 1971, 118, 'couleur ', 761, 'chiens_paille.jpg '),
array(114, 'Letter from an unknown Woman ', 'Lettre d une inconnue ', 'USA ', 1948, 86, 'NB ', 252, 'lettre_inconnue.jpg '),
array(153, 'Dune ', 'Dune ', 'USA ', 1984, 137, 'couleur ', 179, 'dune.jpg '),
array(151, 'Enfant sauvage (L ) ', 'Enfant sauvage (L ) ', 'France ', 1969, 83, 'NB ', 193, 'enfant_sauvage.jpg '),
array(106, 'Nuit américaine (La) ', 'Nuit américaine (La) ', 'France ', 1973, 115, 'couleur ', 193, 'nuit_amer.jpg '),
array(408, 'Public Enemy (The) ', 'Ennemi public (L ) ', 'USA ', 1931, 83, 'NB ', 690, 'films_noirs.jpg '),
array(508, 'Dragao da Maldade contra o Santo Guerreiro (O) ', 'Antonio das Mortes ', 'Bresil ', 1969, 100, 'couleur ', 831, 'antonio_mortes.jpeg '),
array(296, 'City Lights ', 'Lumières de la ville (Les) ', 'USA ', 1931, 87, 'NB ', 12, 'lumieres_ville.jpeg '),
array(77, 'Femme d à côté (La) ', 'Femme d à côté (La) ', 'France ', 1981, 106, 'couleur ', 193, 'femme_a_cote.gif '),
array(133, 'Bête humaine (La) ', 'Bête humaine (La) ', 'France ', 1938, 100, 'NB ', 126, 'bete_humaine.gif '),
array(27, 'Yi Yi ', 'Yi Yi ', 'Taiwan ', 2000, 170, 'couleur ', 80, 'yiyi.gif '),
array(141, 'Ronde (La) ', 'Ronde (La) ', 'France ', 1950, 95, 'NB ', 252, 'ronde.jpg '),
array(362, 'Circus (The) ', 'Cirque (Le) ', 'USA ', 1928, 71, 'NB ', 12, 'cirque.jpeg '),
array(441, 'Conte d été ', 'Conte d été ', 'France ', 1996, 113, 'couleur ', 204, 'conte_ete.jpeg '),
array(196, '317ème section (La) ', '317ème section (La) ', 'France ', 1965, 100, 'NB ', 390, '317section.JPG '),
array(78, 'EXistenZ ', 'EXistenZ ', 'Canada ', 1999, 97, 'couleur ', 194, 'existenz.jpg '),
array(126, 'Paisa ', 'Paisa ', 'Italie ', 1946, 120, 'NB ', 244, 'paisa.jpg '),
array(118, 'Radio Days ', 'Radio Days ', 'USA ', 1987, 85, 'couleur ', 139, 'radio_days.gif '),
array(81, 'Conte d hiver ', 'Conte d hiver ', 'France ', 1992, 114, 'couleur ', 204, 'conte_hiver.jpg '),
array(224, 'Chicago ', 'Chicago ', 'USA ', 2002, 113, 'couleur ', 475, 'chicago.jpg '),
array(132, 'Grande illusion (La) ', 'Grande illusion (La) ', 'France ', 1937, 114, 'NB ', 126, 'grande_ill.gif '),
array(137, 'Exotica ', 'Exotica ', 'Canada ', 1994, 103, 'couleur ', 291, 'exotica.jpg '),
array(80, 'Minority Report ', 'Minority Report ', 'USA ', 2002, 145, 'couleur ', 203, 'minority_report.jpg '),
array(120, 'Elephant man ', 'Elephant man ', 'Angleterre ', 1980, 124, 'NB ', 179, 'elephant_man.jpg '),
array(121, 'Rendez-vous de juillet ', 'Rendez-vous de juillet ', 'France ', 1949, 112, 'NB ', 267, 'rdv_juillet.jpg '),
array(163, 'Kabinett des Doktor Caligari (Das) ', 'Cabinet du docteur Caligari (Le) ', 'Allemagne ', 1920, 78, 'NB ', 341, 'caligari.jpg '),
array(122, 'Corbeau (Le) ', 'Corbeau (Le) ', 'France ', 1943, 92, 'NB ', 173, 'corbeau.jpeg '),
array(22, 'El ', 'El ', 'Mexique ', 1952, 100, 'NB ', 15, 'archibald.gif '),
array(135, 'Traffic ', 'Traffic ', 'USA ', 2000, 147, 'couleur ', 285, 'traffic.gif '),
array(91, 'King Kong ', 'King Kong ', 'USA ', 1933, 100, 'NB ', 219, 'king_kong.gif '),
array(440, 'Rayon vert (Le) ', 'Rayon vert (Le) ', 'France ', 1986, 98, 'couleur ', 204, 'rayon_vert.jpeg '),
array(112, 'Teorema ', 'Théorème ', 'Italie ', 1968, 98, 'NB/couleur', 245, 'theoreme.jpg '),
array(203, 'Scarlet Street ', 'Rue rouge (La) ', 'USA ', 1945, 103, 'NB ', 43, 'rue_rouge.jpg '),
array(34, 'Sasom i en spegel ', 'A travers le miroir ', 'Suède ', 1961, 86, 'NB ', 93, 'sonate_automne.gif '),
array(61, 'Goût des autres (Le) ', 'Goût des autres (Le) ', 'France ', 2000, 112, 'couleur ', 146, 'gout_des_autres.jpg '),
array(488, 'Masculin féminin ', 'Masculin féminin ', 'France ', 1966, 100, 'NB ', 13, 'masc_fem.jpeg '),
array(130, 'Dangerous Liaisons ', 'Liaisons dangereuses (Les) ', 'USA ', 1988, 119, 'couleur ', 274, 'liaisons_danger.jpg '),
array(11, 'Jour se lève (Le) ', 'Jour se lève (Le) ', 'France ', 1939, 86, 'NB ', 17, 'jour_se_leve.gif '),
array(493, 'Kung fu ', 'Crazy Kung-Fu ', 'Chine-Hong-Kong ', 2004, 95, 'couleur ', 808, 'crazy_kung_fu.jpeg '),
array(73, 'Chaos ', 'Chaos ', 'France ', 2001, 109, 'couleur ', 180, 'chaos.gif '),
array(501, 'Young Mr. Lincoln ', 'Vers sa destinée ', 'USA ', 1939, 100, 'NB ', 401, 'vers_destinee.jpeg '),
array(15, 'Kind Hearts and Coronets ', 'Noblesse oblige ', 'Angleterre ', 1949, 103, 'NB ', 21, 'noblesse_oblige.gif '),
array(9, 'Olvidados (Los) ', 'Olvidados (Los) ', 'Mexique ', 1950, 80, 'NB ', 15, 'olvidados.gif '),
array(95, 'Ressources humaines ', 'Ressources humaines ', 'France ', 1999, 100, 'couleur ', 226, 'ressources_hum.gif '),
array(156, 'Room Service ', 'Panique à l hôtel ', 'USA ', 1938, 78, 'NB ', 334, 'panique_hotel.gif '),
array(361, 'Werckmeister harmoniak ', 'Harmonies Werckmeister ', 'Hongrie ', 2000, 145, 'NB ', 643, 'harmonies_werck.jpeg'),
array(94, 'Miller s Crossing ', 'Miller s Crossing ', 'USA ', 1990, 115, 'couleur ', 222, 'miller s.gif '),
array(492, 'Sunrise: A Song of Two Humans ', 'Aurore (L ) ', 'USA ', 1927, 95, 'NB ', 233, 'aurore.jpeg '),
array(21, 'Mari de la coiffeuse (Le) ', 'Mari de la coiffeuse (Le) ', 'France ', 1990, 92, 'couleur ', 28, 'mari_coiffeuse.gif '),
array(219, 'Invisible Man (The) ', 'Homme invisible (L ) ', 'USA ', 1933, 71, 'NB ', 461, 'homme_invisible.jpg '),
array(85, 'Trois couleurs : bleu ', 'Trois couleurs : bleu ', 'France ', 1993, 100, 'couleur ', 205, 'bleu.gif '),
array(235, 'Peeping Tom ', 'Voyeur (Le) ', 'Angleterre ', 1960, 101, 'NB ', 499, 'voyeur.jpg '),
array(299, 'Kidzu ritan ', 'Kids Return ', 'Japon ', 1996, 107, 'couleur ', 580, 'violent_cop.gif '),
array(48, 'Règle du jeu (La) ', 'Règle du jeu (La) ', 'France ', 1939, 110, 'NB ', 126, 'regle_du_jeu.gif '),
array(64, 'Raging Bull ', 'Raging Bull ', 'USA ', 1980, 129, 'couleur ', 160, 'raging_bull.gif '),
array(70, 'Quai des orfèvres ', 'Quai des orfèvres ', 'France ', 1947, 102, 'NB ', 173, 'quai_orfevres.gif '),
array(26, 'Plein Soleil ', 'Plein Soleil ', 'France ', 1960, 113, 'couleur ', 81, 'plein_soleil.gif '),
array(47, 'Parapluies de Cherbourg (Les) ', 'Parapluies de Cherbourg (Les) ', 'France ', 1964, 87, 'couleur ', 20, 'parapluies.gif '),
array(10, 'West Side Story ', 'West Side Story ', 'USA ', 1961, 145, 'couleur ', 16, 'west_side_story.jpg '),
array(526, 'Barton Fink ', 'Barton Fink ', 'USA ', 1991, 116, 'couleur ', 222, 'barton_fink.jpeg '),
array(147, 'Stage Door ', 'Pension d artistes ', 'USA ', 1937, 92, 'NB ', 319, 'pension_art.jpeg '),
array(17, 'Ville est tranquille (La) ', 'Ville est tranquille (La) ', 'France ', 2000, 89, 'couleur ', 23, 'ville_tranquille.gif'),
array(525, 'Kuch Kuch Hota Hai ', 'Kuch Kuch Hota Hai ', 'Inde ', 1998, 177, 'couleur ', 840, 'kuch2_hota_hai.jpg '),
array(46, 'Vie rêvée des anges (La) ', 'Vie rêvée des anges (La) ', 'France ', 1998, 113, 'couleur ', 121, 'vie_revee_anges.jpg '),
array(19, 'Valseuses (Les) ', 'Valseuses (Les) ', 'France ', 1974, 103, 'couleur ', 25, 'valseuses.jpg '),
array(45, 'Vacances de M. Hulot (Les) ', 'Vacances de M. Hulot (Les) ', 'France ', 1953, 114, 'NB ', 14, 'vacances_hulot.gif '),
array(4, 'Apartment (The) ', 'Garçonnière (La) ', 'USA ', 1960, 120, 'NB ', 10, 'garconniere.gif '),
array(12, 'Lolita ', 'Lolita ', 'USA ', 1962, 147, 'NB ', 18, 'lolita.jpg '),
array(391, 'Taxi pour Tobrouk (Un) ', 'Taxi pour Tobrouk (Un) ', 'France ', 1960, 95, 'NB ', 664, 'taxi_tobrouk.jpeg '),
array(307, 'How Green Was My Valley ', 'Qu elle était verte ma vallée ', 'USA ', 1941, 118, 'NB ', 401, 'verte_vallee.gif '),
array(339, 'Vangelo secondo Matteo (Il) ', 'Evangile selon St Matthieu (L ) ', 'Italie ', 1964, 133, 'NB ', 245, 'evangile.jpg '),
array(374, 'Ivan Groznyy II: Boyarsky zagovor ', 'Ivan le Terrible II: le complot des Boyards ', 'Russie ', 1958, 81, 'NB/couleur', 546, 'ivan_terrible.jpeg '),
array(76, 'Excalibur ', 'Excalibur ', 'Angleterre ', 1981, 140, 'couleur ', 191, 'excalibur.jpg '),
array(497, 'Hit (The) ', 'Hit (The) ', 'Angleterre ', 1984, 100, 'couleur ', 274, 'hit.jpeg '),
array(316, 'Rope ', 'Corde (La) ', 'USA ', 1948, 80, 'NB ', 26, 'corde.jpg '),
array(5, 'Victor/Victoria ', 'Victor/Victoria ', 'USA ', 1982, 129, 'couleur ', 11, 'victor_victoria.gif '),
array(454, 'Penny Serenade ', 'Chanson du passé (La) ', 'USA ', 1941, 119, 'NB ', 571, 'chanson_passe.jpg '),
array(53, 'Sommarlek ', 'Jeux d été ', 'Suède ', 1951, 96, 'NB ', 93, 'jeux_ete.jpg '),
array(217, 'Ben-Hur ', 'Ben-Hur ', 'USA ', 1959, 212, 'couleur ', 458, 'Ben-Hur.gif '),
array(249, 'Spartacus ', 'Spartacus ', 'USA ', 1960, 184, 'couleur ', 18, 'spartacus.jpg '),
array(159, 'Most Dangerous Game (The) ', 'Chasses du comte Zaroff (Les) ', 'USA ', 1932, 63, 'NB ', 219, 'chasses_zaroff.jpg '),
array(369, 'Yeelen ', 'Lumière (La) ', 'Mali ', 1987, 105, 'couleur ', 646, 'cisse4.jpeg '),
array(347, 'Testament des Dr. Mabuse (Das) ', 'Testament du Dr. Mabuse (Le) ', 'Allemagne ', 1933, 122, 'NB ', 43, 'test_mabuse.jpeg '),
array(306, 'Alexis Zorbas ', 'Zorba le Grec ', 'Grèce ', 1964, 142, 'NB ', 585, 'zorba.jpg '),
array(37, 'Himmel über Berlin (Der) ', 'Ailes du désir (Les) ', 'Allemagne ', 1987, 127, 'NB/couleur', 103, 'ailes_du_desir.jpg '),
array(100, 'Dr. Strangelove ', 'Dr Folamour ', 'USA ', 1964, 93, 'NB ', 18, 'folamour.gif '),
array(211, 'Duel in the Sun ', 'Duel au soleil ', 'USA ', 1946, 138, 'couleur ', 444, 'duel_soleil.jpg '),
array(352, 'Casque d or ', 'Casque d or ', 'France ', 1952, 96, 'NB ', 267, 'casque_or.jpeg '),
array(471, 'Tron ', 'Tron ', 'USA ', 1982, 96, 'couleur ', 765, 'tron.jpg '),
array(439, 'Genou de Claire (Le) ', 'Genou de Claire (Le) ', 'France ', 1970, 105, 'couleur ', 204, 'genou_claire.jpeg '),
array(87, 'Man Who Knew Too Much (The) ', 'Homme qui en savait trop (L ) ', 'USA ', 1956, 120, 'couleur ', 26, 'homme_trop.gif '),
array(116, 'Hannah and her Sisters ', 'Hannah et ses soeurs ', 'USA ', 1986, 103, 'couleur ', 139, 'hannah_soeurs.gif '),
array(152, 'Clockwork Orange (A) ', 'Orange mécanique ', 'Angleterre ', 1971, 137, 'couleur ', 18, 'orange_mec.jpg '),
array(340, 'Yeux sans visage (Les) ', 'Yeux sans visage (Les) ', 'France ', 1959, 88, 'NB ', 626, 'yeux_visage.jpeg '),
array(234, 'Truman Show (The) ', 'Truman Show (The) ', 'USA ', 1998, 103, 'couleur ', 496, 'truman_show.gif '),
array(323, 'Toto le héros ', 'Toto le héros ', 'Belgique ', 1991, 91, 'couleur ', 601, 'toto.gif '),
array(393, 'Triporteur (Le) ', 'Triporteur (Le) ', 'France ', 1957, 93, 'couleur ', 667, 'triporteur.jpeg '),
array(134, 'Cabaret ', 'Cabaret ', 'USA ', 1972, 124, 'couleur ', 282, 'cabaret.gif '),
array(230, 'Gilda ', 'Gilda ', 'USA ', 1946, 110, 'NB ', 484, 'Gilda.jpg '),
array(371, 'Cave se rebiffe (Le) ', 'Cave se rebiffe (Le) ', 'France ', 1961, 98, 'NB ', 649, 'cave_rebiffe.jpeg '),
array(247, 'Being John Malkovich ', 'Dans la peau de John Malkovich ', 'USA ', 1999, 112, 'couleur ', 516, 'peau_malkovich.jpg '),
array(149, 'Ladri di biciclette ', 'Voleur de bicyclette (Le) ', 'Italie ', 1948, 93, 'NB ', 323, 'voleur_bicycl.jpg '),
array(465, 'Terrazza (La) ', 'Terrasse (La) ', 'Italie ', 1980, 124, 'couleur ', 526, 'terrasse.jpg '),
array(482, 'Shop Around the Corner (The) ', 'Rendez-vous ', 'USA ', 1940, 99, 'NB ', 177, 'rendez_vous.gif '),
array(251, 'Bride of Frankenstein ', 'Fiancée de Frankenstein (La) ', 'USA ', 1935, 75, 'NB ', 461, 'fiancee_Frank.jpg '),
array(487, 'Alphaville ', 'Alphaville ', 'France ', 1965, 99, 'NB ', 13, 'alphaville.jpeg '),
array(253, 'Brutti sporchi e cattivi ', 'Affreux, sales et méchants ', 'Italie ', 1976, 115, 'couleur ', 526, 'affreux_sales.jpeg '),
array(176, 'Barry Lyndon ', 'Barry Lyndon ', 'Angleterre ', 1975, 184, 'couleur ', 18, 'barry_lyndon.jpeg '),
array(250, 'Doulos (Le) ', 'Doulos (Le) ', 'France ', 1962, 108, 'NB ', 447, 'doulos.jpg '),
array(146, 'Salaire de la peur (Le) ', 'Salaire de la peur (Le) ', 'France ', 1953, 141, 'NB ', 173, 'salaire_peur.gif '),
array(297, 'Chagrin et la pitié (Le) ', 'Chagrin et la pitié (Le) ', 'France ', 1969, 251, 'NB ', 579, 'chagrin_pitie.gif '),
array(155, 'Bread and Roses ', 'Bread and Roses ', 'Angleterre ', 2000, 110, 'couleur ', 332, 'bread_roses.jpg '),
array(35, 'Night of the Hunter (The) ', 'Nuit du chasseur (La) ', 'USA ', 1955, 89, 'NB ', 99, 'nuit_chasseur.gif '),
array(286, 'Eléphant, ça trompe énormément (Un) ', 'Eléphant, ça trompe énormément (Un) ', 'France ', 1976, 100, 'couleur ', 565, 'elephant_trompe.jpeg'),
array(356, 'Thérèse Raquin ', 'Thérèse Raquin ', 'France ', 1953, 102, 'NB ', 17, 'raquin.jpeg '),
array(222, 'Déclin de l empire américain (Le) ', 'Déclin de l empire américain (Le) ', 'Canada ', 1986, 101, 'couleur ', 395, 'declin_empUS.jpg '),
array(533, 'Monkey Business ', 'Monnaie de singe ', 'USA ', 1931, 77, 'NB ', 862, 'monnaie_singe.jpg '),
array(257, '5 Fingers ', 'Affaire Cicéron (L ) ', 'USA ', 1952, 108, 'NB ', 100, 'affaire_ciceron.jpg '),
array(262, 'Atalante (L ) ', 'Atalante (L ) ', 'France ', 1934, 89, 'NB ', 540, 'Vigo.gif '),
array(474, 'Jeder für sich und Gott gegen alle ', 'Enigme de Kaspar Hauser (L ) ', 'Allemagne ', 1974, 110, 'couleur ', 422, 'kaspar_hauser.jpeg '),
array(433, 'Chelovek s kino-apparatom ', 'Homme à la caméra (L ) ', 'Russie ', 1929, 80, 'NB ', 722, 'homme_camera.jpeg '),
array(263, 'Zéro de conduite ', 'Zéro de conduite ', 'France ', 1933, 41, 'NB ', 540, 'Vigo.gif '),
array(256, 'Quai des brumes ', 'Quai des brumes ', 'France ', 1938, 91, 'NB ', 17, 'quai_brumes.gif '),
array(351, 'Giuletta degli spiriti ', 'Juliette des esprits ', 'Italie ', 1965, 137, 'couleur ', 135, 'juliette_esprit.jpeg'),
array(125, 'Hangmen Also Die ', 'Bourreaux meurent aussi (Les) ', 'USA ', 1943, 140, 'NB ', 43, 'bourreaux_aussi.jpg '),
array(183, 'Meglio gioventù (La) ', 'Nos meilleures années ', 'Italie ', 2003, 400, 'couleur ', 376, 'meilleures_ans.jpg '),
array(178, 'Titanic ', 'Titanic ', 'USA ', 1997, 194, 'couleur ', 361, 'titanic.jpg '),
array(401, 'Ne nous fâchons pas ', 'Ne nous fâchons pas ', 'France ', 1966, 100, 'couleur ', 678, 'ne_fachons_pas.jpeg '),
array(446, 'Dumbo ', 'Dumbo ', 'USA ', 1941, 64, 'couleur ', 737, 'dumbo.jpeg '),
array(160, 'Foolish Wives ', 'Folies de femmes ', 'USA ', 1922, 117, 'NB ', 279, 'folies_femmes.jpg '),
array(466, 'Charulata ', 'Charulata ', 'Inde ', 1964, 117, 'NB ', 271, 'charulara.jpeg '),
array(527, 'Gosford Park ', 'Gosford Park ', 'USA ', 2001, 137, 'couleur ', 491, 'gosford_park.jpeg '),
array(334, 'Giornata particolare (Una) ', 'Journée particulière (une) ', 'Italie ', 1977, 110, 'NB/couleur', 526, 'journee_part.jpeg '),
array(88, 'Star Is Born (A) ', 'Etoile est née (Une) ', 'USA ', 1954, 181, 'couleur ', 213, 'etoile_nee.gif '),
array(504, 'Que la bête meure ', 'Que la bête meure ', 'France ', 1969, 110, 'couleur ', 504, 'bete_meure.jpeg '),
array(271, 'Sunset Blvd. ', 'Boulevard du Crépuscule ', 'USA ', 1950, 110, 'NB ', 10, 'bvd_crepuscule.jpg '),
array(96, 'Citizen Kane ', 'Citizen Kane ', 'USA ', 1941, 119, 'NB ', 171, 'citizen.jpg '),
array(172, 'Man Who Wasn t There (The) ', 'Barber (The) ', 'USA ', 2001, 116, 'NB ', 222, 'barber.jpg '),
array(411, 'Roaring Twenties (The) ', 'Fantastiques années 20 (Les) ', 'USA ', 1939, 104, 'NB ', 693, 'films_noirs.jpg '),
array(165, 'Germania anno zero ', 'Allemagne année zéro ', 'Italie ', 1948, 78, 'NB ', 244, 'allemagne0.jpg '),
array(71, 'To Be or Not to Be ', 'To Be or Not to Be ', 'USA ', 1942, 99, 'NB ', 177, 'to_be_or_not.gif '),
array(416, 'No Smoking ', 'No Smoking ', 'France ', 1993, 140, 'couleur ', 132, 'smoking.jpeg '),
array(258, 'Sans toit ni loi ', 'Sans toit ni loi ', 'France ', 1985, 105, 'couleur ', 533, 'sans_toit_loi.gif '),
array(519, 'Siu lam juk kau ', 'Shaolin soccer ', 'Chine-Hong-Kong ', 2001, 87, 'couleur ', 808, 'shaolin_soccer.jpg '),
array(102, 'Great Dictator (The) ', 'Dictateur (Le) ', 'USA ', 1940, 124, 'NB ', 12, 'dictateur.jpg '),
array(233, 'Ten Commandments (The) ', 'Dix commandements (Les) ', 'USA ', 1956, 220, 'couleur ', 493, '10_commandements.gif'),
array(177, 'Mies vailla menneisyyttä ', 'Homme sans passé (L ) ', 'Finlande ', 2002, 97, 'couleur ', 358, 'homme_passe.gif '),
array(452, 'Top Hat ', 'Danseur du dessus (Le) ', 'USA ', 1935, 101, 'NB ', 743, 'danseur_dessus.jpeg '),
array(265, 'Domicile conjugal ', 'Domicile conjugal ', 'France ', 1970, 100, 'couleur ', 193, 'dom_conjug.gif '),
array(467, 'Blade Runner ', 'Blade Runner ', 'USA ', 1982, 117, 'couleur ', 764, 'blade_runner.jpg '),
array(288, 'Place in the Sun (A) ', 'Place au soleil (Une) ', 'USA ', 1951, 122, 'NB ', 571, 'place_soleil.gif '),
array(426, 'Raiders of the Lost Ark ', 'Indiana Jones et les Aventuriers de l arche perdue', 'USA ', 1981, 115, 'couleur ', 203, 'Indiana.jpg '),
array(558, 'Bigger Than Life ', 'Derrière le miroir ', 'USA ', 1956, 91, 'couleur ', 8, 'derriere_miroir.gif '),
array(239, 'Boucher (Le) ', 'Boucher (Le) ', 'France ', 1970, 93, 'couleur ', 504, 'boucher.gif '),
array(115, 'Zelig ', 'Zelig ', 'USA ', 1983, 79, 'NB/couleur', 139, 'zelig.gif '),
array(282, 'Touch of Evil ', 'Soif du mal (La) ', 'USA ', 1958, 100, 'NB ', 171, 'soif_mal.jpg '),
array(245, 'It Happened Tomorrow ', 'C est arrivé demain ', 'USA ', 1944, 85, 'NB ', 512, 'arrive_demain.jpg '),
array(131, 'Brazil ', 'Brazil ', 'Angleterre ', 1985, 131, 'couleur ', 24, 'brazil.jpg '),
array(272, 'Mr. Arkadin ', 'Dossier secret ', 'USA ', 1955, 93, 'NB ', 171, 'dossier_secret.jpg '),
array(98, 'My Fair Lady ', 'My fair Lady ', 'USA ', 1964, 170, 'couleur ', 213, 'fair_lady.jpg '),
array(468, 'Two for the Road ', 'Voyage à deux ', 'USA ', 1967, 111, 'couleur ', 220, 'voyage2.jpeg '),
array(293, 'Staroye i novoye ', 'Ligne générale (La) ', 'Russie ', 1929, 121, 'NB ', 546, 'potemkine.gif '),
array(54, 'Dolce vita (La) ', 'Dolce vita (La) ', 'Italie ', 1960, 167, 'NB ', 135, 'dolce_vita.jpg '),
array(512, 'Double vie de Véronique (La) ', 'Double vie de Véronique (La) ', 'France ', 1991, 98, 'couleur ', 205, 'double_vie_vero.jpg '),
array(44, 'Spider-man ', 'Spider-man ', 'USA ', 2002, 121, 'couleur ', 117, 'spiderman.gif '),
array(72, 'Mulholland Dr. ', 'Mulholland drive ', 'USA ', 2001, 145, 'couleur ', 179, 'mulholland_drive.gif'),
array(354, 'New York, New York ', 'New York, New York ', 'USA ', 1977, 155, 'couleur ', 160, 'new_york.jpeg '),
array(150, 'Stromboli ', 'Stromboli ', 'Italie ', 1949, 107, 'NB ', 244, 'stromboli.jpg '),
array(30, 'Tacones lejanos ', 'Talons aiguilles ', 'Espagne ', 1991, 115, 'couleur ', 89, 'talons_aiguilles.jpg'),
array(394, 'On the Town ', 'Jour à New-York (Un) ', 'USA ', 1949, 98, 'couleur ', 220, 'jour_NY.gif '),
array(301, 'Incompreso (L ) ', 'Incompris (L ) ', 'Italie ', 1966, 105, 'couleur ', 581, 'incompris.gif '),
array(303, 'Cat People ', 'Féline (la) ', 'USA ', 1942, 73, 'NB ', 584, 'feline.jpeg '),
array(143, 'Lady from Shanghai (The) ', 'Dame de Shanghai (La) ', 'USA ', 1947, 87, 'NB ', 171, 'dame_Shangai.gif '),
array(389, 'Lili Marleen ', 'Lili Marleen ', 'Allemagne ', 1981, 120, 'couleur ', 663, 'lili_marleen.jpeg '),
array(205, 'Roseaux sauvages (Les) ', 'Roseaux sauvages (Les) ', 'France ', 1994, 110, 'couleur ', 426, 'roseaux_sauv.jpeg '),
array(276, 'Marie du port (La) ', 'Marie du port (La) ', 'France ', 1950, 88, 'NB ', 17, 'marie_port.jpg '),
array(289, 'Gentlemen Prefer Blondes ', 'Hommes préfèrent les blondes (Les) ', 'USA ', 1953, 91, 'couleur ', 112, 'hommes_blondes.gif '),
array(386, 'Advise & Consent ', 'Tempête à Washington ', 'USA ', 1962, 142, 'NB ', 336, 'tempete_wash.jpg '),
array(455, 'Esquive (L ) ', 'Esquive (L ) ', 'France ', 2003, 117, 'couleur ', 747, 'esquive.jpeg '),
array(139, 'Intolerance ', 'Intolérance ', 'USA ', 1916, 178, 'NB ', 293, 'intolerance.jpg '),
array(310, 'Aguirre, der Zorn Gottes ', 'Aguirre, la colère de Dieu ', 'Allemagne ', 1972, 100, 'couleur ', 422, 'aguirre.jpg '),
array(197, 'Sjunde inseglet (Det) ', 'Septième sceau (Le) ', 'Suède ', 1957, 96, 'NB ', 93, '7eme_sceau.gif '),
array(300, 'Collectionneuse (La) ', 'Collectionneuse (La) ', 'France ', 1967, 89, 'couleur ', 204, 'collectionneuse.jpeg'),
array(485, 'Rocco e i suoi fratelli ', 'Rocco et ses frères ', 'Italie ', 1960, 168, 'NB ', 313, 'rocco_freres.jpg '),
array(435, 'Soylent Green ', 'Soleil vert ', 'USA ', 1973, 97, 'couleur ', 723, 'soleil_vert.jpg '),
array(348, 'Capitan (le) ', 'Capitan (le) ', 'France ', 1960, 111, 'couleur ', 637, 'capitan.jpeg '),
array(232, 'Short Cuts ', 'Short Cuts ', 'USA ', 1993, 187, 'couleur ', 491, 'short_cuts.jpg '),
array(128, 'Jalsaghar ', 'Salon de musique (Le) ', 'Inde ', 1958, 100, 'NB ', 271, 'salon_musique.jpg '),
array(43, '2001: A Space Odyssey ', '2001, l Odyssée de l espace ', 'USA ', 1968, 139, 'couleur ', 18, '2001_odyssee.gif '),
array(419, 'King of Comedy (The) ', 'Valse des pantins (La) ', 'USA ', 1983, 109, 'couleur ', 160, 'valse_pantins.jpeg '),
array(367, 'Baara ', 'Travail (Le) ', 'Mali ', 1978, 90, 'couleur ', 646, 'cisse4.jpeg '),
array(345, 'Meet john Doe ', 'Homme de la rue (L ) ', 'USA ', 1941, 122, 'NB ', 349, 'homme_rue.jpeg '),
array(415, 'Smoking ', 'Smoking ', 'France ', 1993, 140, 'couleur ', 132, 'smoking.jpeg '),
array(242, 'Dédée d Anvers ', 'Dédée d Anvers ', 'France ', 1948, 86, 'NB ', 508, 'dedee_anvers.jpg '),
array(236, 'Ma nuit chez Maud ', 'Ma nuit chez Maud ', 'France ', 1969, 110, 'NB ', 204, 'nuit_maud.jpg '),
array(330, 'Touchez pas au grisbi ', 'Touchez pas au grisbi ', 'France ', 1954, 94, 'NB ', 267, 'grisbi.gif '),
array(319, 'Man with the Golden Arm (The) ', 'Homme au bras d or (L ) ', 'USA ', 1955, 119, 'NB ', 336, 'bras_or.jpg '),
array(317, 'Sound of Music (The) ', 'Mélodie du bonheur (La) ', 'USA ', 1965, 174, 'couleur ', 16, 'melodie_bonheur.jpg '),
array(321, 'Human Factor (The) ', 'Human Factor (The) ', 'USA ', 1979, 115, 'couleur ', 336, 'human_factor.jpg '),
array(308, 'Grapes of Wrath (The) ', 'Raisins de la colère (Les) ', 'USA ', 1940, 128, 'NB ', 401, 'raisins_colere.jpg '),
array(110, 'Shichinin no samurai ', 'Sept samouraïs (Les) ', 'Japon ', 1954, 160, 'NB ', 242, '7samourais.jpg '),
array(229, 'M ', 'M le maudit ', 'Allemagne ', 1931, 118, 'NB ', 43, 'M_maudit.jpg '),
array(500, 'Lady Eve (The) ', 'Coeur pris au piège (Un) ', 'USA ', 1941, 97, 'NB ', 817, 'lady_eve.jpg '),
array(305, 'Leopard Man (The) ', 'Homme léopard (L ) ', 'USA ', 1943, 66, 'NB ', 584, 'feline.jpeg '),
array(360, 'Monsieur Verdoux ', 'Monsieur Verdoux ', 'USA ', 1947, 124, 'NB ', 12, 'verdoux.jpeg '),
array(333, 'Blowup ', 'Blowup ', 'Angleterre ', 1966, 111, 'couleur ', 612, 'blow_up.gif '),
array(494, 'Plan 9 from Outer Space ', 'Plan 9 from Outer Space ', 'USA ', 1959, 79, 'NB ', 809, 'plan9_outer.jpeg '),
array(16, 'Vincent, François, Paul et les autres ', 'Vincent, François, Paul et les autres ', 'France ', 1974, 109, 'couleur ', 22, 'vincent_francois.gif'),
array(460, 'Salvatore Giuliano ', 'Salvatore Giuliano ', 'Italie ', 1962, 123, 'NB ', 187, 'salvatore.jpeg '),
array(375, 'Matador ', 'Matador ', 'Espagne ', 1986, 110, 'couleur ', 89, 'matador.jpeg '),
array(406, 'Breakfast at Tiffany s ', 'Diamants sur canapé ', 'USA ', 1961, 115, 'NB ', 11, 'diams_canape.jpeg '),
array(241, 'Scandal in Paris (A) ', 'Scandale à Paris ', 'USA ', 1946, 100, 'NB ', 507, 'scandale_paris.jpg '),
array(436, 'Deux anglaises et le continent (Les) ', 'Deux anglaises et le continent (Les) ', 'France ', 1971, 130, 'couleur ', 193, '2anglaises.jpeg '),
array(377, 'Beat the Devil ', 'Plus fort que le diable ', 'USA ', 1953, 100, 'NB ', 371, 'fort_diable.jpg '),
array(344, 'One-Eyed Jacks ', 'Vengeance aux deux visages (La) ', 'USA ', 1961, 141, 'couleur ', 406, 'vengeance_vis.jpeg '),
array(298, 'Sono otoko, kyobo ni tsuki ', 'Violent cop ', 'Japon ', 1989, 103, 'couleur ', 580, 'violent_cop.gif '),
array(290, 'Moonfleet ', 'Contrebandiers de Moonfleet (Les) ', 'USA ', 1955, 87, 'couleur ', 43, 'moonfleet.gif '),
array(343, 'Dead (The) ', 'Gens de Dublin (Les) ', 'USA ', 1987, 79, 'couleur ', 371, 'gens_dublin.jpeg '),
array(214, 'C era una volta il West ', 'Il était une fois dans l ouest ', 'Italie ', 1968, 165, 'couleur ', 449, 'il_etait1xouest.gif '),
array(318, 'Last Temptation of Christ (The) ', 'Dernière tentation du Christ (La) ', 'USA ', 1988, 164, 'couleur ', 160, 'tente_christ.jpg '),
array(66, 'Vertigo ', 'Sueurs froides ', 'USA ', 1958, 128, 'couleur ', 26, 'sueurs_froides.gif '),
array(41, 'Big Sleep (The) ', 'Grand sommeil (Le) ', 'USA ', 1946, 116, 'NB ', 112, 'grand_sommeil.gif '),
array(216, 'Gone with the Wind ', 'Autant en emporte le vent ', 'USA ', 1939, 238, 'couleur ', 228, 'autant_vent.gif '),
array(402, 'Sciuscià ', 'Sciuscià ', 'Italie ', 1946, 93, 'NB ', 323, 'sciuscia.jpeg '),
array(309, '55 Days at Peking ', '55 jours de Pékin (Les) ', 'USA ', 1963, 150, 'couleur ', 8, '55_jours.jpg '),
array(396, 'Queen Christina ', 'Reine Christine (La) ', 'USA ', 1933, 97, 'NB ', 672, 'reine_christ.gif '),
array(280, 'Star Wars: Episode VI, Return of the Jedi ', 'Retour du Jedi (Le) ', 'USA ', 1983, 135, 'couleur ', 562, 'star_wars.jpg '),
array(349, 'Smultronstället ', 'Fraises sauvages (Les) ', 'Suède ', 1957, 91, 'NB ', 93, 'fraises-sauv.jpeg '),
array(358, 'Rashômon ', 'Rashômon ', 'Japon ', 1950, 88, 'NB ', 242, 'rashomon.jpeg '),
array(179, 'A nos amours ', 'A nos amours ', 'France ', 1983, 95, 'couleur ', 364, 'a_nos_amours.jpeg '),
array(295, 'King in New-York (A) ', 'Roi à New-York ', 'Angleterre ', 1957, 105, 'NB ', 12, 'lumieres_ville.jpeg '),
array(337, 'Little Odessa ', 'Little Odessa ', 'USA ', 1994, 98, 'couleur ', 623, 'little_odessa.gif '),
array(359, 'Cid (El) ', 'Cid (Le) ', 'USA ', 1961, 182, 'couleur ', 642, 'cid.jpeg '),
array(350, 'Narayama bushiko ', 'Ballade de Narayama (la) ', 'Japon ', 1983, 130, 'couleur ', 593, 'narayama.jpeg '),
array(336, 'Homme qui aimait les femmes (L ) ', 'Homme qui aimait les femmes (L ) ', 'France ', 1977, 120, 'couleur ', 193, 'homme_femmes.gif '),
array(207, 'Quiet American (The) ', 'Américain bien tranquille (Un) ', 'USA ', 1958, 120, 'NB ', 100, 'americain_tranq.jpg '),
array(373, 'Ivan Groznyy I ', 'Ivan le Terrible I ', 'Russie ', 1944, 95, 'NB ', 546, 'ivan_terrible.jpeg '),
array(144, 'Gattopardo (Il) ', 'Guépard (Le) ', 'Italie ', 1963, 205, 'couleur ', 313, 'guepard.jpg '),
array(368, 'Finyé ', 'Vent (Le) ', 'Mali ', 1982, 100, 'couleur ', 646, 'cisse4.jpeg '),
array(397, 'Ninotchka ', 'Ninotchka ', 'USA ', 1939, 110, 'NB ', 177, 'ninotchka.gif '),
array(226, 'Bringing Up Baby ', 'Impossible M. Bébé (L ) ', 'USA ', 1938, 102, 'NB ', 112, 'impossible_bebe.gif '),
array(166, 'Psycho ', 'Psychose ', 'USA ', 1960, 109, 'NB ', 26, 'psychose.jpg '),
array(346, 'Profumo di donna ', 'Parfum de femme ', 'Italie ', 1974, 103, 'couleur ', 411, 'parfum_femme.jpeg '),
array(365, 'Trollflöjten ', 'Flûte enchantée (la) ', 'Suède ', 1975, 135, 'couleur ', 93, 'flute_enchantee.jpeg'),
array(387, 'Walk with Love and Death (A) ', 'Promenade avec l amour et la mort ', 'USA ', 1969, 90, 'couleur ', 371, 'promenade2a.jpg '),
array(194, 'Avanti ! ', 'Avanti ! ', 'USA ', 1972, 140, 'couleur ', 10, 'avanti.gif '),
array(261, 'Matrix ', 'Matrix ', 'USA ', 1999, 136, 'couleur ', 539, 'matrix.jpg '),
array(312, 'Glaneurs et la glaneuse (Les) ', 'Glaneurs et la glaneuse (Les) ', 'France ', 2000, 82, 'couleur ', 533, 'glaneurs.gif '),
array(398, 'General (The) ', 'Mécano de la Générale (Le) ', 'USA ', 1927, 75, 'NB ', 676, 'mecano_general.jpeg '),
array(238, 'Yol ', 'Yol ', 'Turquie ', 1982, 114, 'couleur ', 503, 'yol.jpeg '),
array(366, 'Muso (Den) ', 'Jeune fille (La) ', 'Mali ', 1975, 88, 'NB/couleur', 646, 'cisse4.jpeg '),
array(278, 'Star Wars: Episode IV, A New Hope ', 'Guerre des étoiles (La) ', 'USA ', 1977, 125, 'couleur ', 559, 'star_wars.jpg '),
array(167, 'Wo hu cang long ', 'Tigre et dragon ', 'Chine-Hong-Kong ', 2000, 120, 'couleur ', 348, 'tigre_dragon.jpg '),
array(254, 'Amarcord ', 'Amarcord ', 'Italie ', 1973, 127, 'couleur ', 135, 'amarcord.gif '),
array(407, 'Little Caesar ', 'Petit Cesar (Le) ', 'USA ', 1931, 79, 'NB ', 688, 'films_noirs.jpg '),
array(379, 'Morocco ', 'Coeurs brûlés ', 'USA ', 1930, 91, 'NB ', 251, 'morocco.jpeg '),
array(315, 'Marnie ', 'Pas de printemps pour Marnie ', 'USA ', 1964, 130, 'couleur ', 26, 'marnie.jpg '),
array(381, 'Boudu sauvé des eaux ', 'Boudu sauvé des eaux ', 'France ', 1932, 81, 'NB ', 126, 'boudu.jpeg '),
array(382, 'Rebecca ', 'Rebecca ', 'USA ', 1940, 130, 'NB ', 26, 'rebecca.jpg '),
array(380, 'Blonde Venus ', 'Blonde Venus ', 'USA ', 1932, 93, 'NB ', 251, 'blonde_venus.jpeg '),
array(383, 'Spellbound ', 'Maison du Docteur Edwardes (La) ', 'USA ', 1945, 111, 'NB ', 26, 'maison_doc_ed.jpg '),
array(384, 'Hustler (The) ', 'Arnaqueur (L ) ', 'USA ', 1961, 134, 'NB ', 659, 'arnaqueur.jpg '),
array(385, 'Faust ', 'Faust ', 'Allemagne ', 1926, 116, 'NB ', 233, 'faust.jpeg '),
array(341, 'Podium ', 'Podium ', 'France ', 2004, 95, 'couleur ', 627, 'podium.gif '),
array(364, 'Matter of Life and Death (A) ', 'Question de vie ou de mort (Une) ', 'Angleterre ', 1946, 104, 'NB/couleur', 499, 'quest_vie_mort.jpeg '),
array(208, 'Godfather (The) ', 'Parrain (Le) ', 'USA ', 1972, 175, 'couleur ', 405, 'parrain.gif '),
array(294, 'Que viva Mexico ! ', 'Que viva Mexico ! ', 'Mexique ', 1932, 55, 'NB ', 546, 'alexandre_nevski.gif'),
array(423, 'Much Ado About Nothing ', 'Beaucoup de bruit pour rien ', 'Angleterre ', 1993, 111, 'couleur ', 704, 'bruit_rien.jpeg '),
array(304, 'I Walked with a Zombie ', 'Vaudou ', 'USA ', 1943, 69, 'NB ', 584, 'feline.jpeg '),
array(8, 'Jour de fête ', 'Jour de fête ', 'France ', 1948, 76, 'couleur ', 14, 'jour_de_fete.gif '),
array(392, 'Hana-bi ', 'Hana-bi ', 'Japon ', 1997, 103, 'couleur ', 580, 'hana_bi.jpeg '),
array(522, 'Scener ur ett äktenskap ', 'Scènes de la vie conjugale ', 'Suède ', 1975, 167, 'couleur ', 93, 'scenes_conjug.jpeg '),
array(281, 'To Have and Have Not ', 'Port de l angoisse (Le) ', 'USA ', 1944, 100, 'NB ', 112, 'port_angoisse.gif '),
array(363, 'Scarlet Empress ', 'Impératrice rouge (L ) ', 'USA ', 1934, 104, 'NB ', 251, 'red_imperatrice.jpeg'),
array(453, 'His Girl Friday ', 'Dame du vendredi (La) ', 'USA ', 1940, 92, 'NB ', 112, 'dame_vendredi.jpg '),
array(395, 'Picture of Dorian Gray (The) ', 'Portrait de Dorian Gray (Le) ', 'USA ', 1945, 110, 'NB/couleur', 7, 'dorian_gray.gif '),
array(399, 'Steamboat Bill, Jr. ', 'Cadet d eau douce ', 'USA ', 1928, 71, 'NB ', 677, 'cadet_eau.jpeg '),
array(404, 'Metropolis ', 'Metropolis ', 'Allemagne ', 1927, 123, 'NB ', 43, 'metropolis.jpeg '),
array(430, 'Night of the Iguana (The) ', 'Nuit de l iguane (La) ', 'USA ', 1964, 125, 'NB ', 371, 'nuit_iguane.jpg '),
array(338, 'Planet of the Apes ', 'Planète des singes (La) ', 'USA ', 1968, 112, 'couleur ', 624, 'planete_singe.jpg '),
array(429, 'Guerre du feu (La) ', 'Guerre du feu (La) ', 'France ', 1981, 100, 'couleur ', 717, 'guerre_feu.jpg '),
array(269, 'Celluloid Closet (The) ', 'Celluloid Closet (The) ', 'USA ', 1995, 102, 'NB/couleur', 547, 'celluloid.jpg '),
array(210, 'Godfather: Part III (The) ', 'Parrain III (Le) ', 'USA ', 1990, 162, 'couleur ', 405, 'parrain.gif '),
array(138, 'Birth of a Nation ', 'Naissance d une nation ', 'USA ', 1915, 125, 'NB ', 293, 'birth_nation.jpg '),
array(405, 'I Was a Male War Bride ', 'Allez coucher ailleurs ', 'USA ', 1949, 103, 'NB ', 112, 'allez_coucher.jpeg '),
array(283, '400 coups (Les) ', '400 coups (Les) ', 'France ', 1959, 94, 'NB ', 193, '400_coups.jpg '),
array(221, 'Take the Money and Run ', 'Prends l oseille et tire-toi ', 'USA ', 1969, 85, 'couleur ', 139, 'prends_oseille.jpg '),
array(93, 'Singin  in the Rain ', 'Chantons sous la pluie ', 'USA ', 1952, 103, 'couleur ', 220, 'chantons_pluie.jpg '),
array(505, 'Sex, Lies, and Videotape ', 'Sexe, mensonges et vidéo ', 'USA ', 1989, 100, 'couleur ', 285, 'sexe_mensonges.jpeg '),
array(479, 'Oktyabr ', 'Octobre ', 'Russie ', 1928, 95, 'NB ', 546, 'octobre.jpeg '),
array(409, 'Petrified Forest (the) ', 'Forêt pétrifiée (La) ', 'USA ', 1936, 83, 'NB ', 691, 'films_noirs.jpg '),
array(140, 'Duck Soup ', 'Soupe au canard (La) ', 'USA ', 1933, 70, 'NB ', 296, 'duck_soup.jpg '),
array(410, 'Angels with Dirty Faces ', 'Anges aux figures sales (Les) ', 'USA ', 1938, 97, 'NB ', 261, 'films_noirs.jpg '),
array(420, 'Blechtrommel (Die) ', 'Tambour (Le) ', 'Allemagne ', 1979, 142, 'couleur ', 700, 'tambour.gif '),
array(414, 'All That Jazz ', 'Que le spectacle commence ', 'USA ', 1979, 123, 'couleur ', 282, 'spectacle_com.gif '),
array(475, 'Phantom of the Paradise ', 'Phantom of the Paradise ', 'USA ', 1974, 92, 'couleur ', 769, 'phantom_paradis.jpeg'),
array(124, 'Seven Year Itch (The) ', 'Sept ans de réflexion ', 'USA ', 1955, 105, 'couleur ', 10, '7ans.gif '),
array(450, 'Magnificent Ambersons (The) ', 'Splendeur des Amberson (La) ', 'USA ', 1942, 88, 'NB ', 171, 'splendeur_amb.jpg '),
array(240, 'Player (The) ', 'Player (The) ', 'USA ', 1992, 124, 'couleur ', 491, 'player.gif '),
array(422, 'Flor de mi secreto (La) ', 'Fleur de mon secret (La) ', 'Espagne ', 1995, 103, 'couleur ', 89, 'fleur_secret.jpeg '),
array(313, 'Kuroi ame ', 'Pluie noire ', 'Japon ', 1989, 123, 'NB ', 593, 'pluie_noire.jpeg '),
array(417, 'Vie est un roman (La) ', 'Vie est un roman (La) ', 'France ', 1983, 110, 'couleur ', 132, 'vie_roman.gif '),
array(421, 'Riff-Raff ', 'Riff-Raff ', 'Angleterre ', 1990, 95, 'couleur ', 332, 'riff_raff.jpeg '),
array(418, 'Tout le monde il est beau, ... ', 'Tout le monde il est beau, ... ', 'France ', 1972, 90, 'couleur ', 505, 'monde_bo_gentil.jpeg'),
array(456, 'Bidone (Il) ', 'Bidone (Il) ', 'Italie ', 1955, 109, 'NB ', 135, 'bidone.jpeg '),
array(539, 'Tirez sur le pianiste ', 'Tirez sur le pianiste ', 'France ', 1960, 80, 'NB ', 193, 'tirez_pianiste.jpeg '),
array(428, 'Indiana Jones and the Last Crusade ', 'Indiana Jones et la dernière croisade ', 'USA ', 1989, 127, 'couleur ', 203, 'Indiana.jpg '),
array(425, 'Jules et Jim ', 'Jules et Jim ', 'France ', 1962, 105, 'NB ', 193, 'jules_jim.jpg '),
array(335, 'Giant ', 'Géant ', 'USA ', 1956, 293, 'couleur ', 571, 'geant.gif '),
array(442, 'Gigi ', 'Gigi ', 'USA ', 1958, 119, 'couleur ', 229, 'gigi.jpeg '),
array(325, 'A Fei jing juen ', 'Nos années sauvages ', 'Chine-Hong-Kong ', 1991, 94, 'couleur ', 90, 'annees_sauvages.jpg '),
array(168, 'Dekalog ', 'Décalogue (Le) ', 'Pologne ', 1988, 550, 'couleur ', 205, 'decalogue.jpg '),
array(376, 'Ba wang bie ji ', 'Adieu ma concubine ', 'Chine-Hong-Kong ', 1993, 171, 'couleur ', 653, 'adieu_concub.jpeg '),
array(129, 'Fa yeung nin wa ', 'In the mood for love ', 'Chine-Hong-Kong ', 2000, 98, 'couleur ', 90, 'in_the_mood.jpg '),
array(502, 'Petits arrangements avec les morts ', 'Petits arrangements avec les morts ', 'France ', 1994, 104, 'couleur ', 820, 'petits_arrang.jpeg '),
array(431, 'Lantana ', 'Lantana ', 'Australie ', 2001, 121, 'couleur ', 718, 'lantana.jpeg '),
array(432, 'Yadon ilaheyya ', 'Intervention divine ', 'Palestine ', 2002, 92, 'couleur ', 721, 'intervention.jpg '),
array(451, 'Suspicion ', 'Soupçons ', 'USA ', 1941, 99, 'NB ', 26, 'soupcons.jpeg '),
array(424, 'Immortel (ad vitam) ', 'Immortel (ad vitam) ', 'France ', 2004, 102, 'couleur ', 709, 'immortel.jpg '),
array(331, 'Ultimo tango a Parigi ', 'Dernier tango à Paris ', 'Italie ', 1972, 136, 'couleur ', 591, 'tango_Paris.gif '),
array(499, 'Elephant ', 'Elephant ', 'USA ', 2003, 81, 'couleur ', 816, 'elephant.jpeg '),
array(68, 'All about Eve ', 'Eve ', 'USA ', 1950, 138, 'NB ', 100, 'eve.jpg '),
array(326, '2046 ', '2046 ', 'Chine-Hong-Kong ', 2004, 129, 'NB/couleur', 90, '2046.jpg '),
array(82, 'Conte d automne ', 'Conte d automne ', 'France ', 1998, 112, 'couleur ', 204, 'conte_automne.jpg '),
array(285, 'Party (The) ', 'Party (The) ', 'USA ', 1968, 99, 'couleur ', 11, 'party.gif '),
array(444, 'Aviator (The) ', 'Aviator (The) ', 'USA ', 2004, 170, 'couleur ', 160, 'aviator.jpg '),
array(447, 'Phantom of the Opera (The) ', 'Fantôme de l Opéra (Le) ', 'USA ', 1925, 92, 'NB ', 739, 'fantome_opera.jpg '),
array(292, 'Pauline à la plage ', 'Pauline à la plage ', 'France ', 1983, 94, 'couleur ', 204, 'pauline_a_plage.jpg '),
array(58, 'On connaît la chanson ', 'On connaît la chanson ', 'France ', 1997, 120, 'couleur ', 132, 'chanson.jpg '),
array(443, 'Father s Little Dividend ', 'Allons donc, papa ! ', 'USA ', 1951, 82, 'NB ', 229, 'allons_papa.jpg '),
array(13, 'Piano (The) ', 'Leçon de piano (La) ', 'Nouvelle-Zélande ', 1993, 115, 'couleur ', 19, 'lecon_piano.jpg '),
array(270, 'Shanghai Gesture (The) ', 'Shanghai Gesture (The) ', 'USA ', 1941, 99, 'NB ', 251, 'shanghaigesture.jpeg'),
array(469, 'Philadelphia Story (The) ', 'Indiscrétions ', 'USA ', 1940, 112, 'NB ', 213, 'indiscretions.gif '),
array(327, 'Aprile ', 'Aprile ', 'Italie ', 1998, 78, 'couleur ', 394, 'aprile.gif '),
array(437, 'Lady Vanishes (The) ', 'Femme disparaît (Une) ', 'Angleterre ', 1938, 97, 'NB ', 26, 'femme_disp.jpeg '),
array(536, 'Detour ', 'Detour ', 'USA ', 1945, 67, 'NB ', 867, 'detour.jpeg '),
array(357, 'Peau d âne ', 'Peau d âne ', 'France ', 1970, 100, 'couleur ', 20, 'peau_ane.jpeg '),
array(483, 'Amadeus ', 'Amadeus ', 'USA ', 1984, 160, 'couleur ', 782, 'amadeus.jpg '),
array(461, 'Salt of the Earth ', 'Sel de la terre (Le) ', 'USA ', 1954, 94, 'NB ', 758, 'sel_terre.jpg '),
array(457, 'Voce della luna (La) ', 'Voce della luna (La) ', 'Italie ', 1990, 120, 'couleur ', 135, 'voce_luna.jpeg '),
array(449, 'Private Life of Henry VIII (The) ', 'Vie privée d Henry VIII (La) ', 'USA ', 1933, 97, 'NB ', 740, 'vie_henry8.jpg '),
array(274, 'On purge bébé ', 'On purge bébé ', 'France ', 1931, 62, 'NB ', 126, 'chienne.jpeg '),
array(535, 'Bride & Prejudice ', 'Coup de foudre à Bollywod ', 'Angleterre ', 2004, 107, 'couleur ', 864, 'coup_foudre_Bol.jpeg'),
array(322, 'Solyaris ', 'Solaris ', 'Russie ', 1972, 165, 'NB/couleur', 600, 'solaris.gif '),
array(192, 'Soliti ignoti (I) ', 'Pigeon (Le) ', 'Italie ', 1958, 111, 'NB ', 397, 'pigeon.jpeg '),
array(481, 'Secret Agent ', 'Quatre de l espionnage ', 'Angleterre ', 1936, 86, 'NB ', 26, '4_espionnage.jpeg '),
array(59, 'Limelight ', 'Feux de la rampe (Les) ', 'USA ', 1952, 141, 'NB ', 12, 'feux_rampe.gif '),
array(25, 'Gold Rush (The) ', 'Ruée vers l or (La) ', 'USA ', 1925, 98, 'NB ', 12, 'ruee_vers_or.jpg '),
array(268, 'Bronenosets Potyomkin ', 'Cuirassé Potemkine (Le) ', 'Russie ', 1925, 75, 'NB ', 546, 'potemkine.gif '),
array(462, 'Kid (The) ', 'Kid (The) ', 'USA ', 1921, 50, 'NB ', 12, 'kid.jpg '),
array(458, 'Veer-Zaara ', 'Veer-Zaara ', 'Inde ', 2004, 192, 'couleur ', 753, 'veer_zaara.jpeg '),
array(1, 'Pandora and the flying Dutchman ', 'Pandora ', 'Angleterre ', 1951, 120, 'couleur ', 7, 'pandora.gif '),
array(14, 'Demoiselles de Rochefort (Les) ', 'Demoiselles de Rochefort (Les) ', 'France ', 1967, 120, 'couleur ', 20, 'demoiselles_roch.gif'),
array(473, 'Saikaku ichidai onna ', 'Vie d O Haru, femme galante ', 'Japon ', 1952, 120, 'NB ', 648, 'oharu.jpeg '),
array(434, 'Fantastic Voyage ', 'Voyage fantastique (Le) ', 'USA ', 1966, 100, 'couleur ', 723, 'voyage_fant.jpg '),
array(472, 'Anne of the Indies ', 'Flibustière des Antilles (La) ', 'USA ', 1951, 81, 'couleur ', 584, 'flibustiere.gif '),
array(470, 'Batman ', 'Batman ', 'USA ', 1989, 126, 'couleur ', 216, 'batman.jpg '),
array(209, 'Godfather: Part II (The) ', 'Parrain II (Le) ', 'USA ', 1974, 200, 'couleur ', 405, 'parrain.gif '),
array(355, 'Armée des ombres (L ) ', 'Armée des ombres (L ) ', 'France ', 1969, 136, 'couleur ', 447, 'armee_ombres.jpeg '),
array(378, 'Ginger e Fred ', 'Ginger et Fred ', 'Italie ', 1986, 125, 'couleur ', 135, 'ginger_fred.jpeg '),
array(97, 'Wizard of Oz (The) ', 'Magicien d Oz (Le) ', 'USA ', 1939, 101, 'NB/couleur', 228, 'magicien_oz.gif '),
array(438, 'Shining (The) ', 'Shining (The) ', 'USA ', 1980, 119, 'couleur ', 18, 'shining.jpg '),
array(478, 'Stachka ', 'Grève (La) ', 'Russie ', 1925, 82, 'NB ', 546, 'octobre.jpeg '),
array(503, 'Yojimbo ', 'Garde du corps (Le) ', 'Japon ', 1961, 110, 'NB ', 242, 'garde_corps.jpeg '),
array(246, 'Big Lebowski (The) ', 'Big Lebowski (The) ', 'USA ', 1998, 117, 'couleur ', 222, 'big_lebo.jpg '),
array(353, 'Manèges ', 'Manèges ', 'France ', 1950, 91, 'NB ', 508, 'maneges.jpeg '),
array(175, 'Dayereh ', 'Cercle (Le) ', 'Iran ', 2000, 90, 'couleur ', 355, 'cercle.jpg '),
array(215, 'Royal Wedding ', 'Mariage royal ', 'USA ', 1951, 93, 'couleur ', 220, 'mariage_royal.gif '),
array(329, 'Eternal Sunshine of the Spotless Mind ', 'Eternal Sunshine of the Spotless Mind ', 'USA ', 2004, 108, 'couleur ', 609, 'eternel_sunshine.jpg'),
array(490, 'Shadow of a Doubt ', 'Ombre d un doute (L ) ', 'USA ', 1943, 108, 'NB ', 26, 'ombre_doute.jpeg '),
array(486, '8 femmes ', '8 femmes ', 'France ', 2002, 111, 'couleur ', 791, '8_femmes.jpeg '),
array(38, 'Pierrot le fou ', 'Pierrot le fou ', 'France ', 1965, 110, 'couleur ', 13, 'pierrot_le_fou.jpg '),
array(104, 'A bout de souffle ', 'A bout de souffle ', 'France ', 1960, 87, 'NB ', 13, 'bout_souffle.jpg '),
array(7, 'Mépris (Le) ', 'Mépris (Le) ', 'France ', 1963, 105, 'couleur ', 13, 'mepris.jpg '),
array(484, 'Travaux, on sait quand ça commence... ', 'Travaux, on sait quand ça commence... ', 'France ', 2005, 90, 'couleur ', 785, 'travaux.jpg '),
array(496, 'Joueur d échecs (Le) ', 'Joueur d échecs (Le) ', 'France ', 1938, 70, 'NB ', 814, 'joueur_echecs.jpg '),
array(489, 'Once Upon a Time in America ', 'Il était une fois en Amérique ', 'USA ', 1984, 229, 'couleur ', 449, 'il_etait1x_USA.jpeg '),
array(275, 'Ed Wood ', 'Ed Wood ', 'USA ', 1994, 127, 'NB ', 216, 'ed_wood.jpg '),
array(89, 'Edward Scissorhands ', 'Edward aux mains d argent ', 'USA ', 1990, 105, 'couleur ', 216, 'Edward.gif '),
array(520, 'India Song ', 'India Song ', 'France ', 1975, 120, 'couleur ', 845, 'india_song.jpg '),
array(83, 'Trois couleurs : rouge ', 'Trois couleurs : rouge ', 'France ', 1994, 99, 'couleur ', 205, 'rouge.gif '),
array(171, 'Notorious ', 'Enchaînés (Les) ', 'USA ', 1946, 101, 'NB ', 26, 'enchaines.jpg '),
array(63, 'Some Like It Hot ', 'Certains l aiment chaud ', 'USA ', 1959, 120, 'NB ', 10, 'certains_chaud.jpg '),
array(510, 'Carmen Jones ', 'Carmen Jones ', 'USA ', 1954, 105, 'couleur ', 336, 'carmen_jones.jpg '),
array(506, 'Johnny Got His Gun ', 'Johnny s en va en guerre ', 'USA ', 1971, 111, 'NB/couleur', 827, 'johnny_guerre.jpeg '),
array(267, 'Biches (Les) ', 'Biches (Les) ', 'France ', 1968, 100, 'couleur ', 504, 'biches.jpg '),
array(75, 'Carmen ', 'Carmen ', 'France ', 1984, 152, 'couleur ', 187, 'carmen.jpg '),
array(509, 'Three Ages ', '3 âges (Les) ', 'USA ', 1923, 63, 'NB ', 150, '3_ages.jpg '),
array(491, 'Girls (Les) ', 'Girls (Les) ', 'USA ', 1957, 114, 'couleur ', 213, 'girls.jpeg '),
array(517, 'Cluny Brown ', 'Folle ingénue (La) ', 'USA ', 1946, 100, 'NB ', 177, 'folle_ingenue.jpg '),
array(514, 'Dolls ', 'Dolls ', 'Japon ', 2002, 114, 'couleur ', 580, 'dolls.jpg '),
array(516, 'Kabhi Khushi Kabhie Gham... ', 'Famille indienne (La) ', 'Inde ', 2001, 210, 'NB/couleur', 840, 'famille_ind.jpg '),
array(513, 'Land and Freedom ', 'Land and Freedom ', 'Angleterre ', 1995, 109, 'couleur ', 332, 'land_freedom.jpeg '),
array(142, 'Oscar ', 'Oscar ', 'France ', 1967, 85, 'couleur ', 307, 'oscar.jpg '),
array(511, 'Nuits de la pleine lune (Les) ', 'Nuits de la pleine lune (Les) ', 'France ', 1984, 100, 'couleur ', 204, 'nuits_lune.jpg '),
array(518, 'Rebel Without a Cause ', 'Fureur de vivre (La) ', 'USA ', 1955, 111, 'couleur ', 8, 'fureur_vivre.jpg '),
array(521, 'Dracula ', 'Dracula ', 'USA ', 1931, 75, 'NB ', 294, 'dracula.jpg '),
array(52, 'Mon oncle d Amérique ', 'Mon oncle d Amérique ', 'France ', 1980, 120, 'couleur ', 132, 'oncle_amerique.gif '),
array(523, 'Sabotage ', 'Agent secret ', 'Angleterre ', 1936, 76, 'NB ', 26, 'agent_secret.jpg '),
array(537, 'Offret ', 'Sacrifice (Le) ', 'Suède ', 1986, 149, 'NB ', 600, 'sacrifice.jpeg '),
array(538, 'Frau im Mond ', 'Femme sur la lune (La) ', 'Allemagne ', 1929, 163, 'NB ', 43, 'femme_lune.jpeg '),
array(540, 'Garde à vue ', 'Garde à vue ', 'France ', 1981, 86, 'couleur ', 869, 'garde_a_vue.jpeg '),
array(524, 'Wild at Heart ', 'Sailor et Lula ', 'USA ', 1990, 124, 'couleur ', 179, 'sailor_lula.jpg '),
array(534, 'Horse Feathers ', 'Plumes de cheval ', 'USA ', 1932, 68, 'NB ', 862, 'plumes_cheval.jpeg '),
array(532, 'Kermesse héroïque (La) ', 'Kermesse héroïque (La) ', 'France ', 1935, 110, 'NB ', 861, 'kermesse_hero.jpeg '),
array(507, 'Last Wave (The) ', 'Dernière vague (La) ', 'Australie ', 1977, 106, 'couleur ', 496, 'derniere_vague.jpeg '),
array(541, 'Play It Again, Sam ', 'Tombe les filles et tais-toi ', 'USA ', 1972, 85, 'couleur ', 871, 'tombe_filles.jpeg '),
array(542, 'Tsubaki Sanjûrô ', 'Sanjuro ', 'Japon ', 1962, 96, 'NB ', 242, 'sanjuro.jpeg '),
array(544, 'Fly (The) ', 'Mouche (La) ', 'Canada ', 1986, 95, 'couleur ', 194, 'mouche.jpeg '),
array(549, 'Journal d une femme de chambre (Le) ', 'Journal d une femme de chambre (Le) ', 'France ', 1964, 97, 'NB ', 15, 'journal_femme.jpeg '),
array(255, 'Baisers volés ', 'Baisers volés ', 'France ', 1968, 90, 'couleur ', 193, 'baisers_voles.gif '),
array(543, 'From Russia with Love ', 'Bons baisers de Russie ', 'Angleterre ', 1963, 110, 'couleur ', 873, 'bons_baisers.jpeg '),
array(552, 'Three Days of the Condor ', 'Trois jours du Condor (Les) ', 'USA ', 1975, 117, 'couleur ', 240, '3_jours_condor.jpeg '),
array(545, 'Lagaan: Once Upon a Time in India ', 'Lagaan ', 'Inde ', 2001, 224, 'couleur ', 876, 'lagaan.jpeg '),
array(546, 'Milou en mai ', 'Milou en mai ', 'France ', 1990, 107, 'couleur ', 878, 'milou_mai.jpeg '),
array(547, 'Hori, ma panenko ', 'Au feu, les pompiers ', 'Tchécoslovaquie ', 1967, 71, 'couleur ', 782, 'au_feu.jpeg '),
array(550, 'Mariée était en noir (La) ', 'Mariée était en noir (La) ', 'France ', 1968, 107, 'couleur ', 193, 'mariee_noir.jpeg '),
array(548, 'Fargo ', 'Fargo ', 'USA ', 1996, 98, 'couleur ', 222, 'fargo.jpeg '),
array(555, 'Manhattan ', 'Manhattan ', 'USA ', 1979, 96, 'NB ', 139, 'manhattan.jpeg '),
array(554, 'Animal Crackers ', 'Explorateur en folie (L ) ', 'USA ', 1930, 97, 'NB ', 884, 'explorateur.jpeg '),
array(551, 'Akitsu onsen ', 'Source thermale d Akitsu (La) ', 'Japon ', 1962, 113, 'couleur ', 881, 'source_thermale.jpeg'),
array(200, 'Sorpasso (Il) ', 'Fanfaron (Le) ', 'Italie ', 1962, 105, 'NB ', 411, 'fanfaron.gif '),
array(199, 'Mostri (I) ', 'Monstres (Les) ', 'Italie ', 1963, 115, 'NB ', 411, 'fanfaron.gif '),
array(553, 'Rokudenashi ', 'Bon à rien ', 'Japon ', 1960, 88, 'NB ', 881, 'yoshida.jpeg '),
array(559, 'Stardust Memories ', 'Stardust Memories ', 'USA ', 1980, 91, 'NB ', 139, 'stardust_memo.jpeg '),
array(561, 'Warnung vor einer heiligen Nutte ', 'Prenez garde à la sainte putain ', 'Allemagne ', 1971, 103, 'couleur ', 663, 'prenez_garde.jpeg '),
array(57, 'Strada (La) ', 'Strada (La) ', 'Italie ', 1954, 108, 'NB ', 135, 'strada.jpeg '),
array(302, 'Vitelloni (I) ', 'Vitelloni (I) ', 'Italie ', 1953, 104, 'NB ', 135, 'vitelloni.jpeg '),
array(560, 'Broadway Danny Rose ', 'Broadway Danny Rose ', 'USA ', 1984, 84, 'NB ', 139, 'broadway_dany.jpeg '),
array(556, 'Avventura (L ) ', 'Avventura (L ) ', 'Italie ', 1960, 145, 'NB ', 612, 'avventura.jpeg '),
array(566, 'Sweet and Lowdown ', 'Accords et désaccords ', 'USA ', 1999, 95, 'couleur ', 139, 'accords_de.jpeg '),
array(107, 'Husbands and Wives ', 'Maris et femmes ', 'USA ', 1992, 108, 'couleur ', 139, 'maris_femmes.gif '),
array(562, 'Professione: reporter ', 'Profession Reporter ', 'Italie ', 1975, 126, 'couleur ', 612, 'prof_reporter.jpeg '),
array(564, 'Funny Face ', 'Drôle de frimousse ', 'USA ', 1957, 103, 'couleur ', 220, 'drole_frimousse.jpeg'),
array(567, 'The Nightmare Before Christmas ', 'Etrange Noël de Monsieur Jack (L ) ', 'USA ', 1993, 76, 'couleur ', 216, 'etrange_noel.jpeg '),
array(565, 'You Only Live Once ', 'J ai le droit de vivre ', 'USA ', 1937, 86, 'NB ', 43, 'droit_vivre.jpeg '),
array(568, 'Topaz ', 'Etau (L ) ', 'USA ', 1969, 127, 'couleur ', 26, 'etau.jpeg ')
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
