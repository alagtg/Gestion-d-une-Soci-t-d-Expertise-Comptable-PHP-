<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter une ville</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body>
<form id="formID" class="formular" method="post" action="">
  <fieldset>
  <label> <span>ville: </span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" id="nom" style="width:200px" />
  </label>
  </fieldset>

    <input class="submit" type="submit" name="submit" value="Valider" />
  
</form>
<?php
 require("../connect.php");
 if(isset($_POST["submit"]))
  {
		  $nom=addslashes($_POST['nom']);
		  $id_pays=$_GET["id"];
   $req2="insert into ville(id_ville,nom,id_pays)
   values('','$nom','$id_pays')";
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
