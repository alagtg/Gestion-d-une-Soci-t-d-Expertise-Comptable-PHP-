<?php
  $etat=addslashes(strtoupper($_GET["etat"]));
  $id=addslashes($_GET["id"]);
  require("../connect.php");
  $req= "update  utilisateur SET `activation` = '$etat' where `id_utilisateur` = $id";
	try
	{
	$Resulats = $Mysql->ExecuteSQL($req);
	}
	catch (Erreur $e)
	{
	echo $e -> RetourneErreur();
	}
  header("location:../index.php?page=gerer-utilisateurs");
?>
