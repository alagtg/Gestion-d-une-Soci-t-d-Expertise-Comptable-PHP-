<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Ajouter un utilisateur</title>
		<link rel="stylesheet" href="css/validationEngine.jquery.css" 
		type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css"
		 media="screen" title="no title" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
	</head>
	<body>
		<form id="formID" class="formular" method="post" action="">
		  <fieldset>
		  <font color="red">(*)champs Obligatoires</font>
		  <table>
			  <tr>
			  <td valign="top">
			  <label> <span>Nom :<font color="red">*</font> </span>
			  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" 
			  type="text" name="nom" id="nom" style="width:200px" />
			  </label>
			  <label> <span>Pr&eacute;nom :<font color="red">*</font> </span>
			  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input"
			   type="text" name="prenom" id="prenom" style="width:200px" />
			  </label>
			  <label> <span>Adresse:<font color="red">*</font> </span>
			  <textarea class="validate[required,length[6,300]] text-input" name="adresse" 
			  id="adresse" rows="3" cols="3" style="width:200px" > </textarea>
			  </label>
			  <label> <span>Identifiant :<font color="red">*</font> </span>
			  <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" 
			  type="text" name="login" id="login" style="width:200px"  />
			  </label>
			  <label> <span>Mot de passe :<font color="red">*</font> </span>
			  <input class="validate[required,length[6,11]] text-input" type="password"
			   name="passe"  id="passe" style="width:200px" />
			  </label>
			   </td>
					    <td>
					   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    </td>
					    <td valign="top">
			  
			  <label> <span>Email:<font color="red">*</font> </span>
			  <input class="validate[required,custom[email]] text-input" type="text" 
			  name="email" id="email"  style="width:200px" />
			  </label>
			  <label> <span>Skype:<font color="red">*</font> </span>
			  <input class="validate[optional,custom[noSpecialCaracters] text-input" 
			  type="text" name="skype" id="skype" style="width:200px"  />
			  </label>
			  <label> <span>T&eacute;l&eacute;phone :<font color="red">*</font> </span>
			  <input class="validate[required,custom[telephone]] text-input" type="text" 
			  name="telephone"  id="telephone" style="width:200px" />
			  </label>
			  <label> <span>Pays:<font color="red">*</font></span>
			  <select name="pays" id="pays"  class="validate[required]" style="width:200px" >
			    <option value="">Choisissez une pays</option>
				<?php
					require("../connect.php");
					
					$req1= "SELECT* FROM `pays`";
					try {
					$Resulats = $Mysql->TabResSQL($req1);
					}
					catch (Erreur $e) {
					echo $e -> RetourneErreur();
					}
					foreach($Resulats as $row)
					{
				?>
			    <option value="<?php echo $row["id_pays"];?>"><?php echo $row["nom"];?></option>
			    <?php }
				?>
			  </select>
			  </label>
			  <label> <span>Ville:<font color="red">*</font></span>
			    <input class="validate[required,custom[onlyLetter],length[0,100]] text-input" 
			    type="text" name="ville" id="ville" style="width:200px" />
			
			    </label>
			  <label> <span>Type:<font color="red">*</font></span>
			  <select name="type" id="type"  class="validate[required]" style="width:200px"  >
			    <option value="">Choisissez un type</option>
			    <option value="Super Manager">Super Manager</option>
			    <option value="Manager">Manager</option>
			    <option value="Simple Manager">Simple Manager</option>
			  </select>
			  </label>
			  </td>
			  </tr>
		  </table>
		  </fieldset>
		    <input class="submit" type="submit" name="submit" value="Valider" />
		</form>
		<?php
		 if(isset($_POST["submit"]))
		  {
			$nom= addslashes($_POST['nom']);
			$prenom=addslashes($_POST['prenom']);
			$adresse=addslashes($_POST['adresse']);
			$ville=addslashes($_POST['ville']);
			$pays=addslashes($_POST['pays']);
			$type=addslashes($_POST['type']);
			$login=addslashes($_POST['login']);
			$passe=md5(addslashes($_POST['passe']));
			$email=addslashes($_POST['email']);
			$skype=addslashes($_POST['skype']);
			$telephone=addslashes($_POST['telephone']);
			$activation="F";
			$datecreation=date('Y-m-d H:i:s');
			$date_dernier_modif=$datecreation;
			$session=3600;
			$req1= "insert into utilisateur (id_utilisateur,login,password,type,nom,prenom,adresse,telephone,mail,skype,id_pays,ville,activation,date_creation,date_dernier_modif,duree_session)values('','$login','$passe','$type','$nom','$prenom','$adresse','$telephone','$email','$skype','$pays','$ville','$activation','$datecreation','$date_dernier_modif','$session')";
		try {
		$Resulats = $Mysql->ExecuteSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}		
		?>
		<script language="javascript">
			parent.$.fancybox.close();
		</script>
		<?php
		}
		?>
	</body>
</html>
