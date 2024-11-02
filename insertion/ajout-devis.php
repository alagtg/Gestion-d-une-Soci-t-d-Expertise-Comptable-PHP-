<html>
	<head>
		

		<script type="text/javascript">
		$(function() {
			
			$( "#datepicker1" ).datepicker();
			});	
		</script>
		
		<script type="text/javascript">	
			$(function(){
			$("#iddevis").formwizard({ 
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
			p=document.getElementById('nbprod').value
			liste="";
			for(i=1;i<=p;i++)
			{
			liste=liste+"<tr><td><select name='ref"+i+"'><option>Choisissez un produit</option><?php
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
		$date=addslashes($_POST['datedevis']);
		$tdt=explode(" ",$date);
		$td=explode("/",$tdt[0]);
		$date=$td[2]."-". $td[0]."-". $td[1];
		$compte=addslashes($_POST['compte']);
		$ttc=addslashes($_POST['ttc']); 
		$req2="INSERT INTO devis (`id_devis`,`reference`,`date_devis`,`prix`,`id_compte`) VALUES ('', '$ref', ' $date', '$ttc', '$compte')";
		try {
		$Resulats = $Mysql->ExecuteSQL($req2);
		$dernierid = $Mysql->DernierId();
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		//$nbprod=addslashes($_POST['nbprod']);
		for($i=1;$i<=$nbprod;$i++)
		{
		$q="qte".$i;
		$r="ref".$i;
		$qte=addslashes($_POST[$q]);
		$refprod=addslashes($_POST[$r]);
		$req4="INSERT INTO ligne_devis (`id_devis`,`ref`,`qte`) VALUES ('$dernierid', '$refprod', '$qte' )";
		try {
		$Resulats = $Mysql->ExecuteSQL($req4);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		}
	//	header("location:index.php?page=gerer-devis");
		}	  
		?>	
		<h1>Ajouter devis</h1>
		
		<a href="index.php?page=gerer-devis"> <img src="images/return.png" width="32" title="Retourner"/></a></p>
		<form id="iddevis" method="post" action="" class="bbq">
		<div id="fieldWrapper" style="padding:5px;">
		<span class="step" id="first">
		<table id="tabfact">
		<font color="red">(*)champs Obligatoires</font>					 
		<tr><td>R&eacute;ferance de Devis:<font color="red">*</font></td><td><input type="text"
		  class="required number" name="ref"  size="25" /></td></tr>
		<tr><td>Date de Devis:<font color="red">*</font></td><td><input type="text" name="datedevis" 
		class="required date" id="datepicker1"  size="25"/></td></tr> 
		<tr><td>Montant TTC:<font color="red">*</font></td><td><input type="text" class="required number" 
		 name="ttc" size="25" /></td></tr> 
		
		<tr><td>Compte:<font color="red">*</font></td><td><select name="compte" id="compte"  
		class="required" ><option value="">Choisissez un compte</option> 
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
