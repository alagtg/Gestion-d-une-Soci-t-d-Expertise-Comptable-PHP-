<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter une demande</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<!-- datePicker required styles -->
<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<!-- required plugins date -->
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
                <label>
				<span>Etat:<font color="red">*</font></span>
				<select name="etat" id="etat"  class="validate[required]" style="width:200px" >
					<option value="">Choisissez l'etat</option>
					<option value="Non commenc&eacute;e">Non commenc&eacute;e</option>
					<option value="En cours">En cours</option>
					<option value="Fini">Fini</option>
					<option value="Abandonn&eacute;e">Abandonn&eacute;e</option>
					<option value="Suspendue">Suspendue</option>
				</select>
                </label>
				<label>
					<span>D&eacute;but(format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="debut" id="start-date" class="validate[required] date-pick dp-applied"  >
				</label>
				<label>
					<span>Fin(format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="fin" id="end-date" class="validate[required] date-pick dp-applied"  >
				</label>
               
                <label>
                <span>Priorit&eacute;:<font color="red">*</font></span>
				<select name="priorite" id="priorite"  class="validate[required] " style="width:200px" >
					<option value="">Choisissez une etat</option>
					<option value="Normale">Normale</option>
					<option value="Haute">Haute</option>
					<option value="Basse">Basse</option>
					<option value="Litige">Litige</option>
				</select>
                </label>
                </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
				<label>
					<span>T&acirc;che: <font color="red">*</font></span>
					<textarea class="validate[required,length[6,300]] text-input" name="tache" id="tache" rows="3" cols="3" style="width:200px"> </textarea>
				</label>
				<label>
				<span>Utilisateur:<font color="red">*</font></span>
				<select name="realiser" id="realiser"  class="validate[required]" style="width:200px" >
					<option value="">Choisissez un utilisateur</option>
                     <?php
				  require("../connect.php");
				  session_start();
  $req= "SELECT* FROM `utilisateur` where id_utilisateur !=".$_SESSION["id_utilisateur"];
  try {
           $Resulats = $Mysql->TabResSQL($req);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
					<option value="<?php echo $row["id_utilisateur"];?>"><?php echo $row["nom"];?>&nbsp;<?php echo $row["prenom"];?></option>
					<?php }
					
					
					
					 ?>
				</select>
					
				
                <input type="hidden" value="<?php echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
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
               $projet= addslashes($_GET['id']); 
				$etat= addslashes($_POST['etat']);
				$debut=addslashes($_POST['debut']);
				$echeance=addslashes($_POST['fin']);
				$realiser=addslashes($_POST['realiser']);
				$priorite=addslashes($_POST['priorite']);
				$description=addslashes($_POST['tache']);
				$compte=addslashes($_GET['idc']);
               $creer=addslashes($_POST['utilisateur']);
  $req1= "insert into tache (id_tache,etat,debut,echeance,priorite,description,id_compte,id_projet,creer,realiser)values('','$etat','$debut','$echeance','$priorite','$description','$compte','$projet',' $creer','$realiser')";
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
