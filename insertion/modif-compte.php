<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Modifier un compte</title>
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" 
		media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" 
		title="no title" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
        <style>
		table {
				font-family: tahoma, verdana, "sans-serif";
				font-size: 12px;
			}
		</style>
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
			$req= "SELECT* FROM `compte` where id_compte=".$_GET['id'];
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
         <input type="hidden" name="image" id="image" />
		<fieldset>
        <font color="red">(*)champs Obligatoires</font>
		<table>
			<tr>
				<td valign="top">
				<label> <span>Compte : <font color="red">*</font></span>
				<input class="validate[required,custom[onlyLetter],length[0,100]] 
				text-input" type="text"  value="<?php echo $row["compte"];?>" name="compte" id="compte" 
				style="width:200px" />
				</label>
				<label> <span>Adresse :<font color="red">*</font> </span>
				<textarea class="validate[required,length[6,300]] text-input"name="adresse" 	
				id="adresse" rows="3" cols="3" style="width:200px">  <?php echo $row["adresse"];?> 
				</textarea>
				</label>
				<label> <span>T&eacute;l&eacute;phone :<font color="red">*</font> </span>
				<input class="validate[required,custom[telephone]] text-input"  
				value="<?php echo $row["telephone"];?>"  type="text" name="telephone"  
				id="telephone" style="width:200px"/>
				</label>
				</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td valign="top">
				<label> <span>mobile : <font color="red">*</font></span>
				<input class="validate[required,custom[telephone]] text-input" 
				type="text"  value="<?php echo $row["mobile"];?>" name="mobile"  
				id="mobile" style="width:200px" />
				</label>
				</label>
				<label> <span>code-carte : <font color="red">*</font></span>
				<input class="validate[required] text-input" 
				type="text" value="<?php echo $row["code"];?>" name="code"  id="code" style="width:200px" />
				</label>
				<label> <span>Fax :<font color="red">*</font> </span>
				<input class="validate[required,custom[telephone]] text-input"  
				value="<?php echo $row["fax"];?>" type="text" name="fax"  id="fax" style="width:200px"/>
				</label>
				<label> <span>Email : <font color="red">*</font></span>
				<input class="validate[required,custom[email]] text-input" 
				type="text" name="email" id="email" value="<?php echo $row["mail"];?>" 
				style="width:200px"  />
				</label> 
				</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td valign="top">
                <label> 
                <span>Image :</span>
  		
	<div id="fileUploadgrowl">You have a problem with your javascript</div>
		<a href="javascript:$('#fileUploadgrowl').fileUploadStart()">Start Upload</a> |  <a href="javascript:$('#fileUploadgrowl').fileUploadClearQueue()">Clear Queue</a>
    	        
                </label>
                <br>
				<label> <span>Pays :<font color="red">*</font></span>
				<select name="pays" id="pays"  class="validate[required]" style="width:200px" >
				<option value="">Choisissez une pays</option>
				<?php
					$req1= "SELECT* FROM `pays`";
					try {
					$Resulatsp = $Mysql->TabResSQL($req1);
					}
					catch (Erreur $e) {
					echo $e -> RetourneErreur();
					}
					$p="";
					foreach($Resulatsp as $rowp)
					{
					if ($rowp["id_pays"] == $row["id_pays"]) $p="selected='selected'";else $p="";
				?>
				<option value="<?php echo $rowp["id_pays"];?>"<?php echo $p;?>><?php echo $rowp["nom"];?>
				</option>
				<?php 
				}
				?>
				</select>
				</label>
				<label> <span>Ville :<font color="red">*</font> </span>
				<input class="validate[required] text-input" type="text"
				 name="ville" id="ville"  value="<?php echo $row["ville"];?>" style="width:200px" />
				</label>
				<label> <span>Relation :<font color="red">*</font></span>
				<select name="relation" id="relation"  class="validate[required]" style="width:200px" >
				<option value="">Choisissez une relation</option>
				<?php
				
				$req5= "SELECT* FROM `relation_compte`";
				try {
				$Resulatsrc = $Mysql->TabResSQL($req5);
				}
				catch (Erreur $e) {
				echo $e -> RetourneErreur();
				}
				$rc="";
				foreach($Resulatsrc as $rowrc)
				{
				if ($rowrc["id_relation"] == $row["id_relation"]) $rc="selected='selected'";else $rc="";
				?>
				<option value="<?php echo $rowrc["id_relation"];?>"<?php echo $rc;?>>
				<?php echo $rowrc["nom"];?></option>
				<?php } ?>
				</select>
				</label>
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
		$compte=addslashes($_POST['compte']);
		$adresse= addslashes($_POST['adresse']);
		$telephone=addslashes($_POST['telephone']);
		$imag=addslashes($_POST['image']);
		$mobile=addslashes($_POST['mobile']);
		$fax=addslashes($_POST['fax']);
		$email=addslashes($_POST['email']);
		$code=addslashes($_POST['code']);
		$pays=addslashes($_POST['pays']);
		$ville=addslashes($_POST['ville']);
		$relation=addslashes($_POST['relation']);
		$date_dernier_modif=date('Y-m-d H:i:s');
		$req6= "update compte SET `compte`='$compte', `adresse` = '$adresse',`telephone` = '$telephone',`mobile` = '$mobile',`fax` ='$fax',`mail` ='$email',`code` ='$code',`image` = '$imag',`date_dernier_modif` = '$date_dernier_modif',`id_pays` = '$pays',`ville` = '$ville' ,`id_relation` = '$relation' WHERE `id_compte` = ".$_GET['id']; 
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
