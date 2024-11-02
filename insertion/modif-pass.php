<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Modifier le mot de passe</title>
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"
		media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen"
		title="no title" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
	</head>
	<body>
		<form id="formID" class="formular" method="post" action="">
		<fieldset>
		<font color="red">(*)champs Obligatoires</font>
		<table>
			<tr>
				<td>
				<label> <span>Mot de passe :<font color="red">*</font> </span>
				<input class="validate[required,length[6,11]] text-input" type="password" 
				 name="passe"  id="passe" style="width:200px" />
				</label>
				</td>		
			</tr>
		</table>
		</fieldset>
		<input class="submit" type="submit" name="submit" value="Modifier" />
		</form>
		<?php
		if(isset($_POST["submit"]))
		{
			require("../connect.php");		
			$passe=md5(addslashes($_POST['passe']));
			$req3= "update  utilisateur SET `password` = '$passe' WHERE `id_utilisateur` = ".$_GET["id"];
			try {
			$Resulats = $Mysql->ExecuteSQL($req3);
			}
			catch (Erreur $e) {
			echo $e -> RetourneErreur();
		}
		?>
		<script language="javascript">
			parent.$.fancybox.close();														
		</script>
		<?php
		}
		?>
	</body>
</html>
