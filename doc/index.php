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
		require("upload.php");
		?><script language="javascript">

parent.$.fancybox.close();
</script>
		<?php
		}
?>
