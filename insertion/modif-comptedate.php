<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter une tache</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<?php
require("../connect.php");
$req= "SELECT * FROM `compte` WHERE id_compte=".$_GET['id'];
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
<br>
<label> <span>Date de validité en jour :<font color="red">*</font> </span>
<input class="validate[required,custom[telephone]] text-input" type="text" name="date" id="date" value="<?php echo $row["date_validite"];?>" style="width:200px"/>
</label>
</fieldset>

<input class="submit"  name="submit" type="submit" value="Valider" />

</form>
<?php
}
?>
<?php
if(isset($_POST['submit']))
{ 
$a=addslashes($_POST['date']);

$req1="update  compte SET `date_validite` = '$a' WHERE `id_compte`=".$_GET['id']; 
try {
$Resulats = $Mysql->ExecuteSQL($req1);
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
