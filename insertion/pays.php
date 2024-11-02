<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter une tache</title>
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
  <br />
  <label> <span>Nom pays :<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" id="nom" style="width:200px"/>
  </label>
  </fieldset>

    <input class="submit"  name="submit" type="submit" value="Valider" />

</form>
<?php
 

  if(isset($_POST["submit"]))
  {
		  require("../connect.php");
		  $pays=addslashes($_POST['nom']);
  $req1= "insert into pays (id_pays,nom)values('','$pays')";
  try {
           $Resulats = $Mysql->ExecuteSQL($req1);
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
