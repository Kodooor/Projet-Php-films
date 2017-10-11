<?php


// Connexion à la base de donnée
mysql_connect('serveur','user','password');
mysql_select_db('dbname');


// Le nom de notre table
$tablename = 'test';


// Tri sur colonne
$tri_autorises = array('titre','annee','realisateur','genre');
$order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'annee';


// Sens du tri
$order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';


// Préparation de la requête
$sql = "
    SELECT *
    FROM {$tablename}
    ORDER BY {$order_by} {$order_dir}
";
$result = mysql_query($sql);


// Notre fonction qui affiche les liens
function sort_link($text, $order=false)
{
    global $order_by, $order_dir;

    if(!$order)
        $order = $text;

    $link = '<a href="?order=' . $order;
    if($order_by==$order && $order_dir=='ASC')
        $link .= '&inverse=true';
    $link .= '"';
    if($order_by==$order && $order_dir=='ASC')
        $link .= ' class="order_asc"';
    elseif($order_by==$order && $order_dir=='DESC')
        $link .= ' class="order_desc"';
    $link .= '>' . $text . '</a>';

    return $link;
}


// Affichage
?>
<style type="text/css">
a.order_asc,
a.order_desc:hover {
    padding-right:15px;
    background:transparent url(s_asc.png) right no-repeat;
}
a.order_desc,
a.order_asc:hover {
    padding-right:15px;
    background:transparent url(s_desc.png) right no-repeat;
}
</style>

<table>
    <tr>
        <th><?php echo sort_link('Id', 'id') ?></th>
        <th><?php echo sort_link('Firstname', 'firstname') ?></th>
        <th><?php echo sort_link('Lastname', 'lastname') ?></th>
        <th><?php echo sort_link('Email', 'email') ?></th>
        <th><?php echo sort_link('Last Connection', 'last_connection') ?></th>
    </tr>
<?php while( $row=mysql_fetch_assoc($result) ) : ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['firstname'] ?></td>
        <td><?php echo $row['lastname'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['last_connection'] ?></td>
    </tr>
<?php endwhile ?>
</table>





<!-- Bien que le code ne soit pas très compliqué, un petite explication ne fera pas de mal :

    Le tableau PHP $tri_autorises doit contenir les noms des colonnes sur lesquels on veut effectuer les tris, cela permet d'éviter des injections SQL ou autres erreurs de syntaxe.
    Si aucun paramètre n'est fourni, on utilisera la collone id par défaut (à vous de spécifier celle que vous voulez par défaut).
    Si le paramètre inverse existe, le tri se fera dans l'ordre inverse.
    La fonction sort_link() retourne le lien qui permet de faire le tri sur une colonne.
    Le premier paramètre $text est le texte à afficher, l'ancre du lien.
    Le second paramètre $order est le nom de la colonne concernée par ce lien.

J'ai ajouté un peu de CSS afin d'afficher les images, ces images proviennent de phpMyAdmin -->
