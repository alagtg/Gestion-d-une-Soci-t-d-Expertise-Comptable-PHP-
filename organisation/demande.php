<div id="data-table">
<h1>G&eacute;rer les demandes de congé</h1>
<p align="right"><a href="insertion/demande.php" id="gerer-projet" class="button blue size-80" title="Ajouter une demande">Ajouter</a></p>

  <table class="style1 datatable">
    <thead>
      <tr>
        <th>N&deg;</th>
        <th>Etat</th>
          <th>Projet</th>
        <th>D&eacute;but</th>
        <th>Fin</th>
        <th>Affect&eacute; par</th>
        <th>R&eacute;alis&eacute; par</th>
        <th>Compte</th>
		 <th>D&eacute;tails</th>
        <th>Mod.</th>
		<th>Sup.</th>
      </tr>
    </thead>
        <tbody>
    <?php

      $req1= "SELECT* FROM `ligne`";
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
                    <td><?php echo $row["id_projet"];?></td>
                    <td><?php echo $row["etat"];?></td>
                    <td><?php echo $row["nom"];?></td>
                    <td><?php echo $row["debut"];?></td>
                    <td><?php echo $row["echeance"];?></td>
                     <td><?php
  $req2= "SELECT* FROM `utilisateur` where id_utilisateur=".$row["creer"];
		try
			 {
				$Resulats3 = $Mysql->TabResSQL($req2);
			 }
		catch (Erreur $e)
			 {
				echo $e -> RetourneErreur();
			 }
		foreach($Resulats3 as $utilisateur)
			 {

 echo $utilisateur["prenom"].'&nbsp'.$utilisateur["nom"];
             }
					?></td>
					<td><?php
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
					?></td>
					<td><?php
  $req4= "SELECT* FROM `compte` where id_compte=".$row["id_compte"];
		try
			 {
				$Resulats1 = $Mysql->TabResSQL($req4);
			 }
		catch (Erreur $e)
			 {
				echo $e -> RetourneErreur();
			 }
		foreach($Resulats1 as $compte)
			 {

 echo $compte["compte"];
             }
					?></td>
					<td><a id="dprojet<?php echo $row["id_projet"];?>" href="#form-detail-<?php echo $row["id_projet"];?>" title="details demande"><img src="images/icon-32-new.png" width="16" /></a>
							  <script type="text/javascript">
									$("#dprojet<?php echo $row["id_projet"];?>").fancybox({
										'width'				: '60%',
										'height'			: '100%',
																						 });
								  </script></td>
								  

								  
				<td><a id="mprojet<?php echo $row["id_projet"];?>" href="insertion/modif-demande.php?id=<?php echo $row["id_projet"];?>" title="Modifier ce demande " > <img src="images/ico_edit_16.png"  width="16" /></a>
							  <script type="text/javascript">
                                 $("#mprojet<?php echo $row["id_projet"];?>").fancybox({
                                     'width'  : '63%',
                                     'height': '80%',
                                     'type'  : 'iframe', 		
									 'onClosed': function(e)
												 {
									parent.location.reload(true);
				 								}									   });
                                </script>
            	</td>				  
								  
								  
                   <td><a id="sprojet<?php echo $row["id_projet"];?>" href="#form-sup-<?php echo $row["id_projet"];?>" title=		"Supprimer ce projet" > <img src="images/ico_delete_16.png" width="16" /></a>
								<script type="text/javascript">
                                        $("#sprojet<?php echo $row["id_projet"];?>").fancybox({
                                            'width'	: '50%',
                                            'height': '50%',	
                                            'onClosed': function(e)
                                                     {
                                        parent.location.reload(true);
                                                    }									   });
                                    
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
	  $req6= "SELECT* FROM `ligne`";
	  try {
			 $Resulats = $Mysql->TabResSQL($req6);
			  }
			 catch (Erreur $e) {
			 echo $e -> RetourneErreur();
			 }
	    foreach($Resulats as $row)
		{
	?>
<div id="sup" style="display:none"  >
                  <form id="form-sup-<?php echo $row["id_projet"];?>" style="width:300px;" method="post" action="" class="notification note-error"><center>
               Voulez vous supprimer ce demande ? <br /><br />
                              <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
                              <input type="hidden" name="idu" value="<?php echo $row["id_projet"];?>"/>
                              <input type="submit" id="nom" name="non" value="Non" class="button grey size-30"><br /></center>
  				</form>
</div>

<div id="detail" style="width:400px; display:none" >
<form id="form-detail-<?php echo $row["id_projet"];?>"   class="mark_blueciel add-category" >
<table>
<tr><td><font color="#E80000">demande:</font></td><td><?php echo $row["description"];?></td><td><font color="#E80000">Etat:</font></td><td><?php echo $row["etat"];?> </td></tr>
<tr><td><font color="#E80000">D&eacute;but</font></td><td><?php echo $row["debut"];?></td><td><font color="#E80000">Ech&eacute;ance:</font></td><td><?php echo $row["echeance"];?></td></tr>
<tr><td><font color="#E80000">Compte:</font></td><td><?php
   
  $req2= "SELECT* FROM `compte` where id_compte=".$row["id_compte"];;
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
<?php } ?></td><td><font color="#E80000">CA :</font></td><td><?php echo $row["ca_global"];?></td>
</td></tr>
<tr> <td><font color="#E80000">Aff&eacute;cter par:</font></td>
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
</tr>

<tr><td><font color="#E80000">
R&eacute;aliser par:</font></td>
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
<?php }?></td></tr>
</table>
</form>
</div>

<?php
}
?>




















<?php
	 if(isset($_POST['oui']))
	 {
		  $req="delete  from ligne  WHERE `id_projet` =".$_POST['idu'];
		 
		  try {
				$Resulats = $Mysql->ExecuteSQL($req);
			 }
				 catch (Erreur $e) {
				  echo $e -> RetourneErreur();
			  }
//	header("location:index.php?page=gerer-projets");jdida
	}
?>
