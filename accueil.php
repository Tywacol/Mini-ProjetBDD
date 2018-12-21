<HTML>

<HEAD>
<TITLE>Liste des Proc&eacute;d&eacute;s</TITLE>
<!--Lien avec une feuille de style pour embellir la presentation-->
<link rel="stylesheet" href="CSS_stylus.css" type="text/css">
</HEAD>
<BODY>

<?php
echo "</BR>";
echo "<TR> SERVICE 1  & 2 : Choissisez votre procédé pour afficher la liste des opérations nécéssaires.  <TR>";
echo "</BR>";
echo "</BR>";

error_reporting(E_ALL);

require_once('connexion.php');
$query="SELECT * FROM Liste_procede;";

$result = pg_Exec($link, $query ) or die("Erreur SQL !<br />$query<br />".pg_last_error()) ;	

// Affichage de la table résultat dans un tableau

$num = pg_NumRows($result); // récupération du nombre de ligne de la table résultat

echo "<form method=\"POST\" action=\"affichage_op.php\">" ; // début de formulaire

echo "<TABLE BORDER=2>"; // début de tableau
print("\n");
echo "<TR>"; // début de ligne
echo "<TD>nom Procede</TD>";
echo "<TD>choix Procede</TD>";
echo "</TR>"; // fin de ligne 
print("\n");
for ($i=0; $i<$num;$i++) // pour chaque ligne de la table résultat
   {
    $p_nom=pg_Result($result, $i, "nom");
       echo "<TR>"; // début de ligne
        echo "<TD>".pg_Result($result, $i, "nom")."</TD>"; // première case de la ligne
        echo "<TD><input type=\"radio\" name=\"nom_procede\" value=\"$p_nom\"/>choisir ce procede</TD>" ; 
       echo "</TR>"; // fin de ligne 
        print("\n");
   }
echo "</TABLE>"; // fin de tableau
echo "</BR>";
echo "<input value=\"Valider\" type=\"submit\"/>" ;
echo "</form>" ;



echo "</BR>";
echo "<TR> SERVICE 3 : Choissisez votre procédé auquel vous voulez ajouter une opération.<TR>";
echo "</BR>";
echo "</BR>";

// _____________________________Service 3 ________________________________


$query="SELECT * FROM Liste_procede ";

$result = pg_Exec($link, $query ) or die("Erreur SQL !<br />$query<br />".pg_last_error()) ;	

// Affichage de la table résultat dans un tableau

$num = pg_NumRows($result); // récupération du nombre de ligne de la table résultat

echo "<form method=\"POST\" action=\"selectionprocede.php\">" ; // début de formulaire
echo "<TABLE BORDER=2>"; // début de tableau
print("\n");
echo "<TR>"; // début de ligne
echo "<TD>Procede</TD>";
echo "<TD>Votre choix</TD>";
echo "</TR>"; // fin de ligne 
print("\n");
for ($i=0; $i<$num;$i++) // pour chaque ligne de la table résultat
   {	$p_nom=pg_Result($result, $i, "nom");
       echo "<TR>"; // début de ligne
        echo "<TD>$p_nom</TD>"; // première case de la ligne
        echo "<TD><input type=\"radio\" name=\"nom_procede\" value=\"$p_nom\"/>choisir ce procede</TD>" ; // quatrième case de la ligne
        
        
       echo "</TR>"; // fin de ligne 
        print("\n");
   }
   
echo "</TABLE>"; // fin de tableau
echo "</BR>";
echo "<input value=\"Valider\" type=\"submit\"/>" ;
echo "</form>" ;

// _____________ Service 4 _____________________

echo "</BR>";
echo "<TR> SERVICE 4 : Choissisez votre procédé pour voir les produits consommés avec la masse consommé.<TR>";
echo "</BR>";
echo "</BR>";

$query="SELECT * FROM Liste_procede;";

$result = pg_Exec($link, $query ) or die("Erreur SQL !<br />$query<br />".pg_last_error()) ;	

// Affichage de la table résultat dans un tableau

$num = pg_NumRows($result); // récupération du nombre de ligne de la table résultat

echo "<form method=\"POST\" action=\"produitconsomme.php\">" ; // début de formulaire

echo "<TABLE BORDER=2>"; // début de tableau
print("\n");
echo "<TR>"; // début de ligne
echo "<TD>nom Procede</TD>";
echo "<TD>choix Procede</TD>";
echo "</TR>"; // fin de ligne 
print("\n");
for ($i=0; $i<$num;$i++) // pour chaque ligne de la table résultat
   {
    $p_nom=pg_Result($result, $i, "nom");
       echo "<TR>"; // début de ligne
        echo "<TD>".pg_Result($result, $i, "nom")."</TD>"; // première case de la ligne
        echo "<TD><input type=\"radio\" name=\"nom_procede\" value=\"$p_nom\"/>choisir ce procede</TD>" ; 
       echo "</TR>"; // fin de ligne 
        print("\n");
   }
echo "</TABLE>"; // fin de tableau
echo "</BR>";
echo "<input value=\"Valider\" type=\"submit\"/>" ;
echo "</form>" ;


?>
</BODY>

</HTML>
