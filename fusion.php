<HTML>

<HEAD>
<TITLE>Liste des projets d'un &eacute;tudiant</TITLE>
</HEAD>

<BODY>
<?php
error_reporting(E_ALL);

require_once('connexion.php');

extract($_POST);


// POURQUOI ? ->Demander entre SESSION; COOKIES ET GET, POST
//$var_value = $_GET['varname'];

echo "<h1>Ajout de la relation Procede/Operation</h1>" ;

$query="INSERT INTO Utilise VALUES('$varname','$nom_operation') ";

$result = pg_Exec($link, $query ) or die("Erreur SQL !<br />$query<br />".pg_last_error()) ;	

// Affichage de la table r&eacute;sultat dans un tableau
?>
</BODY>

</HTML>
