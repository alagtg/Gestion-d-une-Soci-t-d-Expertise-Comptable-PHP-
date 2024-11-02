<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter un compte</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>

<!-- upload image !-->
<link rel="stylesheet" href="../upload_image/uploadify/uploadify.css" type="text/css" />
<link rel="stylesheet" href="../upload_image/css/uploadify.jGrowl.css" type="text/css" />


<script type="text/javascript" src="../upload_image/js/jquery.uploadify.js"></script>
<script type="text/javascript" src="../upload_image/js/jquery.jgrowl_minimized.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	$("#fileUploadgrowl").fileUpload({
		'uploader': '../upload_image/uploadify/uploader.swf',
		'cancelImg': '../upload_image/uploadify/cancel.png',
		'script': '../upload_image/uploadify/upload.php',
		'folder': '../upload_image/files',
		'fileDesc': 'Image Files',
		'fileExt': '*.jpg;*.jpeg;*.png;*.gif',
		'multi': true,
		'simUploadLimit': 3,
		'sizeLimit': 1048576,
		onError: function (event, queueID ,fileObj, errorObj) {
			var msg;
			if (errorObj.status == 404) {
				alert('Could not find upload script. Use a path relative to: '+'<?= getcwd() ?>');
				msg = 'Could not find upload script.';
			} else if (errorObj.type === "HTTP")
				msg = errorObj.type+": "+errorObj.status;
			else if (errorObj.type ==="File Size")
				msg = fileObj.name+'<br>'+errorObj.type+' Limit: '+Math.round(errorObj.sizeLimit/1024)+'KB';
			else
				msg = errorObj.type+": "+errorObj.text;
			$.jGrowl('<p></p>'+msg, {
				theme: 	'error',
				header: 'ERROR',
				sticky: true
			});			
			$("#fileUploadgrowl" + queueID).fadeOut(250, function() { $("#fileUploadgrowl" + queueID).remove()});
			return false;
		},
		onCancel: function (a, b, c, d) {
			var msg = c.name;
		   
			$.jGrowl('<p></p>'+msg, {
				theme: 	'warning',
				header: 'Cancelled Upload',
				life:	4000,
				sticky: false
			});
		},
		onClearQueue: function (a, b) {
			var msg = "Cleared "+b.fileCount+" files from queue";
			$.jGrowl('<p></p>'+msg, {
				theme: 	'warning',
				header: 'Cleared Queue',
				life:	4000,
				sticky: false
			});
		},   
		onComplete: function (a, b ,c, d, e) {
			var size = Math.round(c.size/1024);
			$.jGrowl('<p></p>'+c.name+' - '+size+'KB', {
				theme: 	'success',
				header: 'Upload Complete',
				life:	4000,
				sticky: false
				
			});

			document.getElementById("image").value=c.name;
		   
		}
	});
	
});

</script>
</head>
<body>
<form id="formID" class="formular" method="post" action="">
  <input type="hidden" name="image" id="image" />
  <fieldset>
  <font color="red">(*)champs Obligatoires</font>
  <table>
                <tr>
                <td valign="top">
  <label> <span>Compte :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="compte" id="compte" style="width:200px" />
  </label>
  <label> <span>Adresse :<font color="red">*</font> </span>
  <textarea class="validate[required,length[6,300]] text-input" name="adresse" id="adresse" rows="3" cols="3" style="width:200px"> </textarea>
  </label>
  <label> <span>T&eacute;l&eacute;phone :<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="telephone"  id="telephone" style="width:200px"/>
  </label>
  
   </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
   <label> <span>mobile :<font color="red">*</font> </span>
  <input class="validate[required,custom[telephone]] text-input" type="text" name="mobile"  id="mobile" style="width:200px" />
  </label>
     <label> <span>code-carte :<font color="red">*</font> </span>
  <input class="validate[required] text-input" type="text" name="code"  id="code" style="width:200px" />
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
                 
                <br />
				<label> <span>Pays :<font color="red">*</font></span>
  <select name="pays" id="pays"  class="validate[required]" style="width:200px" >
    <option value="">Choisissez une pays</option>
    <?php
  require("../connect.php");
  
  $req1= "SELECT* FROM `pays`";
  try {
           $Resulats = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
    <option value="<?php echo $row["id_pays"];?>"><?php echo $row["nom"];?></option>
    <?php }
					
?>
  </select>
  </label>
  <label> <span>Ville :<font color="red">*</font> </span>
  <input class="validate[required] text-input" type="text" name="ville" id="ville" style="width:200px" />
  </label>

   
    <label> <span>Relation :<font color="red">*</font></span>
  <select name="relation" id="relation"  class="validate[required]" style="width:200px" >
    <option value="">Choisissez une relation</option>
    <?php
  
  $req5= "SELECT* FROM `relation_compte`";
  try {
           $Resulats = $Mysql->TabResSQL($req5);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
    <option value="<?php echo $row["id_relation"];?>"><?php echo $row["nom"];?></option>
    <?php } ?>
  </select>
  </label>
  <input type="hidden" value="<?php session_start();
				
				echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
                </td>
				
  </tr>
   	
</table>
  </fieldset>

    <input class="submit" type="submit" name="submit" value="Valider" />

</form>
<?php
 
if(isset($_POST["submit"]))
  {
   			

					
					$compte=addslashes($_POST['compte']);
					$imag=addslashes($_POST['image']);
					$adresse= addslashes($_POST['adresse']);
					$telephone=addslashes($_POST['telephone']);
					$mobile=addslashes($_POST['mobile']);
					$fax=addslashes($_POST['fax']);
					$email=addslashes($_POST['email']);
					$utilisateur=addslashes($_POST['utilisateur']);
					$pays=addslashes($_POST['pays']);
					$ville=addslashes($_POST['ville']);
				    $relation=addslashes($_POST['relation']);
				    $code=addslashes($_POST['code']);
				   	$datecreation=date('Y-m-d H:i:s');
					$date_dernier_modif=$datecreation;
					$date_validite=255;
   $req6="insert into compte(id_compte,compte,adresse,telephone,mobile,date_validite,fax,mail,code,image,bonus,date_creation,date_dernier_modif,id_utilisateur,id_pays,ville,id_relation)
values('','$compte','$adresse','$telephone','$mobile','$date_validite','$fax','$email','$code','$imag','','$datecreation',
'$date_dernier_modif','$utilisateur','$pays','$ville','$relation')";
   try {
           $Resulats = $Mysql->ExecuteSQL($req6);
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
