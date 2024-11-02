<div id="data-table">
    <h1>Les T&acirc;che de projet:&nbsp; <?php echo $_GET["nom"];?></h1> <p><a href="index.php?page=gerer-projets">
    <img src="images/return.png" width="32" /></a></p>	
    <p align="right"> <a id="atache<?php echo $_GET["id"]; ?>" href="insertion/tache-projet.php?id=<?php echo $_GET["id"]; ?>&idc=<?php echo $_GET["idc"]; ?>" class="button blue size-30" title="Ajouter une tache &agrave; <?php echo $_GET["nom"];?>">Ajouter</a>
                               
                                <script type="text/javascript">
                                
                                           $("#atache<?php echo $_GET["id"]; ?>").fancybox({
                                            'width'				: 720,
                                            'height'			: 400,
                                            'type'				: 'iframe',
											'onClosed': function(e)
											 {
												parent.location.reload(true);
											 }									
                                            });
                                              
                                </script></p>
    
                        
                        
   <table class="style1 datatable">
    <thead>
      <tr>
        <th>N&deg;</th>
        <th>Etat</th>
         <th>Affect&eacute; par</th>
        <th>R&eacute;alis&eacute; par</th>
        <th>Compte</th>
		<th>Projet</th>
        <th>D&eacute;tails</th>
		<th>Mod.</th>
		<th>Sup.</th>
        
      </tr>
    </thead>
    <tbody>
<?php
  
  $req1= "SELECT* FROM `tache` where id_projet=".$_GET["id"];
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
      <tr>
        <td><?php echo $row["id_tache"];?></td>
        <td><?php echo $row["etat"];?></td>
        <td>
		 <?php
  $req3= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["creer"];
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
		<?php
		$req3= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["realiser"];
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
<?php
  $req2= "SELECT* FROM `compte` where id_compte=".$row["id_compte"];
		try
			 {
				$Resulats1 = $Mysql->TabResSQL($req2);
			 }
		catch (Erreur $e)
			 {
				echo $e -> RetourneErreur();
			 }
	  if(count($Resulats1)!=0)
	  {
		foreach($Resulats1 as $compte)
			 {

 echo $compte["compte"];
             }
	}
   else
    {
echo'Aucun';
     }
	 ?>
        </td>
				<td><?php
				
  $req1= "SELECT* FROM `projet` where id_projet=".$row["id_projet"];
  try {
           $Resulats2 = $Mysql->TabResSQL($req1);
          }
          catch (Erreur $e) {
           echo $e -> RetourneErreur();
          }
		 if(count( $Resulats2)!=0)
		 {
foreach($Resulats2 as $rowp)
        {
		echo $rowp["nom"];
}
}
else
{
echo'Aucun';
}

             ?> </td>
        <td>
        
        <a id="dtache<?php echo $row["id_tache"];?>" href="#form-detail-<?php echo $row["id_tache"];?>"title="details tache"><img src="images/icon-32-new.png" width="16" /></a>
          <script type="text/javascript">
			$("#dtache<?php echo $row["id_tache"];?>").fancybox({
				'width'				: '60%',
				'height'			: '100%',
											 });
          </script>
        </td>
 <td>
<a id="mtache<?php echo $row["id_tache"];?>" href="insertion/modif-tache.php?id=<?php echo $row["id_tache"];?>"title="Modifier une tache"><img src="images/ico_edit_16.png"  width="16" /></a>
          <script type="text/javascript">
			$("#mtache<?php echo $row["id_tache"];?>").fancybox({
				'width'				: 730,
				'height'			: 430,
				'type'				: 'iframe',
				'onClosed': function(e)
				 {
					parent.location.reload(true);
				 }								
																});
		</script>
		</td>
        <td>
<a id="stache<?php echo $row["id_tache"];?>" href="#form-sup-<?php echo $row["id_tache"];?>"title="Supprimer une tache"><img src="images/ico_delete_16.png" width="16" /></a>
          <script type="text/javascript">
			$("#stache<?php echo $row["id_tache"];?>").fancybox({
				'width'				: '60%',
				'height'			: '100%',

				'onClosed': function(e)
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
	$req1= "SELECT* FROM `tache`";
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
  <form id="form-sup-<?php echo $row["id_tache"];?>" style="width:300px;" method="post" action="" class="notification note-error">
            <center>
              Voulez vous supprimer cette tache ? <br />
              <br />
              <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
              <input type="hidden" name="idt" value="<?php echo $row["id_tache"];?>"/>
              <input type="submit" id="nom" name="non" value="Non" class="button grey size-30">
                          <br />
              &nbsp;
            </center>
  </form>
</div>
<div id="detail" style="width:400px; display:none" >
<form id="form-detail-<?php echo $row["id_tache"];?>"   class="mark_blueciel add-category" >
<table>
<tr><td><font color="red">Etat:</font></td><td><?php echo $row["etat"];?></td><td><font color="red">D&eacute;but:</font></td><td><?php echo $row["debut"];?></td></tr>
<tr><td><font color="red">Fin:</font></td><td><?php echo $row["echeance"];?></td><td><font color="red">T&acirc;che:</font></td><td><?php echo $row["description"];?></td></tr>

<tr><td><font color="red">Priorit&eacute;:</font></td><td><?php echo $row["priorite"];?></td>
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
</td></tr>
<tr><td><font color="red">Affecter:</font></td>
<td><?php
   
  $req2= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["creer"];
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
<?php } ?></td>
<td>
<font color="red">Realis&eacute;:</font></td>
<td>
<?php
   
  $req2= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["realiser"];
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
<?php }?>
</td></tr>
</table>
</form>
</div>


<?php
}
?>





<?php
if(isset($_POST['oui']))
{
$req="delete  from tache  WHERE `id_tache` =".$_POST['idt'];

	  try {
			$Resulats = $Mysql->ExecuteSQL($req);
		  }
	  catch (Erreur $e)
		  {
		  echo $e -> RetourneErreur();
		   }

 }
?>