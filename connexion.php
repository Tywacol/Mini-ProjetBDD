<?php
$machine='houplin.studserv.deule.net' ;
$user='ccalleri' ;
$pwd='postgres' ;
$db='bddprojetCallerisa' ;
$link = 	pg_connect("host=$machine user=$user password=$pwd dbname=$db") 
	or die('Erreur de Connection !<br />'.pg_last_error()) ;
?>
