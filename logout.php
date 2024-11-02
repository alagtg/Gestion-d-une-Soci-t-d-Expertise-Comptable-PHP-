
<?php
include("connect.php");
$req= "update  utilisateur SET `etat` = 'F' where `id_utilisateur` =".$_GET["id"];

	try {
			$Resulats = $Mysql->ExecuteSQL($req);
			}
			catch (Erreur $e) {
			echo $e -> RetourneErreur();
		}
session_start();
unset($_SESSION["login"]);
session_destroy();
header("location:login.php");

?>

