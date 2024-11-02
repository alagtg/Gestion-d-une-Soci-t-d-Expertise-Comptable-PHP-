<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter une opportunité</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<!-- datePicker required styles -->
<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<!-- required plugins -->
<script type="text/javascript" src="js/date.js"></script>
<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]-->
<!-- jquery.datePicker.js -->
<script type="text/javascript" src="js/jquery_2_date.js"></script>
<!-- page specific start date.ens date -->
<script type="text/javascript" src="js/start_end_date.js"></script>
</head>
<body>
<form id="formID" class="formular" method="post" action="">
  <fieldset>
  <font color="red">(*)champs Obligatoires</font>
  <table>
                <tr>
                <td>
  <label> <span>Etat:<font color="red">*</font></span>
  <select name="etat" id="etat"  class="validate[required]"  style="width:200px">
    <option value="">Choisissez une etat</option>
    <option value="Ouverte">Ouverte</option>
    <option value="Gagnée">Gagn&eacute;e</option>
    <option value="Abandonnée">Abandonnée</option>
    <option value="Suspendue">Suspendue</option>
  </select>
     </label>
  <label> <span>D&eacute;but(format AAAA-MM-JJ):<font color="red">*</font></span>
  <input name="debut" id="start-date" class="validate[required] date-pick dp-applied "  />
  </label>
  </label>
  <label> <span>Fin(format AAAA-MM-JJ):<font color="red">*</font></span>
  <input name="fin" id="end-date" class="validate[required] date-pick dp-applied "  />
  </label>
  <label> <span>Description: <font color="red">*</font></span>
  <textarea class="validate[required,length[6,300]] text-input" name="description" id="description" rows="3" cols="3" style="width:200px"> </textarea>
  </label>
  
                 </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td valign="top">
  <label> <span>CA global:<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyNumber]] text-input" type="text" name="ca"  id="ca"style="width:200px" />
  </label>
  <label> <span>Compte:<font color="red">*</font></span>
  <select name="compte" id="compte"  class="validate[required]" style="width:200px" >
    <option value="">Choisissez un compte</option>
    <?php
			   require("../connect.php");
   
  $req= "SELECT* FROM `compte`";
  try {
           $Resulats = $Mysql->TabResSQL($req);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
    <option value="<?php echo $row["id_compte"];?>"><?php echo $row["compte"];?></option>
    <?php } ?>
  </select>
  </label>
  <input type="hidden" value="<?php session_start(); echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
  </td>
                </tr>
                </table>
  </fieldset>
      <input class="submit" type="submit" name="submit" value="Valider"  />

</form>
<?php
 if(isset($_POST["submit"]))
 {          $etat=addslashes($_POST['etat']); 
			$fin= addslashes($_POST['fin']);
			$debut= addslashes($_POST['debut']);
			$description=addslashes($_POST['description']);
			$compte=addslashes($_POST['compte']);
			$ca=addslashes($_POST['ca']);
			$utilisateur=addslashes($_POST['utilisateur']);
            $convertir="F";
   $req2= "insert into opportunite(id_opportunite,description,etat,debut,fin,ca_global,id_compte,id_utilisateur,convertir)
   values('','$description','$etat','$debut','$fin','$ca','$compte','$utilisateur','$convertir')";
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
