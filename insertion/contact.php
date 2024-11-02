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
<form id="formID" class="formular" method="post" action="">
  <fieldset>
   <font color="red">(*)champs Obligatoires</font>
  <table>
                <tr>
                <td valign="top">
                <label>
  <span>Civilit&eacute;:<font color="red">*</font></span>
  <select name="Civilite" id="Civilite"  class="validate[required]" style="width:200px" >
    <option value="">Choisissez une Civilit&eacute;</option>
    <option value="MR">MR</option>
    <option value="MRS">MRS</option>
  </select>
  </label>
  <label> <span>Nom :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" id="nom" style="width:200px" />
  </label>
  <label> <span>Pr&eacute;nom :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="prenom" id="prenom" style="width:200px" />
  </label>
  <label> <span>Titre:<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter]]" type="text" name="titre" id="titre" style="width:200px" />
  </label>
 
   </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
                 <label> <span>T&eacute;l&eacute;phone :<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="telephone"  id="telephone" style="width:200px" />
  </label>
  <label> <span>Mobile:<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="mobile"  id="mobile" style="width:200px" />
  </label>
  <label> <span>Fax :<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="fax"  id="fax" style="width:200px" />
  </label>
  <label> <span>Email :<font color="red">*</font> </span>
  <input class="validate[required,custom[email]] text-input" type="text" name="email" id="email" style="width:200px"  />
  </label>
 </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
  <label> <span>Skype :<font color="red">*</font> </span>
  <input class="validate[required custom[onlyLetter],length[0,100]] text-input" type="text" name="skype" id="skype" style="width:200px" />
  </label>
  
  <label> <span>Compte:<font color="red">*</font></span>
  <select name="compte" id="compte"  class="validate[required]" style="width:200px" >
    <option value="">Choisissez un compte</option>
    <?php
			   require("../connect.php");
   
  $req= "SELECT* FROM `compte`";
  try {
           $Resulats = $Mysql->TabResSQL($req);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
    <option value="<?php echo $row["id_compte"];?>"><?php echo $row["compte"];?></option>
    <?php } ?>
  </select>
  </label>
  <input type="hidden" value="<?php session_start(); echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
                </td>
                </tr>
                </table>
  </fieldset>

    <input class="submit" type="submit"  name="submit" value="Valider" />

</form>
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
$compte=addslashes($_POST['compte']);
$id_utilisateur=addslashes($_POST['utilisateur']);
   $req3= "insert into contact(id_contact,civilite,nom,prenom,titre,telephone,mobile,fax,mail,skype,id_utilisateur,id_compte)
   values('','$civilite','$nom','$prenom','$titre','$telephone','$mobile','$fax','$email','$skype','$id_utilisateur','$compte')";
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
