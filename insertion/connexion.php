<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Espace de Fidélisation</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<form id="formID" class="formular" method="post" action="">
  <fieldset>
<table>
                <tr>
                <td>
  <label> <span>Code carte: </span>
  <input class="validate[required] text-input" type="text" name="code" id="code" style="width:200px" />
  </label>
    </td>
                
  </tr>
  </table>
  </fieldset>

    <input class="submit" type="submit" name="submit" value="Valider" />

</form>
</body>
</html>
<?php
require("../connect.php");
if(isset($_POST['submit']))
 { 
$id=$_POST["code"];
 
$req="SELECT *
FROM `compte`
WHERE `code` = '$id' ";
$resultat=mysql_query($req) or die(mysql_error());
$n=mysql_num_rows($resultat);
if($n!=0)
{
session_start();
$ligne = mysql_fetch_array($resultat);
$_SESSION["code"] = $ligne["code"];
$_SESSION["id_compte"] = $ligne["id_compte"];

header("location:../carte.php");
}
else
{
?>
<script language="javascript">
parent.$.fancybox.close();
</script>
<?php
}
}
?>
