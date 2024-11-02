<div id="data-table">
  <h1>Gérer les Comptes</h1>
  <p align="right"><a href="insertion/compte.php" id="gerer-compte" class="button blue size-80"
     title="Ajouter une compte">Ajouter</a></p>
  <table class="style1 datatable">
    <thead>
      <tr>
        <th>N&deg;</th>
        <th>Compte</th>
        <th>Cr&eacute;er par</th>
        <th>Pays</th>
        <th>Ville</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Suivi</th>
	    <th>Mod.</th>
        <th>Sup.</th>
      
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
        <td><?php
			$req3= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["id_utilisateur"];
			try
			{
			$Resulats2 = $Mysql->TabResSQL($req3);
			}
			catch (Erreur $e) {
			echo $e -> RetourneErreur();
			}
			foreach($Resulats2 as $utilisateur)
			{
			echo $utilisateur["nom"];  echo'&nbsp;'; echo $utilisateur["prenom"];
			}
		?>
        </td>
        <td><?php
			$req1= "SELECT* FROM `pays` where id_pays=".$row["id_pays"];
			try {
			$Resulatsp = $Mysql->TabResSQL($req1);
			}
			catch (Erreur $e) {
			echo $e -> RetourneErreur();
			}
			foreach($Resulatsp as $rowp)
			{
			echo $rowp["nom"];
			}
		?>
		</td>
        <td>
		<?php
  
 
echo $row["ville"]; ?>
		</td>
        <td><?php echo $row["mail"];?></td>
        <td><?php echo $row["telephone"];?></td>
        <td><a href="index.php?page=suivi-compte&id=<?php echo $row["id_compte"];?>&nom=<?php echo $row["compte"];?>" title="suivi de compte(<?php echo $row["compte"];?>)"> <img src="images/ico_manage-users_48.png"  width="16" /></a> </td>
      
        <td><a id="modifiercompte<?php echo $row["id_compte"];?>" href="insertion/modif-compte.php?id=<?php echo $row["id_compte"];?>" title="Modification du compte <?php echo $row["compte"];?>"> <img src="images/ico_edit_16.png"  width="16" /></a>
          <script type="text/javascript">
		$("#modifiercompte<?php echo $row["id_compte"];?>").fancybox({
		'width'				: 1100,
		'height'			: 430,
		'type': 'iframe',										
		'onClosed': function(e)
		{
		parent.location.reload(true);
		}
		});
		
		</script>
		</td>
			<td><a id="scompte<?php echo $row["id_compte"];?>" href="#form-sup-compte<?php echo $row["id_compte"];?>" title="Supprimer ce compte"><img src="images/ico_delete_16.png" width="16" /></a>
			<script type="text/javascript">
			$("#scompte<?php echo $row["id_compte"];?>").fancybox({
			'width'             : '50%',
			'height'            : '50%',
			'onClosed'          : function(e)
			{
			parent.location.reload(true);
			}	
			 });
			</script>
			</td>
      </tr>
      <?php    
            }
            ?>
    </tbody>
  </table>
</div>
<?php
	$req2= "SELECT* FROM `compte`";
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
  <form id="form-sup-compte<?php echo $row["id_compte"];?>" style="width:300px;" method="post" action="" class="notification note-error">
    <center>
      Voulez vous supprimer ce compte ? <br />
      <br />
      <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
      <input type="hidden" name="supprimercompte" value="<?php echo $row["id_compte"];?>"/>
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
		$req="delete  from compte  WHERE `id_compte` =".$_POST['supprimercompte'];
		try
		{
		$Resulats = $Mysql->ExecuteSQL($req);
		}
		catch (Erreur $e) 
		{
		echo $e -> RetourneErreur();
		}
	//header("location:index.php?page=gerer-comptes"); jdida
	}
?>
