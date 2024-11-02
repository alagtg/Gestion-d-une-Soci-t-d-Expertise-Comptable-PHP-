<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier un utilisateur</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<?php
require("../connect.php");
$req= "SELECT* FROM utilisateur where id_utilisateur=".$_GET['id'];
try {
$Resulats = $Mysql->TabResSQL($req);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<form id="formID" class="formular" method="post" action="">
<fieldset>
<font color="red">(*)champs Obligatoires</font>
<table>
<tr>
<td valign="top">
<label> <span>Nom :<font color="red">*</font> </span>
<input class="validate[required,custom[onlyLetter],length[0,100]] text-input"  value="<?php echo $row["nom"];?>" type="text" name="nom" id="nom" style="width:200px"/>
</label>
<label> <span>Pr&eacute;nom :<font color="red">*</font> </span>
<input class="validate[required,custom[onlyLetter],length[0,100]] text-input"  value="<?php echo $row["prenom"];?>" type="text" name="prenom" id="prenom" style="width:200px"/>
</label>
<label> <span>Adresse:<font color="red">*</font> </span>
<textarea class="validate[required,length[6,300]] text-input" name="adresse" id="adresse" rows="3" cols="3" style="width:200px"> <?php echo $row["adresse"];?></textarea>
</label>
<label> <span>Identifiant :<font color="red">*</font> </span>
<input class="validate[required,custom[onlyLetter],length[0,100]] text-input" value="<?php echo $row["login"];?>" type="text" name="login" id="login"style="width:200px" />
</label>

</td>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td valign="top">

<label> <span>Email  :<font color="red">*</font> </span>
<input class="validate[required,custom[email]] text-input"  value="<?php echo $row["mail"];?>" type="text" name="email" id="email" style="width:200px"/>
</label>
<label> <span>Skype:<font color="red">*</font> </span>
<input class="validate[optional,custom[noSpecialCaracters] text-input" type="text" value="<?php echo $row["skype"];?>" name="skype" id="skype" style="width:200px" />
</label>
<label> <span>T&eacute;l&eacute;phone :<font color="red">*</font></span>
<input class="validate[required,custom[telephone]] text-input" type="text" value="<?php echo $row["telephone"];?>"name="telephone"  id="telephone" style="width:200px"/>
</label>
<label> <span>Pays:<font color="red">*</font></</span>
<select name="pays" id="pays"  class="validate[required]" style="width:200px">
<option value="">Choisissez un pays</option>
<?php

$req1= "SELECT* FROM `pays`";
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $rowp)
{
if ($rowp["id_pays"] == $row["id_pays"]) $s="selected='selected'";else $s="";
?>
<option value="<?php echo $rowp["id_pays"];?>" <?php echo $s;?> ><?php echo $rowp["nom"];?></option>
<?php } ?>
</select>
</label>
<label> <span>Ville:<font color="red">*</font></span>
<input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="ville" id="ville" value="<?php echo $row["ville"];?>" style="width:200px" />

</label>
<label><span>Type:<font color="red">*</font></span>
<?php 
if ($row["type"] == "Super Manager") $sm="selected='selected'";else $sm="";
if ($row["type"] == "Manager") $m="selected='selected'";else $m="";
if ($row["type"] == "Simple Manager") $spm="selected='selected'";else $spm="";?>
<select name="type" id="type"  class="validate[required]" style="width:200px">

<option value="">Choisissez un type</option>
<option value="Super Manager" <?php echo $sm;?>>Super Manager</option>
<option value="Manager" <?php echo $m;?>>Manager</option>
<option value="Simple Manager" <?php echo $spm;?>> Simple Manager</option>
</select>
</label>
</td>
</tr>
</table>
</fieldset>

<input class="submit" type="submit" name="submit" value="Modifier" />

</form>
<?php
}
?>
<?php
if(isset($_POST["submit"]))
{
$nom= addslashes($_POST['nom']);
$prenom=addslashes($_POST['prenom']);
$adresse=addslashes($_POST['adresse']);
$ville=addslashes($_POST['ville']);
$pays=addslashes($_POST['pays']);
$type=addslashes($_POST['type']);
$login=addslashes($_POST['login']);
$email=addslashes($_POST['email']);
$skype=addslashes($_POST['skype']);
$telephone=addslashes($_POST['telephone']);
$date_dernier_modif=date('Y-m-d H:i:s');

$req3= "update  utilisateur SET `login` = '$login',`type` = '$type',`nom` = '$nom',`prenom` = '$prenom',`adresse` = '$adresse',`telephone` = '$telephone',`skype` = '$skype',`id_pays` = '$pays',`ville` = '$ville',`date_dernier_modif` = '$date_dernier_modif' WHERE `id_utilisateur` = ".$_GET["id"];
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
