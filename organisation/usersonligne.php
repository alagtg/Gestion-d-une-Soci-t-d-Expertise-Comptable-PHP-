<div class="content-box bt-space10">
  <div class="box-body">
    <div class="box-header box-slide-head"> <span class="slide-but">open/close</span>
      <h2>utilisateur en ligne</h2>
    </div>
    <div class="box-wrap clear box-slide-body hidden">
      <div class="col1-2 online-user">
     <?php

  $req1= "SELECT* FROM `utilisateur`";
			try {
				$Resulats = $Mysql->TabResSQL($req1);
				}
				catch (Erreur $e)
			   	{
				echo $e -> RetourneErreur();
			  	 }
				foreach($Resulats as $row)
				{

 
  				if($row["etat"]=="V")
		{																								
echo '<img src="images/ball_green_16.png" alt="en ligne" title="en ligne" />';echo $row["nom"]."&nbsp;"; 
 echo $row["prenom"];
echo'</br>';

		}			 
 		 
	}														
?>
	 
     
     
     
      </div>
    </div>
  </div>
</div>
