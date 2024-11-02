<?php 



	$stringData="zeaeza";
	$link = mysql_connect("localhost", "root", "");
	$select_dba = mysql_select_db ("crm",$link); 
	$az=addslashes($stringData);
	$req2="INSERT INTO `crm`.`document` (`id_document` ,`nom` ,`type` ,`activite_lier` ,`id_utilisateur`)VALUES (NULL , '$az', 'docx', 'azzaazez', '10')";
    $result = mysql_query($req2);
	
	?>