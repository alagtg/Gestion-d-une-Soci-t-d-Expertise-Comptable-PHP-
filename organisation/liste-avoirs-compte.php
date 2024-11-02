<div id="data-table">

<table class="style1 datatable">
<thead>
<tr>
<th>N&deg;</th>
<th>R&eacute;ferance</th>
<th>Date</th>
<th>Montant totale</th>
<th>Montant remis</th>
<th>Reste</th>
<th>Compte</th>
<th>D&eacute;tails</th>
<th>Imp.</th>
<th>Sup.</th>

</tr>
</thead>
<tbody>
<?php


$req1= "SELECT* FROM `avoir`where id_compte=".$_GET["id"];
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>

<tr><td><?php echo $row["id_avoir"];  ?></td>
<td><?php echo $row["reference"];  ?></td>
<td><?php echo $row["date_avoir"]; ?></td>
<td><?php echo $row["prix_totale"];?></td>
<td><?php echo $row["remis"];      ?></td>
<td><?php echo $row["reste"];     ?></td>
<td><?php
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
</td>
<td>
<a id="davoir<?php echo $row["id_avoir"];?>" href="#form-detail-<?php echo $row["id_avoir"];?>"title="d&eacute;tails avoirs"><img src="images/icon-32-new.png" width="16" /></a>
<script type="text/javascript">
$("#davoir<?php echo $row["id_avoir"];?>").fancybox({
'width': '60%',
'height': '100%',
});
</script>
</td>
<td><a id="impa<?php echo $row["id_avoir"];?>" href="insertion/imprime-avoir.php?id=<?php echo $row["id_avoir"];?>"title="Imprimer ce avoirs"><img src="images/printButton.png" width="16" /></a>


<script type="text/javascript">
$("#impa<?php echo $row["id_avoir"];?>").fancybox({
'width' : '100%',
'height': '100%',
'type': 'iframe'								
});
</script>
</td>
<td><a id="supa<?php echo $row["id_avoir"];?>" href="#form-sup-<?php echo $row["id_avoir"];?>" title="Supprimer ce avoirs"><img src="images/ico_delete_16.png" width="16" /></a></a>

<script type="text/javascript">
$("#supa<?php echo $row["id_avoir"];?>").fancybox({
'width'				: '60%',
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


$req1= "SELECT* FROM `avoir`";
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
<form id="form-sup-<?php echo $row["id_avoir"];?>" style="width:250px;" method="post" action="" class="notification note-error">
<center>
vouler vous supprimer ce avoirs !!!<br /><br />
<input id="<?php echo $row["id_avoir"];?>"  name="oui"  value="oui"type="submit" class="button red size-30">
<input type="hidden" name="sa" value="<?php echo $row["id_avoir"];?>" />
<input id="<?php echo $row["id_avoir"];?>"  name="non" value="non "type="submit" class="button grey size-30">
</center>
</form>

</div>

<div id="detail" style="width:700px; display:none" >
<form id="form-detail-<?php echo $row["id_avoir"];?>"  class="mark_blueciel add-category" >
<table>
<tr>
<td><font color="red">R&eacute;ference:</font></td>
<td><?php echo $row["reference"];?></td>
<td><font color="red">&nbsp;Date facture:</font></td>
<td><?php echo $row["date_avoir"];?></td>
</tr>
<tr>
<td><font color="red">Bon commande:</font></td>
<td><?php echo $row["bon_commande"];?></td>
<td><font color="red">&nbsp;Bon livraison:</font></td>
<td><?php echo $row["bon_livraison"];?></td>
</tr>
<tr>
<td><font color="red">Total HT:</font></td>
<td><?php echo $row["total_ht"];?></td>
<td><font color="red">&nbsp;Total TVA:</font></td>
<td><?php echo $row["total_tva"];?></td>
</tr>
<tr>
<td><font color="red">Montant remis:</font></td>
<td><?php echo $row["remis"];?></td>
<td><font color="red">&nbsp;Reste:</font></td>
<td><?php echo $row["reste"];?>  </td>
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

$req="delete  from  avoir  WHERE `id_avoir`=".$_POST['sa'];

try {
$Resulats = $Mysql->ExecuteSQL($req);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$req2="delete  from ligne_avoir WHERE `id_avoir`=".$_POST['sa'];

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






