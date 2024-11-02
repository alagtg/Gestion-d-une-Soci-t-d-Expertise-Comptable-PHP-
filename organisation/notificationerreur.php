
	<div class="notification note-error">
	<a href="#" class="close" title="Close notification">close</a>
	<p><strong> <?php
           $id=$_SESSION["id_utilisateur"];
		
                 
									  $req1= "SELECT* FROM tache where `realiser`='$id' AND `etat`!= 'Fini'";
											try {
												$Resulatscomp = $Mysql->TabResSQL($req1);
												 }
											catch (Erreur $e) {
												echo $e -> RetourneErreur();
												 }
						
											$nbcompte= count($Resulatscomp);
									
										 echo $nbcompte;
            ?> T&acirc;che non fini :</br>        
			
           </strong> Pour plus de d&eacute;tails, consulter votre profil </p>
	</div>
