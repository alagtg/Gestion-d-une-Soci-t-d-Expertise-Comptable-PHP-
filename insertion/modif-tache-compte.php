<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Modifier t&acirc;che-compte</title>
<!-- datePicker required styles -->
<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css">
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
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
<?php
	 require("../connect.php");
			   $req= "SELECT* FROM `tache` where id_tache=".$_GET['id'];
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
                <td valign="top">
                 <label>
				<span>Etat:<font color="red">*</font></span>
				<?php 
  if ($row["etat"] == "Non commencée") $snc="selected='selected'";else $snc="";
  if ($row["etat"] == "En cours") $sec="selected='selected'";else $sec="";
  if ($row["etat"] == "Fini") $sfi="selected='selected'";else $sfi="";
  if ($row["etat"] == "Abandonnée") $sab="selected='selected'";else $sab="";
  if ($row["etat"] == "Suspendue") $ssu="selected='selected'";else $ssu="";?>
				<select name="etat" id="etat"  class="validate[required]" style="width:200px" >
					 <option value="">Choisissez l'etat</option>
					<option value="Non commencée" <?php echo $snc;?>>Non commenc&eacute;e</option>
					<option value="En cours"<?php echo $sec;?>>En cours</option>
					<option value="Fini" <?php echo $sfi;?>>Fini</option>
					<option value="Abandonnée" <?php echo $sab;?>>Abandonn&eacute;e</option>
					<option value="Suspendue"<?php echo $ssu;?>>Suspendue</option>
				</select>
                </label>
				<label>
					<span>D&eacute;but(Format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="debut" id="start-date" class="validate[required] date-pick dp-applied"  value="<?php echo $row["debut"];?>" >
				</label>
				<label>
					<span>Fin(Format AAAA-MM-JJ):<font color="red">*</font></span>
					<input name="fin" id="start-date" class="validate[required] date-pick dp-applied" value="<?php echo $row["echeance"];?>">
				</label>
                       <label>
                <span>Priorit&eacute;:<font color="red">*</font></span>
				<?php 
  if ($row["priorite"] == "Normale") $sn="selected='selected'";else $sn="";
  if ($row["priorite"] == "Haute") $sh="selected='selected'";else $sh="";
  if ($row["priorite"] == "Basse") $sb="selected='selected'";else $sb="";
  if ($row["priorite"] == "Litige") $sl="selected='selected'";else $sl="";?>
				<select name="priorite" id="priorite"  class="validate[required] " style="width:200px" >
					 <option value="">Choisir une Priorit&eacute;</option>
					<option value="Normale"  <?php echo $sn;?>>Normale</option>
					<option value="Haute"  <?php echo $sh;?>>Haute</option>
					<option value="Basse" <?php echo $sb;?>>Basse</option>
					<option value="Litige"  <?php echo $sl;?>>Litige</option>
				</select>
                </label>
                </td>
                <td>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
				<label>
					<span>T&acirc;che:<font color="red">*</font> </span>
					<textarea class="validate[required,length[6,300]] text-input" name="tache" id="tache" rows="3" cols="3" style="width:200px"><?php echo $row["description"];?> </textarea>
				</label>
				 <label>
				<span>Projet:</span>
				<select name="projet" id="projet"   style="width:200px" >
					<option value="">Choisissez un Projet</option>
                    <?php
				
  $req1= "SELECT* FROM `projet`";
  try {
           $Resulats2 = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
		  $tprojet="";
foreach($Resulats2 as $rowp)
{
if ($rowp["id_projet"] == $row["id_projet"]) $tprojet="selected='selected'";else $tprojet="";
?>
    <option value="<?php echo $rowp["id_projet"];?>" <?php echo $tprojet;?>><?php echo $rowp["nom"];?></option>
    <?php  }
								
					 ?>
				</select>
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
                 </td>
                </tr>
                </table>
							
			</fieldset>
			<input class="submit"  name="submit" type="submit" value="Modifier" /> 

</form>
<?php
}
?>
<?php

  if(isset($_POST["submit"]))
  
	{$projet= addslashes($_POST['projet']);
	$etat= addslashes($_POST['etat']);
	        $debut=addslashes($_POST['debut']);
			$fin=addslashes($_POST['fin']);
			$realiser=addslashes($_POST['realiser']);
			$priorite=addslashes($_POST['priorite']);
			$description=addslashes($_POST['tache']);
			$compte=addslashes($_GET['id']);
		 $req3= "update  tache SET `etat` = '$etat',`debut` = '$debut',`echeance` = '$fin',`priorite` = '$priorite',`description` = '$description',`realiser` = '$realiser',`id_projet` = '$projet' WHERE `id_tache` = ".$_GET["id"];
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
