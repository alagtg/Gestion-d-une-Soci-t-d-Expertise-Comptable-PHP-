<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter une opportunit&eacute;</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<!-- datePicker required styles -->
<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<!-- required plugins -->
<script type="text/javascript" src="js/date.js"></script>
<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]-->
<!-- jquery.datePicker.js -->
<script type="text/javascript" src="js/jquery_2_date.js"></script>
<!-- page specific start date.ens date -->
<script type="text/javascript" src="js/start_end_date.js"></script>
</head>
<body>
<?php
	 require("../connect.php");
			   $req= "SELECT* FROM `opportunite` where id_opportunite=".$_GET['id'];
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
                <td>
  <label> <span>Etat:<font color="red">*</font></span>
  <?php 
  if ($row["etat"] == "ouverte") $so="selected='selected'";else $so="";
  if ($row["etat"] == "Gagnée") $sg="selected='selected'";else $sg="";
   if ($row["etat"] == "Abandonnée") $sab="selected='selected'";else $sab="";
  if ($row["etat"] == "Suspendue") $ssu="selected='selected'";else $ssu="";?>
  <select name="etat" id="etat"  class="validate[required]"style="width:200px" >
    <option value="">Choisissez l'etat</option>
    <option value="Ouverte"<?php echo $so;?>>Ouverte</option>
    <option value="Gagnée" <?php echo $sg;?>>Gagn&eacute;e</option>
    <option value="Abandonnée"<?php echo $sab;?>>Abandonn&eacute;e</option>
    <option value="Suspendue" <?php echo $ssu;?>>Suspendue</option>
  </select></label>
   <label>
					<span>D&eacute;but(Format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="debut" id="start-date"  value="<?php echo $row["debut"];?>" class="validate[required] date-pick dp-applied"  >
				</label>
  </label>
  <label> <span>Fin(Format AAAA-MM-JJ):<font color="red">*</font></span>
  <input name="fin" id="end-date" value="<?php echo $row["fin"];?>" class="validate[required] date-pick dp-applied "  >
  </label>
  <label> <span>Description:<font color="red">*</font> </span>
  <textarea class="validate[required,length[6,300]] text-input"  name="description" id="description" rows="3" cols="3"style="width:200px" ><?php echo $row["description"];?> </textarea>
  </label>
   </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
  <label> <span>CA global:<font color="red">*</font> </span>
  <input class="validate[required] text-input" type="text"  value="<?php echo $row["ca_global"];?>" name="ca"  id="ca" style="width:200px"/>
  </label>
  </label>
  <span>Compte:<font color="red">*</font></span>
  <select name="compte" id="compte"  class="validate[required]"style="width:200px" >
    <option value="">Choisissez un compte</option>
    <?php
			   
  $req1= "SELECT* FROM `compte`";
  try {
           $Resulatsc = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
$s="";
		  foreach($Resulatsc as $rowc)
		  
{
if ($rowc["id_compte"] == $row["id_compte"]) $s="selected='selected'";else $s="";
?>
    <option value="<?php echo $rowc["id_compte"];?>" <?php echo $s;?> ><?php echo $rowc["compte"]?></option>
    <?php } ?>
  </select>
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
					$etat=addslashes($_POST['etat']); 
					$fin= addslashes($_POST['fin']);
					$debut= addslashes($_POST['debut']);
					$description=addslashes($_POST['description']);
					$compte=addslashes($_POST['compte']);
					$ca=addslashes($_POST['ca']);
					$utilisateur=addslashes($_POST['utilisateur']);
   $req2= "update  opportunite SET `description` = '$description',`etat` = '$etat',`debut` = '$debut',`fin` = '$fin',`ca_global` = '$ca',`id_compte` = '$compte' WHERE `id_opportunite` = ".$_GET["id"];
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
