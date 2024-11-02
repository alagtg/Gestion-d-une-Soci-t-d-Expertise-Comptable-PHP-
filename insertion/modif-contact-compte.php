<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter un contact</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<?php
	 require("../connect.php");
			   $req= "SELECT* FROM `contact` where id_contact=".$_GET['id'];
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
                <td valign="top">
  <label>
  <span>Civilit&eacute;:<font color="red">*</font></span>
  <?php 
  if ($row["civilite"] == "MR") $smr="selected='selected'";else $smr="";
  if ($row["civilite"] == "MRS") $smrs="selected='selected'";else $smrs="";
 ?>
  <select name="Civilite" id="Civilite"  class="validate[required]" style="width:200px">
    <option value="">Choisissez une Civilit&eacute;</option>
    <option value="MR" <?php echo $smr;?>>MR</option>
    <option value="MRS" <?php echo $smrs;?>>MRS</option>
  </select>
  </label>
  <label> <span>Nom :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" id="nom" value="<?php echo $row["nom"];?>" style="width:200px" />
  </label>
  <label> <span>Pr&eacute;nom :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="prenom" id="prenom" value="<?php echo $row["prenom"];?>" style="width:200px" />
  </label>
  <label> <span>Titre:<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter]]" type="text" name="titre" id="titre"  value="<?php echo $row["titre"];?>" style="width:200px"/>
  </label>
  
 
   </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
                <label> <span>T&eacute;l&eacute;phone :<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="telephone"  id="telephone"   value="<?php echo $row["telephone"];?>" style="width:200px"/>
  </label>
  <label> <span>Mobile:<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="mobile"  id="mobile" value="<?php echo $row["mobile"];?>" style="width:200px"/>
  </label>
   <label> <span>Fax :<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="fax"  id="fax" value="<?php echo $row["fax"];?>" style="width:200px"/>
  </label>              
  <label> <span>Email  :<font color="red">*</font> </span>
  <input class="validate[required,custom[email]] text-input" type="text" name="email" id="email"  value="<?php echo $row["mail"];?>" style="width:200px"/>
  </label>
  </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
  <label> <span>Skype :<font color="red">*</font> </span>
  <input class="validate[required custom[onlyLetter],length[0,100]] text-input" type="text" name="skype" id="skype"  value="<?php echo $row["skype"];?>" style="width:200px" />
  <label>

  </label>
    </td>
  </tr>
  </table>
  </fieldset>

    <input class="submit" type="submit"  name="submit" value="Modifier" />
  
</form>
<?php
	}
	?>
<?php

 if(isset($_POST["submit"]))
 
  {
$civilite=addslashes($_POST['Civilite']); 
$nom= addslashes($_POST['nom']);
$prenom=addslashes($_POST['prenom']);
$titre=addslashes($_POST['titre']);
$telephone=addslashes($_POST['telephone']);
$mobile=addslashes($_POST['mobile']);
$fax=addslashes($_POST['fax']);
$email=addslashes($_POST['email']);
$skype=addslashes($_POST['skype']);
$compte=addslashes($_GET['id']);

   $req3= "update contact SET `civilite` ='$civilite', `nom` = '$nom',`prenom` = '$prenom',`titre` = '$titre',`telephone` ='$telephone',`mobile` ='$mobile',`fax` = '$fax',`mail` = '$email',`skype` = '$skype' WHERE `id_contact` = ".$_GET['id']; 
   
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
