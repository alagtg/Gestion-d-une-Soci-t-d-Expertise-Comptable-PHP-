<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier un Produit</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<?php
	require("../connect.php");
	
	$req= "SELECT * FROM `produits` WHERE ref=".$_GET['id'];
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
  <label> <span>Nom: <font color="red">*</font></span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" value="<?php echo $row["nom_produit"];?>" id="nom" style="width:200px" />
  </label>
  <label> <span>Prix:<font color="red">*</font></span>
  <input class="validate[required] text-input" type="text" name="prix"  value="<?php echo $row["prix"];?>" id="prix" style="width:200px" />
  </label>
   </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">

  <label> <span>Bonus:<font color="red">*</font></span>
  <input class="validate[required,custom[onlyNumber]] text-input" type="text" name="bonnus"  value="<?php echo $row["bonnus"];?>" id="bonnus" style="width:200px" />
  </label>
  </td>
  </tr>
  </table>
  </fieldset>

    <input class="submit"  name="submit" type="submit" value="Modifier" />

</form>
<?php
}
?>
<?php
 if(isset($_POST['submit']))
   { 
$nom= addslashes($_POST['nom']);
$prix= addslashes($_POST['prix']);
$qte= addslashes($_POST['qte']);
 $bonnus= addslashes($_POST['bonnus']);
$req2="update  produits SET `nom_produit` = '$nom',`prix` = '$prix',`bonnus` = '$bonnus'
 WHERE `ref`=".$_GET['id']; 
 try {
           $Resulats = $Mysql->ExecuteSQL($req2);
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
