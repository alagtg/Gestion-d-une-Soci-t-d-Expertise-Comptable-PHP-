<div id="data-table">
<h1>Pays</h1>
<p align="right"><a href="insertion/pays.php" id="gerer-pays" class="button blue size-80" 
title="Ajouter une pays">Ajouter</a></p>
<table class="style1 datatable">
<thead>
<tr>
<th>Id</th>
<th>Nom</th>
<th>&nbsp;</th>
<th></th>
<th></th>
<th></th>
<th>Sup.</th>
<th>Mod.</th>
</tr>
</thead>
<tbody>
<?php
$req1= "SELECT* FROM `pays`";
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<tr>
<td><?php echo $row["id_pays"];?></td>
<td><?php echo $row["nom"];?></td>
<td>&nbsp;</td>
<td></td>
<td></td>
<td></td>
<td><a id="pays<?php echo $row["id_pays"];?>" href="id=<?php echo $row["id_pays"];?>?#form-sup-<?php echo $row["id_pays"];?>"  title="Suppression d'une pays"><img src="images/ico_delete_16.png"  width="16" /></a>
 <script type="text/javascript">
								    $("#pays<?php echo $row["id_pays"];?>").fancybox({
								      'width'             : '50%',
								      'height'            : '50%',
								      'onClosed'          : function(e)
												 {
									parent.location.reload(true);
				 								}											  });
			  
								</script>
</td>
<td><a id="mpays<?php echo $row["id_pays"];?>" href="insertion/modif-pays.php?id=<?php echo $row["id_pays"];?>"  
title="Modification d'une pays"><img src="images/ico_edit_16.png"  width="16" /></a>
<script type="text/javascript">
$("#mpays<?php echo $row["id_pays"];?>").fancybox({
'width'		    : 400,
'height'	    : 220,
'type'		    : 'iframe',	
'onClosed': function(e)
{
parent.location.reload(true);
}	
});

</script>
</tr>
<?php    
}
?>
</tbody>
</table>
</div>
<?php
$req2= "SELECT* FROM `pays`";
try {
$Resulats = $Mysql->TabResSQL($req2);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row)
{
?>
<div id="sup" style="display:none"  >
<form id="form-sup-<?php echo $row["id_pays"];?>" style="width:300px;" method="post" action=""	class="notification note-error">
<center>
Voulez vous supprimer cet ville ? <br />
<br />
<input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
<input type="hidden" name="sp" value="<?php echo $row["id_pays"];?>"/>
<input type="submit" id="nom" name="non" value="Non" class="button grey size-30">
<br />
&nbsp;
</center>
</form>
</div>
<?php 
} 
?>
<?php
if(isset($_POST['oui']))
{
$req3="delete  from pays  WHERE `id_pays` =".$_POST['sp'];
try {
$Resulats = $Mysql->ExecuteSQL($req3);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
//header("location:index.php?page=pays");
}
?>
</div>
