<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
	
	$req= "SELECT * FROM `activite` WHERE id_activite=".$_GET['id'];
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
  <label> <span>Nom Activite : </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="type" id="nom" value="<?php echo $row["type"];?>" style="width:200px" />
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
$a= addslashes($_POST['type']);

$req1="update  activite SET `type` = '$a' WHERE `id_activite`=".$_GET['id']; 
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
mysql_close();
		  ?>
</body>
</html>
