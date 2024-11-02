<div id="data-table">
    <h1>G&eacuterer les Opportunit&eacutes</h1>
    <p align="right"><a href="insertion/opportunite.php" id="gerer-opportunitee" class="button blue size-80"title="Ajouer une opportunit&eacute;e">Ajouter</a></p>
    <table class="style1 datatable">
        <thead>
            <tr>
                <th>N&deg;</th>
                <th>Etat</th>
                <th>D&eacute;but</th>
                <th>Fin</th>
                <th>Compte</th>
                <th>Cr&eacute;er par</th>
                <th>D&eacute;tails</th>
                <th>Projet</th>
				<th>Doc</th>
                 <th>Mod.</th>
				 <th>Sup.</th>
               
            </tr>
        </thead>
        <tbody>
              <?php
                  
                  
                  $req1= "SELECT* FROM `opportunite`";
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
            <td><?php echo $row["id_opportunite"];?></td>
            <td><?php echo $row["etat"];?></td>
            <td><?php echo $row["debut"];?></td>
            <td><?php echo $row["fin"];?></td>
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
            <td>
                       <?php
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

 echo $utilisateur["prenom"].'&nbsp'.$utilisateur["nom"];
             }
?>
            </td>
            <td>
            <a id="dopportunite<?php echo $row["id_opportunite"];?>" href="#form-detail-<?php echo $row["id_opportunite"];?>" title="d&eacute;tails opportunit&eacute;es"><img src="images/icon-32-new.png" width="16" /></a>
                                      <script type="text/javascript">
                                       
                                                   $("#dopportunite<?php echo $row["id_opportunite"];?>").fancybox({
                                                    'width'			: '80%',
                                                    'height'		: '100%',
                                                    	});						  
            
                                        </script>
            
            
            
            
            
            </td>
            <td>
			<?php
			if($row["convertir"]=="F")
			{
			?>
			
			<a id="popportunite<?php echo $row["id_opportunite"];?>" href="insertion/opportunite-projet.php?id=<?php echo $row["id_opportunite"];?>" class="button grey size-30" title="convertir en projet">Convertir</a>
                                      <script type="text/javascript">
                                       
                                                   $("#popportunite<?php echo $row["id_opportunite"];?>").fancybox({
                                                    'width'			: 400,
                                                    'height'		: 400,
													'type'				: 'iframe',
													'onClosed': function(e)
																 {
													parent.location.reload(true);
				 										   		 }
                                                    	});						  
            
                                        </script>
										<?php
										}
										else
										{?>
								<a  href="#" class="button grie size-30" title="convertir en projet">Projet</a>
										<?php
										}
										?>
             </td>
			 <td><a href="index.php?page=gerer-documents&id=<?php echo $row["id_opportunite"];?>&type=opportunite" > <img src="images/contact.png"  width="16" /></a> </td>
			 
           
 <td><a id="mopportunite<?php echo $row["id_opportunite"];?>" href="insertion/modif-opportunite.php?id=<?php echo $row["id_opportunite"];?>" title="Modifier cette opportunit&eacute;e"> <img src="images/ico_edit_16.png"  width="16" /></a>
                                    <script type="text/javascript">
                                         $("#mopportunite<?php echo $row["id_opportunite"];?>").fancybox({
														'width'				: 750,
														'height'			: 450,
														'type'	    : 'iframe',
														 'onClosed': function(e)
																 {
													parent.location.reload(true);
				 										   		 }												});						  
                                        </script>
										</td>
										 <td><a id="sopportunite<?php echo $row["id_opportunite"];?>" href="#form-sup-<?php echo $row["id_opportunite"];?>" title="Supprimer cette opportunit&eacute;e"> <img src="images/ico_delete_16.png" width="16" /></a>
                                      <script type="text/javascript">
                                       
                                                   $("#sopportunite<?php echo $row["id_opportunite"];?>").fancybox({
                                                    'width'			: '50%',
                                                    'height'		: '50%',
                                                    'onClosed': function(e)
																 {
													parent.location.reload(true);
				 										   		 }												});						  
            
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
          $req1= "SELECT* FROM `opportunite`";
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
          <form id="form-sup-<?php echo $row["id_opportunite"];?>" style="width:300px;" 
          method="post" action="" class="notification note-error">
                <center>
                  Voulez vous supprimer cet opportunite ? <br />
                  <br />
                  <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
                  <input type="hidden" name="idO" value="<?php echo $row["id_opportunite"];?>"/>
                  <input type="submit" id="nom" name="non" value="Non" class="button grey size-30">
                  <br />
                  &nbsp;
                </center>
          </form>
    </div>
    
    
    
    
    <div id="detail" style=" width:auto;display:none" >
<form id="form-detail-<?php echo $row["id_opportunite"];?>"  class="mark_blueciel add-category" >
<table>
<tr><td><font color="red">Descreption:</font></td><td><?php echo $row["description"];?></td><td><font color="red">Etat:</font></td><td><?php echo $row["etat"];?></td></tr>
<tr><td><font color="red">D&eacute;but:</font></td><td><?php echo $row["debut"];?></td><td><font color="red">Fin:</font></td><td><?php echo $row["fin"];?></td></tr>
<tr>
<td><font color="red">CA :</font></td><td><?php echo $row["ca_global"];?></td>

<td><font color="red">Compte:</font></td><td><?php
   
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
<?php echo $rowt["compte"];?><br />
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
	  $req="delete  from opportunite  WHERE `id_opportunite` =".$_POST['idO'];
	 
			  try {
					   $Resulats = $Mysql->ExecuteSQL($req);
					  }
					  catch (Erreur $e) {
					   echo $e -> RetourneErreur();
					  }
			//header("location:index.php?page=gerer-opportunites");
	}
?>
