<!-- <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Uploadify scriptData Sample</title>
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />


<script src="../jquery.fileupload.js"></script>
<script src="../jquery.fileupload-ui.js"></script>
<script src="jquery.fileupload-uix.js"></script>
<script src="application.js"></script>

<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.uploadify.js"></script>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	$("#fileUpload2").fileUpload({
		'uploader': 'uploadify/uploader.swf',
		'cancelImg': 'uploadify/cancel.png',
		'script': 'uploadify/upload.php?id=<?php echo $_GET["id"];?>&type=<?php echo $_GET["type"];?>',
		'folder': 'FORME\doc\files',
		'multi': true,
		'buttonText': 'Select Files',
		'checkScript': 'uploadify/check.php',
		'displayData': 'speed',
		'simUploadLimit': 2
	
	});

	
});

</script>
</head>

<body>
   
<form id="formID" class="formular" method="post" action="">

		
		   nom:
   <input type="text" name="nom" id="nom" class="validate[required]" />
		<div id="fileUpload2">You have a problem with your javascript</div> 
</html>	
	<input class="validate[required]" type="button" Onclick="javascript:$('#fileUpload2').fileUploadStart()" value="demarer"/>
    	    <input type="submit" name="submit" class="submit" value="Valider">
		</form>
<?php if(isset($_POST["submit"]))
{?>		
   	<script language="javascript">
parent.$.fancybox.close();
</script>
<?php
}
?>


</body> -->


<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin HTML Example 4.1.2
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */
-->
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<title>jQuery File Upload Example</title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/base/jquery-ui.css" id="theme">
<link rel="stylesheet" href="../jquery.fileupload-ui.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<div id="formID" >
    <form action="" method="POST" enctype="multipart/form-data" class="formular" >
<label> <span>Nom: </span>
  <input class="validate[required]" type="text" name="nomdoc" id="nomdoc" style="width:200px"/><br/>
  </label>
        <input type="file" name="file[]" multiple class="validate[required]">
	
       <input class="submit validate[required]"  name="submit" type="submit" value="Valider" />
      
  
    </form>
	
    <div class="file_upload_overall_progress"><div style="display:none;"></div></div>
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
<script src="../jquery.fileupload.js"></script>
<script src="../jquery.fileupload-ui.js"></script>
<script src="jquery.fileupload-uix.js"></script>
<script src="application.js"></script>
</body> 
</html>
<?php
if(isset($_POST["submit"]))
		{
		require("uploadify/upload.php");
		?><script language="javascript">

parent.$.fancybox.close();
</script>
		<?php
		}
?>

