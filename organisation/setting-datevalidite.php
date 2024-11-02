
<div id="data-table">
<h1>Date validité</h1>
 
<table class="style1 datatable">
<thead>
<tr>
<th>N&deg;</th>
<th>Nom</th>
<th>validité</th>
<th>Adrresse</th>
<th></th>
<th></th>
<th></th>
<th>Mod.</th>
</tr>
</thead>
<tbody>
<?php
$req1= "SELECT* FROM `compte`";
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
<td><?php echo $row["id_compte"];?></td>
<td><?php echo $row["compte"];?></td>
<td><?php echo $row["date_validite"];?></td>
<td><?php echo $row["adresse"];?></td>
<td></td>
<td></td>
<td>
</td>
<td><a id="comptedate<?php echo $row["id_compte"];?>" 
href="insertion/modif-comptedate.php?id=<?php echo $row["id_compte"];?>" 
title="Modification d'une date de validte"><img src="images/ico_edit_16.png"  
width="16" /></a>
<script type="text/javascript">
							$("#comptedate<?php echo $row["id_compte"];?>").fancybox({
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

