<div id="data-table">
  <h1>G&eacute;rer les managers</h1>
  <p align="right"><a href="insertion/utilisateur.php" id="gerer-utilisateur" class="button blue size-80"
		 title="Ajout d'un utilisateur">Ajouter</a></p>
  <table class="style1 datatable">
    <thead>
      <tr>
        <th width="32">N&deg;</th>
        <th width="32">Type </th>
        <th>Nom</th>
        <th>Pr&eacute;nom</th>
        <th width="160">Cr&eacute;ation</th>
        <th>Modification</th>
        <th width="32">Etat</th>
	  <th width="32">Suivi</th>
        <th width="32">Mod.</th>
        <th width="32">Pas.</th>
        <th width="32">Sup.</th>
	  <th width="32">Mail.</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$req1= "SELECT* FROM `utilisateur`";
		try {
		$Resulats = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e)
		{
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $row)
		{
	?>
      <tr>
        <td><?php echo $row["id_utilisateur"];?></td>
        <td>
		<?php 	
			if($row["type"]=="Manager")
			{								
			echo'<img src="images/m.png" alt="Manager" title="Manager" />';
			}
			elseif($row["type"]=="Simple Manager")
			{
														
			echo '<img src="images/simpm.png" alt="Simple Manager" title="Simple Manager" />';
			}	
			else
			{
			echo '<img src="images/supm.png" alt="Super Manager" title="Super Manager" />';
			}
		?>
	</td>
	<td><?php echo strtoupper($row["nom"]);?></td>
	<td><?php echo $row["prenom"];?></td>
	<td><?php echo date_fr($row["date_creation"]);?></td>
	<td><?php echo date_fr($row["date_dernier_modif"]);?></td>
	<td>
	<?php
		if($row["activation"]=="F")
		{																					
		echo '<a href="organisation/activer-utilisateur.php?id='.$row["id_utilisateur"].'&amp;etat=V"><img src="images/ico_inactive_16.png" alt="Inactif" title="Inactif" /></a>';
		}			 
		else
		{
		echo '<a href="organisation/activer-utilisateur.php?id='.$row["id_utilisateur"].'&amp;etat=F"><img src="images/ico_active_16.png" alt="Actif" title="Actif" /></a>';
		}			 									
	?>
		   </td>
         <td><a href="index.php?page=suivi-utilisateur&id=<?php echo $row["id_utilisateur"];?>&nom=<?php echo $row["nom"].' '.$row["prenom"];?>" title="Suivi de utilisateur (<?php echo $row["nom"].''.$row["prenom"];?>)"><img src="images/ico_manage-users_48.png" width="16" /></a></td>
         <td>
<a id="m<?php echo $row["id_utilisateur"];?>" href="insertion/modif-utilisateur.php?id=<?php echo $row["id_utilisateur"];?>" title="Modification de l'utilisateur (<?php echo $row["nom"].' '.$row["prenom"];?>)"><img src="images/ico_edit_16.png" width="16" /></a>
			<script type="text/javascript">
				$("#m<?php echo $row["id_utilisateur"];?>").fancybox({
				'width': 740,
				'height': 470,
				'type': 'iframe',
				'onClosed': function(e)
				{
				parent.location.reload(true);
				}
				});
			
			</script>
           </td><td><a id="mot<?php echo $row["id_utilisateur"];?>" href="insertion/modif-pass.php?id=<?php echo $row["id_utilisateur"];?>" title="Modification du mot de passe de <?php echo $row["nom"];?> <?php echo $row["prenom"];?>)"><img src="images/key.png" width="16" /></a>
			<script type="text/javascript">
				$("#mot<?php echo $row["id_utilisateur"];?>").fancybox({
				'width': 400,
				'height': 220,
				'type': 'iframe',
				'onClosed': function(e)
				{
				parent.location.reload(true);
				}
				});
			
			</script>
           </td>
         <td><a id="s<?php echo $row["id_utilisateur"];?>" href="#form-sup-<?php echo $row["id_utilisateur"];?>" title="Suppression de l'utilisateur (<?php echo $row["nom"].' '.$row["prenom"];?>)"><img src="images/ico_delete_16.png" width="16" /></a>
			<script type="text/javascript">
				$("#s<?php echo $row["id_utilisateur"];?>").fancybox({
				'width'				: '50%',
				'height'			: '50%'	
				});
			</script>
         </td>
<td>
<a href='mailto:mkg-concept@gmail.com?subject=nous somme mkg concept&cc=<?php echo $row["mail"];?>&body=mkg vous infomre qu"il faut... '><img src="images/envelope_off.png" width="16"  title="envoyer un message a <?php echo $row["nom"].' '.$row["prenom"];?>"/></a></td>		
      </tr>
      <?php    
		}
	  ?>
    </tbody>
  </table>
</div>
			<?php
				$req1= "SELECT* FROM `utilisateur`";
				try 
				{
				$Resulats = $Mysql->TabResSQL($req1);
				}
				catch (Erreur $e)
				{
				echo $e -> RetourneErreur();
				}
				foreach($Resulats as $row)
				{
			?>
<div id="sup" style="display:none"  >
<form id="form-sup-<?php echo $row["id_utilisateur"];?>" style="width:300px;" method="post"action="" class="notification note-error">
            <center>
              Voulez vous supprimer cet utilisateur ? <br />
              <br />
              <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
              <input type="hidden" name="idu" value="<?php echo $row["id_utilisateur"];?>"/>
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
$req="delete  from utilisateur  WHERE `id_utilisateur` =".$_POST['idu'];
	try 
		{
		$Resulats = $Mysql->ExecuteSQL($req);
		}
	catch (Erreur $e)
	 	{
		echo $e -> RetourneErreur();
		}
//header("location:index.php?page=gerer-utilisateurs");
}
?>
