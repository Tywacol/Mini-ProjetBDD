<HTML>

<HEAD>
<TITLE>Selection du procede</TITLE>
<!--Lien avec une feuille de style pour embellir la presentation-->
<link rel="stylesheet" href="CSS_stylus.css" type="text/css">
</HEAD>

<BODY>
<?php
error_reporting(E_ALL);
require_once('connexion.php');
extract($_POST);

$query="SELECT nom FROM liste_operations ";
$query.="WHERE nom NOT IN (SELECT Nom_Operation FROM Operations_pour_Procede where Nom_Procede_Correspondant = '$nom_procede')";


$result = pg_Exec($link, $query ) or die("Erreur SQL !<br />$query<br />".pg_last_error()) ;	

// Affichage de la table résultat dans un tableau

$num = pg_NumRows($result); // récupération du nombre de ligne de la table résultat


echo "<form method=\"POST\" action=\"fusion.php\">" ; // début de formulaire
echo "<TABLE BORDER=2>"; // début de tableau
print("\n");
echo "<TR>"; // début de ligne
echo "<TD>Operation</TD>";
echo "<TD>Votre choix</TD>";
echo "</TR>"; // fin de ligne 
print("\n");


for ($i=0; $i<$num;$i++) // pour chaque ligne de la table résultat
   {	$q_nom=pg_Result($result, $i, "nom");
       echo "<TR>"; // début de ligne
        echo "<TD>$q_nom</TD>"; // première case de la ligne
        echo "<TD><input type=\"radio\" name=\"nom_operation\" value=\"$q_nom\"/>choisir cette operation</TD>" ; // quatrième case de la ligne
       echo "</TR>"; // fin de ligne 
        print("\n");
   }
   
echo "</TABLE>"; // fin de tableau

// Variable intermédiaire pour l'envoyer dans fusion.php
echo "<form method=\"get\" action=\"fusion.php\">";
    echo "<input type=\"hidden\" name=\"varname\" value=\"$nom_procede\">";
    echo "<input value=\"Fuuusion\" type=\"submit\">";
echo "</form>";

?>
</BODY>

</HTML>

<HTML>














