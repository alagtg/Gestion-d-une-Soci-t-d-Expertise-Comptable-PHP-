<div id="data-table">
  <h1>Entreprise</h1>

					
					
					
						<table class="style1 datatable">
						<thead>
							<tr>
                                <th>Id</th>
								<th>Entreprise</th>
								<th>Adresse</th>
								<th>logo</th>
								<th></th>
                                <th>Sup</th>
                                <th>Modif</th>
							</tr>
						</thead>
						<tbody>
							  <?php

  
  $req4= "SELECT* FROM `entreprise`";
  try {
           $Resulats = $Mysql->TabResSQL($req4);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
							<tr><td><?php echo $row["id_entreprise"];?></td>
								<td><?php echo $row["nom"];?></td>
								<td><?php echo $row["adresse"];?></td>
								<td><img src="./upload_image/files/<?php echo $row["logo"];?>" /></td>
								
								                               
							      <td> </td>
				                                									
   							  
                          <td><a id="s<?php echo $row["id_entreprise"];?>" href="#form-sup-<?php echo $row["id_entreprise"];?>" title="Suppression de l'entreprise"><img src="images/ico_delete_16.png" width="16" /></a>
          <script type="text/javascript">
								
									   $("#s<?php echo $row["id_entreprise"];?>").fancybox({
										'width'				: '50%',
										'height'			: '50%'
																			
											
												
										});

							</script>
        </td><td><a id="modifentreprise<?php echo $row["id_entreprise"];?>" href="insertion/modif-entreprise.php?id=<?php echo $row["id_entreprise"];?>" title="Modification de l'entreprise"><img src="images/ico_edit_16.png"  width="16" /></a>
          <script type="text/javascript">
								
									   $("#modifentreprise<?php echo $row["id_entreprise"];?>").fancybox({
										'width'				: 410,
										'height'			: 440,
										'type'				: 'iframe',
										'onClosed': function(e)
													{
													parent.location.reload(true);
													}							
											
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
  
  
  $req5= "SELECT* FROM `entreprise`";
  try {
           $Resulats = $Mysql->TabResSQL($req5);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
foreach($Resulats as $row)
{
?>
<div id="sup" style="display:none"  >
  <form id="form-sup-<?php echo $row["id_entreprise"];?>" style="width:300px;" method="post" action="" class="notification note-error">
    <center>
      Voulez vous supprimer l'entreprise:<br/> <?php echo $row["nom"];?>? <br />
      <br />
      <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
      <input type="hidden" name="idd" value="<?php echo $row["id_entreprise"];?>"/>
      <input type="submit" id="nom" name="non" value="Non" class="button grey size-30">
      <br />
      &nbsp;
    </center>
  </form>
</div>
<?php } ?>
<?php
 if(isset($_POST['oui']))
 
 {
  $req6="delete  from entreprise WHERE `id_entreprise` =".$_POST['idd'];
  try {
           $Resulats = $Mysql->ExecuteSQL($req6);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
//header("location:index.php?page=entreprise");
}
?>


 

