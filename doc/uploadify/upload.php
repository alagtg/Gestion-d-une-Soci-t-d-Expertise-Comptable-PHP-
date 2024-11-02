<?php
// JQuery File Upload Plugin v1.4.1 by RonnieSan - (C)2009 Ronnie Garcia
if (!empty($_FILES)) {
//if(isset($tempFile)|| isset($targetPath)     ||  isset($targetFile)     )


	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	// mkdir(str_replace('//','/',$targetPath), 0755, true);
	
	
	$link = mysqli_connect("localhost", "root", "");
	$select_dba = mysqli_select_db ("crm",$link); 
	$az= $targetFile;
	$id=$_GET["id"];
	$n=$_GET["nom"];
	$name=$_FILES['Filedata']['name'];
	$req2="INSERT INTO `crm`.`document` (`id_document` ,`nom` ,`type`,`activite_lier`,`id_utilisateur`)VALUES (NULL , '$name', '$targetPath' ,'$n','3')";
    $result = mysqli_query($req2);
	$tempFile = $_FILES['Filedata'];//['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'] . '/FORME/document/data/';
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata'];//['name'];
	move_uploaded_file($tempFile,$targetFile);
}

?>