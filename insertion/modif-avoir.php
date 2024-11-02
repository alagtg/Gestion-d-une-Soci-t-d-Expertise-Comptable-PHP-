<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier Avoir</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<?php
	require("../connect.php");
	
	$req= "SELECT * FROM `avoir` WHERE id_avoir=".$_GET['id'];
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
  <label> <span>Réferance Avoir: </span>
  <input class="validate[required]" type="text" name="referance"  id="referance" value="<?php echo $row["reference"];?>" style="width:200px" />
  </label>
  <label> <span>Qte à Acheté: </span>
  <input class="validate[required]" type="text" name="qteprod"  id="qteprod" value="<?php echo $row["qte"];?>" style="width:200px"  />
  </label>
  <label> <span>Montant totale: </span>
  <input class="validate[required]" type="text" name="prix-totale"  id="prix-totale" value="<?php echo $row["prix"];?>" style="width:200px"  />
  </label>
    </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
  <label> <span>Montant Remis: </span>
  <input class="validate[required]" type="text" name="remis"  id="remis" value="<?php echo $row["remis"];?>" style="width:200px"  />
  </label>
  <label> <span>Reste: </span>
  <input class="validate[required]" type="text" name="reste"  id="reste"  value="<?php echo $row["reste"];?>" style="width:200px"/>
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
		  $cpavoir="";
foreach($Resulats1 as $rowcompte)
{
if ($rowcompte["id_compte"] == $row["id_compte"]) $cpavoir="selected='selected'";else $cpavoir="";

?>
    <option value="<?php echo $rowcompte["id_compte"];?>" <?php echo $cpavoir;?>><?php echo $rowcompte["compte"];?></option>
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
$referance= addslashes($_POST['referance']);
$qteprod= addslashes($_POST['qteprod']);
$prix= addslashes($_POST['prix-totale']);
$compte= addslashes($_POST['compte']);
$remis= addslashes($_POST['remis']);
$reste= addslashes($_POST['reste']);
$produit=$_GET['id'];

$req3= "UPDATE `crm`.`avoir` SET `reference` =  '$referance',
`qte` = '$qteprod',
`prix` = '$prix',
`remis` = '$remis',
`reste` = '$reste',
`id_compte` = '$compte'
WHERE `avoir`.`id_avoir` =".$_GET['id'];

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
