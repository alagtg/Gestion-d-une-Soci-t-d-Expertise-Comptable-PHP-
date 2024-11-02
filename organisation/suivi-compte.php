<a href="index.php?page=gerer-comptes"><img src="images/return.png" title="Retourner" width="32"></a>
<h1>Compte: <?php echo strtoupper($_GET["nom"]);?></h1>
	<?php

		$req1= "SELECT* FROM `compte` where id_compte=".$_GET["id"];
		try {
		$Resulats = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $row)
		{
	?>
	
<table>
	<tr>
	<td>
		<div class="mark_girse">
			<div class="mark_girse">
				<div class="box-body">
					<div class="box-header clear">
						<h2>Infos personnelles</h2>
					</div>
					<div class="" >
					</br><font color="#0099FF">Compte:</font><?php echo $row["compte"];?></br>
					<font color="#0099FF">Adresse:</font><?php echo $row["adresse"];?></br>
					<font color="#0099FF">Pays:</font>
					<?php
						$req3= "SELECT* FROM `pays` where id_pays=". $row["id_pays"];
						try {
						$Resulats = $Mysql->TabResSQL($req3);
						}
						catch (Erreur $e) {
						echo $e -> RetourneErreur();
						}
						foreach($Resulats as $rowp)
						{
						echo $rowp["nom"];
						}
						?>
						</br>
						<font color="#0099FF">Ville:</font>
						<?php echo $row["ville"];?>
						</br>
						<font color="#0099FF">Relation:</font>
						<?php
						$req2= "SELECT* FROM `relation_compte` where id_relation=". $row["id_relation"];
						try {
						$Resulats = $Mysql->TabResSQL($req2);
						}
						catch (Erreur $e) {
						echo $e -> RetourneErreur();
						}
						foreach($Resulats as $rowv)
						{
						echo $rowv["nom"];
						}
						}
					?>
					
					</div>
					<!-- end of box-wrap -->
					</div>
				<!-- end of box-body -->
			</div>
			<!-- end of content-box -->
		</div>
		
	</td>
	<td>
	
		<div class="mark_girse">
		<div class="mark_girse">
		<div class="box-body">
		<div class="box-header clear">
		<h2>Infos de syst&egrave;me</h2>
		</div>
		<div class="box-wrap clear">
		<font color="#0099FF">Date de cr&eacute;ation:</font>
		<?php echo date_fr($row["date_creation"]);?></br>
		<font color="#0099FF">Date dernier modification:</font>
		<?php echo date_fr($row["date_dernier_modif"]);?></br>
		<font color="#0099FF">Cr&eacute;er par:</font>
		<?php
		$req2= "SELECT* FROM `utilisateur` where id_utilisateur=". $row["id_utilisateur"];
		try {
		$Resulats = $Mysql->TabResSQL($req2);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $rowv)
		{echo $rowv["nom"]." ".$rowv["prenom"];}
		?></br>
		</div>
		<!-- end of box-wrap -->
		</div>
		<!-- end of box-body -->
		</div>
		<!-- end of content-box -->
		</div>
	</td>
	<td>
		<div class="mark_girse">
		<div class="mark_girse">
		<div class="box-body">
		<div class="box-header clear">
		<h2>Infos de contact</h2>
		</div>
		<div class="box-wrap clear">
		<font color="#0099FF">Mobile:</font><?php echo $row["mobile"];?></br>
		<font color="#0099FF">T&eacute;l&eacute;phone:</font><?php echo $row["telephone"];?></br>
		<font color="#0099FF">Fax:</font><?php echo $row["fax"];?></br>
		</div>
		<!-- end of box-wrap -->
		</div>
		<!-- end of box-body -->
		</div>
		<!-- end of content-box -->
		</div>
	</td>
	</tr>
	</table>
	<p align="right">	<a id="modifcompte<?php echo $_GET["id"];?>" href="insertion/modif-compte.php?id=<?php echo $_GET["id"];?>" class="button blue size-80" title="Modification de profil" >Modifier</a>
	<script type="text/javascript">
	$("#modifcompte<?php echo $_GET["id"];?>").fancybox({
	'width'				: 1100,
	'height'			: 380,
	'type'				: 'iframe',
	'onClosed': function(e)
	{
	parent.location.reload(true);
	}
	});
	
	</script>
	</p>
	</br>
	<div class="col1-2">
	<!-- OVERVIEW - BASIC TABLE -->
	<h2>Statistiques</h2>
	<table class="basic" cellspacing="0">
	<tbody>
	<tr>
	<td><img src="images/ball_black_16.png" class="block" alt="" /></td>
		<th>Nombre Contact</th>
		<td class="value right">
		<?php
			$req1= "SELECT* FROM `contact` where id_compte=".$_GET["id"];
			try {
			$Resulatscont = $Mysql->TabResSQL($req1);
			}
			catch (Erreur $e) {
			echo $e -> RetourneErreur();
			}
			$nbcontact= count($Resulatscont);
			echo $nbcontact;
		?>
	</td>
	</tr>
	<tr>
	<td><img src="images/ball_green_16.png" class="block" alt="" /></td>
	<th class="full">Nombre opportunite</th>
	<td class="value right">
	<?php
		$req1= "SELECT* FROM `opportunite` where id_compte=".$_GET["id"];
		try {
		$Resulatscomp = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		$nbcompte= count($Resulatscomp);
		
		echo $nbcompte;
	?>
	</td>
	</tr>
	<tr>
	<td><img src="images/ball_yellow_16.png" class="block" alt="" /></td>
	<th>Nombre Projet</th>
	<td class="value right">
	<?php
		$req1= "SELECT* FROM `projet` where id_compte=".$_GET["id"];
		try {
		$Resulatsuti = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		$nbprojet= count($Resulatsuti);
		echo $nbprojet;
	?>
	</td>
	
	</tr>
	<tr>
	<td><img src="images/ball_purple_16.png" class="block" alt="" /></td>
	<th>Nombre T&acirc;che</th>
	<td class="value right">
	<?php
		$req1= "SELECT* FROM `tache` where id_compte=".$_GET["id"];
		try {
		$Resulatscont = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		$nbcontact= count($Resulatscont);
		
		echo $nbcontact;
	?>
	
	</td>
	</tr>
	<tr>
	<td><img src="images/ball_blue_16.png" class="block" alt="" /></td>
	<th>Nombre Facture</th>
	<td class="value right">
	<?php
		$req1= "SELECT* FROM `facture` where id_compte=".$_GET["id"];
		try {
		$Resulatscont = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		
		$nbfacture= count($Resulatscont);
		echo $nbfacture;
	?>
	</td>
	
	</tr>
	<tr>
	<td><img src="images/ball_red_16.png" class="block" alt="" /></td>
	<th>Nombre Devis</th>
	<td class="value right">
	<?php
		$req1= "SELECT* FROM `devis` where id_compte=".$_GET["id"];
		try {
		$Resulatscont = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		$nbdevis= count($Resulatscont);
		echo $nbdevis;
	?>
	</td>
	</tr>
	<tr>
	<td><img src="images/ball_grie_16.png" class="block" alt="" /></td>
	<th>Nombre demande de congé</th>
	<td class="value right">
	<?php
		$req1= "SELECT* FROM `avoir` where id_compte=".$_GET["id"];
		try {
		$Resulatscont = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		$nbavoir= count($Resulatscont);
		
		echo $nbavoir;
	?>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	</br></br></br></br></br></br></br></br></br></br></br></br></br>
	</br></br>			
	
	<div class="box-wrap clear" >
	<table class="style1">
	<tbody>
		<tr class="box-slide-head">
			<td></td>
			<td><h2>Les Contacts de <?php echo $_GET["nom"];?> </h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
			</tr>
			<tr>
			<td colspan="4" class="box-slide-body ln-normal">
			<?php require("organisation/liste-contact-compte.php");?>
			</td>
			</tr>
			<tr class="box-slide-head">
			<td></td>
			<td><h2>Les Oppotuniters de <?php echo $_GET["nom"];?></h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
		</tr>
		<tr>
			<td colspan="4" class="box-slide-body hidden ln-normal">
			<?php require("organisation/liste-opportuinite-compte.php");?>
			</td>
			</tr>
			<tr class="box-slide-head">
			<td></td>
			<td><h2>Les Projets de <?php echo $_GET["nom"];?></h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
		</tr>
		<tr>
			<td colspan="4" class="box-slide-body hidden ln-normal">
			<?php require("organisation/liste-projet-compte.php");?>
			</td>
		</tr>
		<tr class="box-slide-head">
			<td></td>
			<td><h2>Les T&acirc;ches de <?php echo $_GET["nom"];?></h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
		</tr>
		<tr>
			<td colspan="4" class="box-slide-body hidden ln-normal">
			<?php require("organisation/liste-tache-compte.php");?>
			</td>
		</tr>
		<tr class="box-slide-head">
			<td></td>
			<td><h2>Les Facture de <?php echo $_GET["nom"];?></h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
		</tr>
		<tr>
			<td colspan="4" class="box-slide-body hidden ln-normal">
			<?php require("organisation/liste-facture-compte.php");?>
			</td>
		</tr>
		<tr class="box-slide-head">
			<td></td>
			<td><h2>Les Devis de <?php echo $_GET["nom"];?></h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
		</tr>
		<tr>
			<td colspan="4" class="box-slide-body hidden ln-normal">
			<?php require("organisation/liste-devis-compte.php");?>
			</td>
		</tr>
		<tr class="box-slide-head">
			<td></td>
			<td><h2>Les demande de congé de <?php echo $_GET["nom"];?></h2>
			<p class="description">&nbsp;</p></td>
			<td class="vcenter slide-but"><span>Plus</span></td>
		</tr>
		<tr>
			<td colspan="4" class="box-slide-body hidden ln-normal">
			<?php require("organisation/liste-demande-compte.php");?>
			</td>
		</tr>
	</tbody>
</table>
</div>
