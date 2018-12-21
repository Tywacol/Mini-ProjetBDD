<HTML>

<HEAD>
<TITLE>Liste des produits pour un procede</TITLE>
<!--Lien avec une feuille de style pour embellir la presentation-->
<link rel="stylesheet" href="CSS_stylus.css" type="text/css">
</HEAD>

<BODY>
<?php
error_reporting(E_ALL);
require_once('connexion.php');
extract($_POST);

$query="SELECT * FROM produits_consommes_pour_proc where procede = '$nom_procede' ";

$result = pg_Exec($link, $query ) or die("Erreur SQL !<br />$query<br />".pg_last_error()) ;	

// Affichage de la table résultat dans un tableau

$num = pg_NumRows($result); // récupération du nombre de ligne de la table résultat

echo "<TABLE BORDER=2>"; // début de tableau
print("\n");
echo "<TR>"; // début de ligne
echo "<TD>Produit</TD>";
echo "<TD>Masse</TD>"; // &acute; = e accent aigu
echo "</TR>"; // fin de ligne 
print("\n");
for ($i=0; $i<$num;$i++) // pour chaque ligne de la table résultat
   {
       echo "<TR>"; // début de ligne
        echo "<TD>".pg_Result($result, $i, "PRODUIT")."</TD>"; // première case de la ligne
       echo "<TD>".pg_Result($result, $i, "MASSE_CONSOMME")."</TD>";  // deuxième case de la ligne
       echo "</TR>"; // fin de ligne 
        print("\n");
   }
echo "</TABLE>"; // fin de tableau

?>
</BODY>

</HTML>

<HTML>
