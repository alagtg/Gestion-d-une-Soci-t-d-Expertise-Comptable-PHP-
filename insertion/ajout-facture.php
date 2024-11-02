<html>
	<head>
	<title>Ajouter facture</title>

	<script type="text/javascript">
		$(function() {
		$( "#datepicker2" ).datepicker();
		});	
	</script>
	<script type="text/javascript">	
		$(function(){
		$("#idfact").formwizard({ 
		historyEnabled : true, 
		formPluginEnabled: true, 
		focusFirstInput : true,
		validationEnabled: true
		}
		);
		});
	</script>	
	<script type="text/javascript">
		function changeprod(){						
		p=document.getElementById('nbprod').value;
		liste="";
		for(i=1;i<=p;i++)
		{
		$req= "SELECT * FROM `produits`";
		try {
		$Resulats = $Mysql->TabResSQL($req);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $row)
		{
		echo"<option value='".$row["ref"]."'>".$row["nom_produit"]."</option>";
		} ?></select></td><td><input size='3' name='qte"+i+"'></td></tr>" ;
		}					 
		document.getElementById('tab').innerHTML = liste;
		}
	</script> 
	</head>
	<body>
	<div id="demoWrapper">					
	<?php
	if(isset($_POST["submit"]))
	{
	$ref=addslashes($_POST['ref']);
	$date=addslashes($_POST['datefact']);
	$tdt=explode(" ",$date);
	$td=explode("/",$tdt[0]);
	$date=$td[2]."-". $td[0]."-". $td[1];
	$compte=addslashes($_POST['compte']);
	$tht=addslashes($_POST['tht']);
	$tva=addslashes($_POST['tva']);
	$ttc=addslashes($_POST['ttc']);
	$bon_commande=addslashes($_POST['bc']);
	$bon_livraison=addslashes($_POST['bl']);
	$timbre=addslashes($_POST['timbre']);
	$req2="INSERT INTO facture (`id_facture`,`reference`,`bon_commande`,`bon_livraison`,`date_facture`,`total_ht`,`total_tva`,`prix_totale`,`timbre`,`id_compte`) VALUES ('', '$ref', '$bon_commande', '$bon_livraison', '$date', '$tht', '$tva', $timbre , '$ttc','$compte')";
	try {
	$Resulats = $Mysql->ExecuteSQL($req2);
	$dernierid = $Mysql->DernierId();
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	$nbprod=addslashes($_POST['nbprod']);
	for($i=1;$i<=$nbprod;$i++)
	{
	$q="qte".$i;
	$r="ref".$i;
	$qte=addslashes($_POST[$q]);
	$refprod=addslashes($_POST[$r]);
	$req4="INSERT INTO ligne_facture (`id_facture`,`ref`,`qte`) VALUES ('$dernierid', '$refprod', '$qte' )";
	try {
	$Resulats = $Mysql->ExecuteSQL($req4);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	$req5="SELECT bonnus FROM `produits` WHERE ref=$refprod";
	try {
	$Resulats_bonuus = $Mysql->TabResSQL($req5);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	foreach($Resulats_bonuus as $row)
	{
	$bonus=$qte*$row["bonnus"];
	}
	$req6="UPDATE compte SET bonus=bonus+$bonus WHERE compte.id_compte=$compte";
	try {
	$Resulats = $Mysql->ExecuteSQL($req6);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	}
	//header("location:index.php?page=gerer-fatures");
	}	  
	?>	
	<h1>Ajouter facture</h1>
	<a href="index.php?page=gerer-fatures"> <img src="images/return.png" width="32" title="Retourner"/></a></p>
	<form id="idfact" method="post" action="" class="bbq">
	<div id="fieldWrapper" style="padding:5px;">
	<span class="step" id="first">
	<table id="tabfact">       
	<font color="red">(*)champs Obligatoires</font>
	<tr><td>R&eacute;ferance de facture:<font color="red">*</font></td><td>
	<input type="text"  class="required number" name="ref"  size="25" /></td></tr>
	<tr><td>Date de facture:<font color="red">*</font></td><td>
	<input type="text" name="datefact" class="required date" id="datepicker2"  size="25"/></td></tr> 
	<tr><td>Total HT:<font color="red">*</font></td><td>
	<input type="text" class="required number"  name="tht"  size="25"/></td></tr>
	<tr><td>Total TVA:<font color="red">*</font></td><td>

	<input type="text" class="required number"  name="timbre" size="25"/></td></tr>
	<tr><td>Montant TTC:<font color="red">*</font></td><td>
	<input type="text" class="required number"  name="ttc" size="25" /></td></tr>      
	<tr><td>Nombre de produit:<font color="red">*</font></td><td>
	<input type="text" class="required number" id="nbprod" name="nbprod"
	 size="25" onChange="changeprod()"/> </td></tr>      
	<tr><td>Compte:<font color="red">*</font></td><td><select name="compte"
	 id="compte"  class="required" ><option value="">Choisissez un compte</option> 
	<?php
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
	</select></td></tr>
	</table>
	</span>
	<span id="second" class="step">
	<div id="data-table">					
	<table class="style1 ">
	
	<tbody id="tab">
	</tbody>
	</table>
	</div>
	</span>
	</div>
	<div id="demoNavigation"> 							
	<input class="navigation_button" id="back" value="Presedent" type="reset" />
	<input class="navigation_button" id="next" value="Suivant" name="submit" type="submit" />
	</div>
	</form>
	</div>			
	</body>
</html> 






