
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Convertir opportuniter  en projet</title>
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
<form id="formID" class="formular" method="POST" action="">
		
			<fieldset>
			<font color="red">(*)champs Obligatoires</font>
				<table>
                <tr>
                <td>
                 <label>
				 <span>intutil&eacute;:<font color="red">*</font></span>
				<input name="nom" id="nom" value="nom" class="validate[required]">
				</label>				
                <label>
				<label>
					<span>Debut(format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="debut" id="start-date" class="validate[required] date-pick dp-applied"  >
				</label>
				<label>
					<span>Fin(format AAAA-MM-JJ):</span>
					<input name="fin" id="end-date" class="validate[required] date-pick dp-applied"  >
				</label>
				</td>
				<tr>
				<td>
              <label>
				<span>Utilisateur:<font color="red">*</font></span>
				<select name="realiser" id="realiser"  class="validate[required]" style="width:200px" >
					<option value="">Choisissez un utilisateur</option>
                     <?php
	  require("../connect.php");			 
				 
  $req= "SELECT* FROM `utilisateur` ";
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
					
				
                <input type="hidden" value="<?php session_start(); echo $_SESSION["id_utilisateur"]; ?>" name="utilisateur" />
                </label></tr></td>
 </table>
			</fieldset>
			<input class="submit" type="submit"  name="submit" value="Convertir" />
</form>
				<?php
				$req1= "SELECT * FROM `opportunite` WHERE id_opportunite=".$_GET["id"];
				  try {
						   $Resulats = $Mysql->TabResSQL($req1);
						  }
						  catch (Erreur $e) {
						   echo $e -> RetourneErreur();
						  }
				foreach($Resulats as $row)
				{
					 $description=$row["description"];
				     $ca=$row["ca_global"];
					 $compte=$row["id_compte"];
				if(isset($_POST["submit"]))
					{
						$nom=addslashes($_POST['nom']);
						$debut=addslashes($_POST['debut']); 
						$echeance= addslashes($_POST['fin']);
						$etat=addslashes('Planifi&eacute;');
						$realiser=addslashes($_POST['realiser']);
						$creer=addslashes($_POST['utilisateur']);
   $req2= "insert into projet(id_projet,nom,description,etat,debut,echeance,creer,realiser,id_compte,ca_global) values('','$nom','$description','$etat','$debut','$echeance','$creer','$realiser','$compte','$ca')";
   try {
           $Resulats = $Mysql->ExecuteSQL($req2);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }

		   $req3= "update  opportunite SET `etat` = 'Gagn&eacute;e',`convertir`='V' WHERE `id_opportunite` = ".$_GET["id"];
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
	}}	
	?>
							
							
				  

				
				
				
				
				
				
				
				
				
			







