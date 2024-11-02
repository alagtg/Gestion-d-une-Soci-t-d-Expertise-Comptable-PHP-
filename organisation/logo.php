<?php
 
 require("./connect.php");
 
 $requet= "SELECT* FROM `entreprise`";
		try {
		$Resulats = $Mysql->TabResSQL($requet);
      //jdida echo "reqbk:::::::::::::::::uet" ;
	   echo "" ;

		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $row) 
		{
?>		
<div class="user clear">
	<img  src="upload_image/files/<?php  echo $row["logo"]; ?>" class="" alt="" />
<?php
}
?>    
	<span class="user-detail">
		<span class="name">Bienvenue <br>			
			<?php 
				//session_start();
				if (empty(session_id())) {
					session_start(); // if no active session we start a new one
				}
				echo $_SESSION["prenom"];  echo'&nbsp;';
				echo $_SESSION["nom"];
			  ?>	
		</span>
	</span>
</div>