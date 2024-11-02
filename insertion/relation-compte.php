<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Nouveau Relation-Compte</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<form id="formID" class="formular" method="post" action="">
  <fieldset>
  <label> <span>Type: </span>
  <input class="validate[required,custom[noSpecialCaracters]]" type="type" name="type" id="user" style="width:200px" />
  </label>
  </fieldset>

    <input class="submit" type="submit" value="Valider" />

</form>
<?php


 if(isset($_POST["submit"]))
  {
	    require("../connect.php");
		$nom= addslashes($_POST['type']);

   $req1= "insert into relation_compte (id_relation,nom)values('','$nom')";
   try {
           $Resulats = $Mysql->ExecuteSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }


?>
<script language="javascript">
$(this).fenetre('close');
</script>
<?php
}
?>
</body>
</html>
