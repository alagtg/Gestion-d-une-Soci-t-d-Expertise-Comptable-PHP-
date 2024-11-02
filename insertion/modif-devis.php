<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier Produit</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<?php
	require("../connect.php");
	
	$req= "SELECT * FROM `devis` WHERE id_devis=".$_GET['id'];
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
  <table>
  <tr>
  <td>
  <label> <span>Réferance: </span>
  <input class="validate[required]" type="text" name="reference" value="<?php echo $row["reference"];?>" id="reference" style="width:200px"  />
  </label>
  <label> <span>Qte à Acheté:</span>
  <input class="validate[required] text-input" type="text" name="qte" value="<?php echo $row["qte"];?>" id="prix" style="width:200px" />
  </label>
  </td>
  <td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
  <td>
  <label> <span>Montant Totale:</span>
  <input class="validate[required,custom[onlyNumber]] text-input" type="text" name="prix"   value="<?php echo $row["prix"];?>" id="qte" style="width:200px" />
  </label>
  <label>
  <span>Compte:</span>
  <select name="compte" id="compte"  value="" class="validate[required]" style="width:200px" >
    <option value="">Choisissez un compte</option>
    <?php
			  
   
  $req1= "SELECT* FROM `compte`";
  try {
           $Resulats1 = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
		  $cpfacture="";
foreach($Resulats1 as $rowcompte)
{
if ($rowcompte["id_compte"] == $row["id_compte"]) $cpfacture="selected='selected'";else $cpfacture="";

?>
    <option value="<?php echo $rowcompte["id_compte"];?>" <?php echo $cpfacture;?>><?php echo $rowcompte["compte"];?></option>
    <?php } ?>
  </select>
  </label>
  </td>
  </tr>
  </table>
  </fieldset>
      <input class="submit"  name="submit" type="submit" value="Valider" />
</form>
<?php
}
?>
<?php
 if(isset($_POST['submit']))
   { 
$reference= addslashes($_POST['reference']);
$qte= addslashes($_POST['qte']);
$prix= addslashes($_POST['prix']);
$compte= addslashes($_POST['compte']);
$produit=$_GET['id'];
$req2="update  devis SET `reference` = '$reference',`qte` = '$qte',`prix` = '$prix',`id_compte` = '$compte'
,`id_produit` = '$produit'  WHERE `id_devis`=".$_GET['id']; 
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
