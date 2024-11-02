<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head><title>Ajouter avoirs</title>

<script type="text/javascript">
$(function() {
$( "#datepicker1" ).datepicker();
});	
</script>

<script type="text/javascript">	
$(function(){
$("#idavoirs").formwizard({ 
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
$date=addslashes($_POST['dateavoirs']);

$tdt=explode(" ",$date);
$td=explode("/",$tdt[0]);

$date=$td[2]."-". $td[0]."-". $td[1];
$compte=addslashes($_POST['compte']);
$tht=addslashes($_POST['tht']);
$tva=addslashes($_POST['tva']);
$ttc=addslashes($_POST['ttc']);
$bon_commande=addslashes($_POST['bc']);
$bon_livraison=addslashes($_POST['bl']);
$remis=addslashes($_POST['remis']);
$reste=addslashes($_POST['reste']);

$req2="INSERT INTO avoir (`id_avoir`,`reference`,`bon_commande`,`bon_livraison`,`date_avoir`,`total_ht`,`total_tva`,`prix_totale`,`remis`,`reste`,`id_compte`) VALUES ('', '$ref', '$bon_commande', '$bon_livraison', '$date', '$tht', '$tva', '$ttc', '$remis' , '$reste', '$compte')";

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

$req4="INSERT INTO ligne_avoir (`id_avoir`,`ref`,`qte`) VALUES ('$dernierid', '$refprod', '$qte' )";

try {
$Resulats = $Mysql->ExecuteSQL($req4);

}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}




}
header("location:index.php?page=gerer-avoirs");
}	  

?>	
<h1>Ajouter avoirs</h1>
<a href="index.php?page=gerer-avoirs"> <img src="images/return.png" width="32" title="Retourner"/></a></p>
<form id="idavoirs" method="post" action="" class="bbq">
<div id="fieldWrapper" style="padding:5px;">
<span class="step" id="first">
<table id="tabfact">
<font color="red">(*)champs Obligatoires</font>						
<tr><td>R&eacute;ferance :<font color="red">*</font></td><td><input type="text"  class="required number" name="ref"  size="25" /></td></tr>
<tr><td>Date :<font color="red">*</font></td><td><input type="text" name="dateavoirs" class="required date" id="datepicker1"  size="25"/></td></tr> 
<tr><td>Bon de commande:<font color="red">*</font></td><td><input type="text" class="required number"  name="bc"  size="25" /></td></tr>
<tr><td>Bon de livraison:<font color="red">*</font></td><td><input type="text" class="required number" name="bl"  size="25" /></td></tr>
<tr><td>Total HT:<font color="red">*</font></td><td><input type="text" class="required number"  name="tht"  size="25"/></td></tr>
<tr><td>Total TVA:<font color="red">*</font></td><td><input type="text" class="required number"  name="tva" size="25"/></td></tr>
<tr><td>Montant TTC:<font color="red">*</font></td><td><input type="text" class="required number"  name="ttc" size="25" /></td></tr> 
<tr><td>Montant remis:<font color="red">*</font></td><td><input type="text" class="required number"  name="remis" size="25" /></td></tr> 
<tr><td>Reste:<font color="red">*</font></td><td><input type="text" class="required number"  name="reste" size="25" /></td></tr> 
<tr><td>Nombre de produit:<font color="red">*</font></td><td><input type="text" class="required number" id="nbprod" name="nbprod" size="25" onchange="changeprod()"/> </td></tr>      
<tr><td>Compte:<font color="red">*</font></td><td><select name="compte" id="compte"  class="required" ><option value="">Choisissez un compte</option> 
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
<thead>
<tr>
<th>Produits </th>
<th>Qte</th>


</tr>
</thead>
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






