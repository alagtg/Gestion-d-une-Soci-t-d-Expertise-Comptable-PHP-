<div id="data-table">
  <h1>Gérer les Contacts</h1>
  <p align="right"><a href="insertion/contact.php" id="gerer-contact" class="button blue size-80" title="Ajouter un contact">Ajouter</a></p>
  <table class="style1 datatable">
    <thead>
      <tr>
        <th>N°</th>
        <th>Civilite</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Mail</th>
        <th>Cr&eacute;er par</th>
        <th>Compte</th>
        <th>D&eacute;tails</th>
        <th>Mod.</th>
		<th>Sup.</th>
		<th>Mail.</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
                    
                    $req1= "SELECT* FROM `contact`";
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
        <td><?php echo $row["id_contact"];?></td>
        <td><?php echo $row["civilite"];?></td>
        <td><?php echo $row["nom"];?></td>
        <td><?php echo $row["prenom"];?></td>
        <td><?php echo $row["mail"];?></td>
        <td><?php
  $req3= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["id_utilisateur"];
		try
			 {
				$Resulats3 = $Mysql->TabResSQL($req3);
			 }
		catch (Erreur $e)
			 {
				echo $e -> RetourneErreur();
			 }
		foreach($Resulats3 as $utilisateur)
			 {

 echo $utilisateur["prenom"].'&nbsp;'.$utilisateur["nom"];
             }
?>
				
        </td>
        <td><?php
			  $req2= "SELECT* FROM `compte` where id_compte=".$row["id_compte"];
					try
						 {
							$Resulats1 = $Mysql->TabResSQL($req2);
						 }
					catch (Erreur $e)
						 {
							echo $e -> RetourneErreur();
						 }
					foreach($Resulats1 as $compte)
						 {

			 echo $compte["compte"];
						 }
			?> 
        </td>
        <td><a id="dtache<?php echo $row["id_contact"];?>" href="#form-detail-<?php echo $row["id_contact"];?>"title="details contact"><img src="images/icon-32-new.png" width="16" /></a>
          <script type="text/javascript">
			$("#dtache<?php echo $row["id_contact"];?>").fancybox({
				'width'				: '60%',
				'height'			: '100%',
											 });
          </script>
        </td>
       
        <td><a id="mcontact<?php echo $row["id_contact"];?>" href="insertion/modif-contact.php?id=<?php echo $row["id_contact"];?>" title="Modification du contact  <?php echo $row["nom"].' '.$row["prenom"];?>"> <img src="images/ico_edit_16.png"  width="16" /> </a>
          <script type="text/javascript">
								        $("#mcontact<?php echo $row["id_contact"];?>").fancybox({
										'width'				: 1080,
										'height'			: 370,
										'type'              : 'iframe',								
										'onClosed'          : function(e)
												 {
									parent.location.reload(true);
				 								}											  });
								</script>
        </td>
		 <td><a id="scontact<?php echo $row["id_contact"];?>" href="#form-sup-contact<?php echo $row["id_contact"];?>" title="Supprimer ce contact"><img src="images/ico_delete_16.png" width="16" /></a>
          <script type="text/javascript">
								    $("#scontact<?php echo $row["id_contact"];?>").fancybox({
								      'width'             : '50%',
								      'height'            : '50%',
								      'onClosed'          : function(e)
												 {
									parent.location.reload(true);
				 								}											  });
			  
								</script>
        </td>
		
		<td><a href='mailto:mkg-concept@gmail.com?subject=nous somme mkg concept&cc=<?php echo $row["mail"];?>&body=mkg vous infomre qu"il faut... '> <img src="images/envelope_off.png" width="16"  title="envoyer un message a <?php echo $row["nom"].' '.$row["prenom"];?>"/></a></td>		
      </tr>
      <?php    
                }
                ?>
    </tbody>
  </table>
</div>
<?php
	 $req1= "SELECT* FROM `contact`";
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
<div id="sup" style="display:none"  >
  <form id="form-sup-contact<?php echo $row["id_contact"];?>" style="width:300px;" method="post" action="" class="notification note-error">
    <center>
      Voulez vous supprimer cet contact ? <br />
      <br />
      <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
      <input type="hidden" name="iv" value="<?php echo $row["id_contact"];?>"/>
      <input type="submit" id="nom" name="non" value="Non" class="button grey size-30">
      <br />
      &nbsp;
    </center>
  </form>
</div>
<div id="detail" style="width:700px; display:none" >
  <form id="form-detail-<?php echo $row["id_contact"];?>"  class="mark_blueciel add-category" >
    <table>
      <tr>
        <td><font color="red">Civilit&eacute;:</font></td>
        <td><?php echo $row["civilite"];?></td>
        <td><font color="red">Nom:</font></td>
        <td><?php echo $row["nom"];?></td>
      </tr>
      <tr>
        <td><font color="red">Prenom:</font></td>
        <td><?php echo $row["prenom"];?></td>
        <td><font color="red">Titre:</font></td>
        <td><?php echo $row["titre"];?></td>
      </tr>
      <tr>
        <td><font color="red">T&eacute;l&eacute;phone:</font></td>
        <td><?php echo $row["telephone"];?></td>
        <td><font color="red">Mobile:</font></td>
        <td><?php echo $row["mobile"];?></td>
      </tr>
      <tr>
        <td><font color="red">Fax:</font></td>
        <td><?php echo $row["fax"];?></td>
        <td><font color="red">Email:</font></td>
        <td><?php echo $row["mail"];?>  </td>
      </tr>
      <tr>
        <td><font color="red">Skype:</font></td>
        <td><?php echo $row["skype"];?></td>
        <td><font color="red">Compte:</font></td>
        <td><?php
   
  $req2= "SELECT* FROM `compte`where id_compte=".$row["id_compte"];;
  try {
           $Resulats1 = $Mysql->TabResSQL($req2);
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
	  <tr><td><font color="red">Cr&eacute;er par:</font></td>
			<td><?php
			   
			  $req2= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["id_utilisateur"];
			  try {
					   $Resulats1 = $Mysql->TabResSQL($req2);
					  }
					  catch (Erreur $e) {
					   echo $e -> RetourneErreur();
				}
			foreach($Resulats1 as $rowt)
			{
			?>
			<?php echo $rowt["nom"];?>&nbsp;<?php echo $rowt["prenom"];?>
			<?php } ?></td></tr>
    </table>
  </form>
</div>
<?php 
} 
?>
<?php
	if(isset($_POST['oui']))
	{
		$req="delete  from contact  WHERE `id_contact` =".$_POST['iv'];
		try {
		$Resulats = $Mysql->ExecuteSQL($req);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		//	header("location:index.php?page=configuration");
	}
?>
