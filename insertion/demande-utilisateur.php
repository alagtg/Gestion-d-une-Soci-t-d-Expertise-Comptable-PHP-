<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Ajouter un demande de congé</title>
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
 <label>			<span>intutilé:<font color="red">*</font></span>
					<input name="nom" id="nom"  class="validate[required]">
				</label>				
               
                <input type="hidden" value="<?php echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
               
				<label>
				 <span>Compte:<font color="red">*</font></span>
				 <select name="compte" id="compte"  class="validate[required]" style="width:200px" >
               <option value="">Choisissez un compte</option> 
			   <?php
			        require("../connect.php");
  $req2= "SELECT* FROM `compte`";
  try {
           $Resulats = $Mysql->TabResSQL($req2);
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
			    <label>
				<span>Description:<font color="red">*</font></span>
				<textarea class="validate[required,length[6,300]] text-input" name="description" id="description" rows="3" cols="3" style="width:200px"> </textarea>
				</label>            
               </td>
               <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
				<label> <span>CA global:<font color="red">*</font> </span>
  <input class="validate[required,custom[onlyNumber]] text-input" type="text" name="ca"  id="ca"style="width:200px" />
  </label>
                <label>
					<span>Début(format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="start-date" id="start-date" class="validate[required] date-pick dp-applied"  >
				</label>
				<label>
					<span>Fin(format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="end-date" id="end-date"  class="validate[required] date-pick dp-applied">
				</label>
                	
                <label>
				<span>Etat:<font color="red">*</font></span>
				<select name="etat" id="etat"  class="validate[required]" style="width:200px">
					<option value="">Choisissez une etat</option>
					<option value="Planifié">Planifié</option>
					<option value="Provisoire">Provisoire</option>
					<option value="Fini">Fini</option>
					<option value="Non fini">Non fini</option>
					 <option value="Abandonné">Abandonné</option>
				</select>           
                
                 <input type="hidden" value="<?php session_start(); echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
			</label>	
                 </td>
                </tr>
                </table>
			</fieldset>
			<input class="submit" type="submit"  name="submit" value="Valider" />
</form>
<?php
					$compte=addslashes($_POST['compte']);
					$ca=addslashes($_POST['ca']);
					$nom=addslashes($_POST['nom']);
					$description=addslashes($_POST['description']);
					$debut=addslashes($_POST['start-date']); 
					$echeance= addslashes($_POST['end-date']);
					$etat=addslashes($_POST['etat']);
					$realiser=addslashes($_GET['id']);
					$montant=addslashes($_POST['montant']);
					$creer=addslashes($_POST['utilisateur']);
 if(isset($_POST["submit"]))
  {
   $req3= "insert into ligne(id_projet,nom,description,etat,debut,echeance,creer,realiser,id_compte,ca_global) values('','$nom','$description','$etat','$debut','$echeance','$creer','$realiser','$compte','$ca')";
   try {
           $Resulats = $Mysql->ExecuteSQL($req3);
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
