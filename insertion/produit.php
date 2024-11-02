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
  <table>
  <font color="red">(*)champs Obligatoires</font>
                <tr>
                <td valign="top">
  <label> <span>Nom: <font color="red">*</font></span>
  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" id="nom" style="width:200px"/>
  </label>
  <label> <span>Prix:<font color="red">*</font></span>
  <input class="validate[required,custom[onlyNumber]] text-input" type="text" name="prix"  id="prix" style="width:200px"/>
  </label>
  </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
  
  <label> <span>Bonus:<font color="red">*</font></span>
  <input class="validate[required,custom[onlyNumber]] text-input" type="text" name="bonnus"  id="bonnus" style="width:200px"/>
  </label>
  </td>
  </tr>
  </table>
  </fieldset>

    <input class="submit"  name="submit" type="submit" value="Valider" />

</form>
<?php
   
 if(isset($_POST["submit"]))
    {
		 require("../connect.php");
		 $nom= addslashes($_POST['nom']);
		 $prix= addslashes($_POST['prix']);
		 $qte= addslashes($_POST['qte']);
		  $bonnus= addslashes($_POST['bonnus']);
   $req1= "insert into produits (ref,nom_produit,prix,bonnus)values('','$nom','$prix','$bonnus')";
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
