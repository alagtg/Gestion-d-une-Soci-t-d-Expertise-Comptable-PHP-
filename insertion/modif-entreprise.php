<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier une entreprise</title>
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
<?php
	require("../connect.php");
	
	$req1= "SELECT * FROM `entreprise` WHERE id_entreprise=".$_GET['id'];
  try {
           $Resulats = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
		  foreach($Resulats as $row)
{

?>
<form id="formID" class="formular" method="post" action="">
  <input type="hidden" name="image" id="image" />
  <fieldset>
  <font color="red">(*)champs Obligatoires</font>
  <table>
                <tr>
                <td valign="top">
  <label> <span>Entreprise :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="entreprise" id="entreprise" value="<?php echo $row["nom"];?>" style="width:200px" />
  </label>
  <label> <span>Adresse :<font color="red">*</font> </span>
  <textarea class="validate[required,length[6,300]] text-input" name="adresse" id="adresse" rows="3" cols="3" style="width:200px"><?php echo $row["adresse"];?> </textarea>
  </label>
 
                 <label> 
                <span>Logo :</span>
               <div id="fileUploadgrowl">You have a problem with your javascript</div>
		<a href="javascript:$('#fileUploadgrowl').fileUploadStart()">Start Upload</a> |  <a href="javascript:$('#fileUploadgrowl').fileUploadClearQueue()">Clear Queue</a>
				</label>
                
                </td>
				
  </tr>
   	
</table>
  </fieldset>

    <input class="submit" type="submit" name="submit" value="Valider" />

</form>
<?php
}
 
if(isset($_POST["submit"]))
  {
   			

					
					$entreprise=addslashes($_POST['entreprise']);
					$adresse= addslashes($_POST['adresse']);
					$imag=addslashes($_POST['image']);
					
    $req2= "update entreprise SET `nom` ='$entreprise', `logo` = '$imag',`adresse` = '$adresse' WHERE `id_entreprise` = ".$_GET['id']; 
   
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
