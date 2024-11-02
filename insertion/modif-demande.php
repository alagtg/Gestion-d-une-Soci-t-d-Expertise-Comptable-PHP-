<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier ce demande</title>
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
<?php
	require("../connect.php");
	
	$req= "SELECT* FROM `ligne` WHERE id_projet=".$_GET['id'];
  try {
           $Resulats = $Mysql->TabResSQL($req);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
  foreach($Resulats as $row)
    {

?>
<form id="formID" class="formular" method="post" action="">
  <fieldset>
  <font color="red">(*)champs Obligatoires</font>
  <table>
  <tr>
  <td>
   <label>			<span>Intutil&eacute;:<font color="red">*</font></span>
					<input name="nom" id="nom" value="<?php echo $row["nom"];?>" class="validate[required]">
				</label>
  <label>
				<span>Utilisateur:<font color="red">*</font></span>
				<select name="realiser" id="realiser"  class="validate[required]" style="width:200px" >
					<option value="">Choisissez un utilisateur</option>
                    <?php
				
  $req1= "SELECT* FROM `utilisateur`";
  try {
           $Resulats2 = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
		  $tutilisateur="";
foreach($Resulats2 as $rowu)
{
if ($rowu["id_utilisateur"] == $row["realiser"]) $tutilisateur="selected='selected'";else $tutilisateur="";
?>
    <option value="<?php echo $rowu["id_utilisateur"];?>" <?php echo $tutilisateur;?>><?php echo $rowu["nom"];?>&nbsp;<?php echo $rowu["prenom"];?></option>
    <?php  }
								
					 ?>
				</select>
        		                </label>
 
  <label> <span>Compte:<font color="red">*</font></span>
  <select name="compte" id="compte"  value="" class="validate[required]"style="width:200px" >
    <option value="">Choisissez un compte</option>
    <?php
			  
   
  $req1= "SELECT* FROM `compte`";
  try {
           $Resulats1 = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
		  $cprojet="";
foreach($Resulats1 as $rowcompte)
{
if ($rowcompte["id_compte"] == $row["id_compte"]) $cprojet="selected='selected'";else $cprojet="";

?>
    <option value="<?php echo $rowcompte["id_compte"];?>" <?php echo $cprojet;?>><?php echo $rowcompte["compte"];?></option>
    <?php } ?>
  </select>
  </label>
  <label> <span>Description:<font color="red">*</font> </span>
  <textarea class="validate[required,length[6,300]] text-input"  name="description" id="description" rows="3" cols="3"style="width:200px"><?php echo $row["description"];?> </textarea>
  </label>
  </td>
  <td>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
  <td>
 
  <label> <span>D&eacute;but(Format AAAA-MM-JJ):<font color="red">*</font> </span>
  <input name="debut" id="start-date" class="validate[required] date-pick dp-applied"  value="<?php echo $row["debut"];?>" />
  </label>
  <label> <span>Fin(Format AAAA-MM-JJ):<font color="red">*</font> </span>
  <input class="validate[required] date-pick dp-applied" type="text" name="fin"  value="<?php echo $row["echeance"];?>" id="end-date" />
  </label>
  <label> <span>Etat:<font color="red">*</font></span>
  <?php 
  if ($row["etat"] == "Planifié") $spl="selected='selected'";else $spl="";
  if ($row["etat"] == "Provisoire") $spr="selected='selected'";else $spr="";
  if ($row["etat"] == "Fini") $sfi="selected='selected'";else $sfi="";
  if ($row["etat"] == "Abandonnée") $sab="selected='selected'";else $sab="";
  if ($row["etat"] == "Non fini") $snf="selected='selected'";else $snf="";?>
  <select name="etat" id="etat"  class="validate[required]"style="width:200px" >
    <option value="">Choisissez l'etat</option>
    <option value="accepte" <?php echo $spl;?>>accepte</option>
    <option value="refus"<?php echo $spr;?>>refus</option>
    
  </select>
  </label>
                </td>
                </tr>
                </table>
  </fieldset>
  
    <input class="submit" type="submit"  name="submit" value="Modifier" />
 
</form>
<?php
}

?>
<?php
			
 if(isset($_POST["submit"]))
  {                         $ca=addslashes($_POST['ca']);
							$compte=addslashes($_POST['compte']);
							$nom=addslashes($_POST['nom']);
							$description=addslashes($_POST['description']);
							$debut=addslashes($_POST['debut']); 
							$fin= addslashes($_POST['fin']);
							$etat=addslashes($_POST['etat']);
							$montant=addslashes($_POST['montant']);
							$realiser=addslashes($_POST['realiser']);
							
  
   $req2= "update  ligne SET `nom` = '$nom',`description` = '$description',`etat` = '$etat',`debut` = '$debut',`echeance` = '$fin',`realiser` = '$realiser',`id_compte` = '$compte',`ca_global`='$ca' WHERE `id_projet`=".$_GET['id']; 
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
