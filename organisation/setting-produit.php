
<div id="data-table">
  <h1>Produits</h1>
  <p align="right"><a href="insertion/produit.php" id="gerer-produits" class="button blue size-80" title="Ajouter un produit">Ajouter</a></p>
  <table class="style1 datatable">
    <thead>
      <tr>
        <th>Ref </th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Bonnus</th>
        <th></th>
        <th>Sup.</th>
        <th>Mod.</th>
      </tr>
    </thead>
    <tbody>
      <?php
												$req7= "SELECT* FROM `produits`";
													try {
																						$Resulats = $Mysql->TabResSQL($req7);
																					}
																					catch (Erreur $e) {
																						echo $e -> RetourneErreur();
																					}
											foreach($Resulats as $row)
											{
								?>
      <tr>
        <td><?php echo $row["ref"];?></td>
        <td><?php echo $row["nom_produit"];?></td>
        <td><?php echo $row["prix"];?></td>
        <td><?php echo $row["bonnus"];?></td>
        <td></td>
        <td><a id="ville<?php echo $row["ref"];?>" href="#form-sup-produit<?php echo $row["ref"];?>"
					 title="Suppression d'une produit"><img src="images/ico_delete_16.png" width="16" /></a>
          <script type="text/javascript">
														$(document).ready(function(){
														$("#ville<?php echo $row["ref"];?>").fancybox({
														'width': '50%',
														'height': '50%',
															});
															});
											</script>
        </td>
        <td><a id="modifproduit<?php echo $row["ref"];?>" href="insertion/modif-produit.php?id=<?php echo $row["ref"];?>" 
					title="Modification d'une produit"><img src="images/ico_edit_16.png"  width="16" /></a>
        			<script type="text/javascript">
							$("#modifproduit<?php echo $row["ref"];?>").fancybox({
							'width'		    : 650,
							'height'	    : 280,
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
											$req8= "SELECT* FROM `produits`";
											try {
																				$Resulats = $Mysql->TabResSQL($req8);
																			}
																			catch (Erreur $e) {
																				echo $e -> RetourneErreur();
																			}
									foreach($Resulats as $row)
									{
						?>
<div id="sup" style="display:none"  >
  <form id="form-sup-produit<?php echo $row["ref"];?>" style="width:300px;" method="post" action="" 
			class="notification note-error">
    <center>
      Voulez vous supprimer cet produit ? <br />
      <br />
      <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
      <input type="hidden" name="produits" value="<?php echo $row["ref"];?>"/>
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
									
									$req9="delete  from produits  WHERE `ref` =".$_POST['produits'];
								
									try {
																		$Resulats = $Mysql->ExecuteSQL($req9);
																	}
																	catch (Erreur $e) {
																		echo $e -> RetourneErreur();
																	}
																	header("location:index.php?page=produits");
							}
				?>
</div>
