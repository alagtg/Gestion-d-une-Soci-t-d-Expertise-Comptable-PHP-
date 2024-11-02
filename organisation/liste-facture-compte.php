
<div id="data-table">

<table class="style1 datatable">
<thead>
<tr>
<th>N&deg;</th>
<th>R&eacute;ferance</th>
<th>Date</th>
<th>Montant totale</th>
<th>Compte</th>
<th>D&eacute;tails</th>
<th>Imp.</th>
<th>Sup.</th>
</tr>
</thead>
<tbody>
<?php


$req1= "SELECT* FROM `facture`where id_compte=".$_GET["id"];
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<tr><td><?php echo $row["id_facture"];?></td>
<td><?php echo $row["reference"];?></td>
<td><?php echo $row["date_facture"];?></td>
<td><?php echo $row["prix_totale"];?></td>

<td>
<?php
$req3= "SELECT* FROM `compte` where id_compte=".$row["id_compte"];
try {
$Resulats1 = $Mysql->TabResSQL($req3);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats1 as $compte)
{

echo $compte["compte"];
}
?>
</td>
<td>
<a id="dfacture<?php echo $row["id_facture"];?>" href="#form-detail-<?php echo $row["id_facture"];?>"title="d&eacute;tails facture"><img src="images/icon-32-new.png" width="16" /></a>
<script type="text/javascript">
$("#dfacture<?php echo $row["id_facture"];?>").fancybox({
'width'				: '60%',
'height'			: '100%',
});
</script>
</td>

<td><a id="impf<?php echo $row["id_facture"];?>" href="insertion/imprime-facture.php?id=<?php echo $row["id_facture"];?>"title="Imprimer ce facture"><img src="images/printButton.png" width="16" /></a>


<script type="text/javascript">
$("#impf<?php echo $row["id_facture"];?>").fancybox({
'width' : '100%',
'height': '100%',
'type': 'iframe'								
});
</script>

</td>

<td><a id="supf<?php echo $row["id_facture"];?>" href="#form-sup-<?php echo $row["id_facture"];?>"title="Supprimer cette facture" ><img src="images/ico_delete_16.png" width="16" /></a>

<script type="text/javascript">

$("#supf<?php echo $row["id_facture"];?>").fancybox({
'width'				: '90%',
'height'			: '100%'




});

</script></td>

</tr>                   

<?php    
}

?>	                      
</tbody>
</table>


</div>

<?php


$req4= "SELECT* FROM `facture`";
try {
$Resulats = $Mysql->TabResSQL($req4);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<div id="sup" style="display:none"  >
<form id="form-sup-<?php echo $row["id_facture"];?>" style="width:400px;" method="post" action="" class="notification note-error">
<center>

vouleZ vous supprimer cette facture !!! <br /><br />
<input id="<?php echo $row["id_facture"];?>"  name="oui"  value="oui"type="submit" class="button red size-30">
<input type="hidden" name="sfc" value="<?php echo $row["id_facture"];?>" />
<input id="<?php echo $row["id_facture"];?>"  name="non" value="non "type="submit" class="button grey size-30">
</center>
</form>
</div>
<div id="detail" style="width:700px; display:none" >
<form id="form-detail-<?php echo $row["id_facture"];?>"  class="mark_blueciel add-category" >
<table>
<tr>
<td><font color="red">R&eacute;ference:</font></td>
<td><?php echo $row["reference"];?></td>
<td><font color="red">&nbsp;Date facture:</font></td>
<td><?php echo $row["date_facture"];?></td>
</tr>

<tr>
<td><font color="red">Total HT:</font></td>
<td><?php echo $row["total_ht"];?></td>
<td><font color="red">&nbsp;Total TVA:</font></td>
<td><?php echo $row["total_tva"];?></td>
</tr>
<tr>

<td><font color="red">&nbsp;Prix totale:</font></td>
<td><?php echo $row["prix_totale"];?>  </td>
</tr>
<tr>
<td><font color="red">Compte:</font></td>
<td><?php

$req5= "SELECT* FROM `compte`where id_compte=".$row["id_compte"];;
try {
$Resulats1 = $Mysql->TabResSQL($req5);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats1 as $rowt)
{
?>
<?php echo $rowt["compte"];?>
<br />
<?php } ?>
</td>
</tr>
</table>
</form>
</div>

<?php } ?>



<?php
if(isset($_POST['oui']))

{

$req7="delete  from  facture  WHERE `id_facture`=".$_POST['sfc'];

try {
$Resulats = $Mysql->ExecuteSQL($req7);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$req8="delete  from fact_prod WHERE `id_facture`=".$_POST['sfc'];

try {
$Resulats = $Mysql->ExecuteSQL($req8);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
header("location:index.php?page=gerer-comptes");  
}
?>





</form>
</html>






