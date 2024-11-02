<div class="notification note-success">
<a href="#" class="close" title="Close notification">close</a>
<p><strong><?php
           $id=$_SESSION["id_utilisateur"];
	
                 
									  $req2= "SELECT* FROM projet where realiser='$id'  AND etat !='Fini'";
											try {
												$Resulatscomp = $Mysql->TabResSQL($req2);
												 }
											catch (Erreur $e) {
												echo $e -> RetourneErreur();
												 }
						
											$nbprojet= count($Resulatscomp);
									
										 echo $nbprojet
            ?> Projet non fini : </br>         
			
            </strong> Pour plus de d&eacute;tails, consulter votre profil </p>
	</div>
