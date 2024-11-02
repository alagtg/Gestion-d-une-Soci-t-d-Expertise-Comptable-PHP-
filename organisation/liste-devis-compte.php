<div id="data-table">

<table class="style1 datatable">
<thead>
<tr>
<th>N&deg;</th>
<th>R&eacute;ferance</th>
<th>Date</th>
<th>Montant Totale</th>
<th>Compte</th>
<th>D&eacute;tails</th>
<th>Imp.</th>
<th>Sup.</th>

</tr>
</thead>
<tbody>
<?php


$req1= "SELECT* FROM `devis`where id_compte=".$_GET["id"];
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<tr><td><?php echo $row["id_devis"];?></td>
<td><?php echo $row["reference"];?></td>
<td><?php echo $row["date_devis"];?></td>
<td><?php echo $row["prix"];?></td>
<td>
<?php
$req2= "SELECT* FROM `compte` where id_compte=".$row["id_compte"];
try {
$Resulats1 = $Mysql->TabResSQL($req2);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats1 as $compte)
{

echo $compte["compte"];
}
?>
<td>
<a id="ddevis<?php echo $row["id_devis"];?>" href="#form-detail-<?php echo $row["id_devis"];?>"title="d&eacute;tails devis"><img src="images/icon-32-new.png" width="16" /></a>
<script type="text/javascript">
$("#ddevis<?php echo $row["id_devis"];?>").fancybox({
'width'				: '60%',
'height'			: '100%',
});
</script>
</td>
</td>


<td><a id="impd<?php echo $row["id_devis"];?>" href="insertion/imprime-devis.php?id=<?php echo $row["id_devis"];?>"title="Imprimer ce devis"><img src="images/printButton.png" width="16" /></a>


<script type="text/javascript">
$("#impd<?php echo $row["id_devis"];?>").fancybox({
'width' : '100%',
'height': '100%',
'type': 'iframe'								
});
</script>
<td><a id="supd<?php echo $row["id_devis"];?>" href="#form-sup-<?php echo $row["id_devis"];?>"title="Supprimer ce devis" ><img src="images/ico_delete_16.png" width="16" /></a>

<script type="text/javascript">

$("#supd<?php echo $row["id_devis"];?>").fancybox({
'width'				: '60%',
'height'			: '100%'
});
</script></td>
</td>

</tr>                   

<?php    
}

?>	                      
</tbody>
</table>


</div>

<?php


$req1= "SELECT* FROM `devis`";
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<div id="sup" style="display:none"  >
<form id="form-sup-<?php echo $row["id_devis"];?>" style="width:250px;" method="post" action="" class="notification note-error">
<center>
voulez vous supprimer ce devis !!!<br /><br />
<input id="<?php echo $row["id_devis"];?>"  name="oui"  value="oui"type="submit" class="button red size-30">
<input type="hidden" name="sd" value="<?php echo $row["id_devis"];?>" />
<input id="<?php echo $row["id_devis"];?>"  name="non" value="non "type="submit" class="button grey size-30">
</center>
</form>

</div>
<div id="detail" style="width:700px; display:none" >
<form id="form-detail-<?php echo $row["id_devis"];?>"  class="mark_blueciel add-category" >
<table>
<tr>
<td><font color="red">R&eacute;ference:</font></td>
<td><?php echo $row["reference"];?></td>
<td><font color="red">&nbsp;Date devis:</font></td>
<td><?php echo $row["date_devis"];?></td>
</tr>
<tr>
<td><font color="red">Prix totale:</font></td>
<td><?php echo $row["prix"];?></td>
<td><font color="red">&nbsp;Compte:</font></td>
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
$req="delete  from  devis  WHERE `id_devis` =".$_POST['sd'];
try {
$Resulats = $Mysql->ExecuteSQL($req);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
$req2="delete  from ligne_devis WHERE `id_devis`=".$_POST['sd'];

try {
$Resulats = $Mysql->ExecuteSQL($req2);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}


header("location:index.php?page=gerer-comptes");
}
?>





</form>
</html>






