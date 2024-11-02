<h1>Profil : <?php
 if (empty(session_id())) {
    session_start(); // if no active session we start a new one
}
echo strtoupper($_SESSION["prenom"]." ".$_SESSION["nom"]);?></h1>
<?php
	
	$req1= "SELECT u.id_utilisateur as idu, u.login as loginu, 
	u.type as typeu, u.nom as nomu, 
	u.prenom as prenomu, u.adresse as adru, 
	u.telephone as telu, u.mail as mailu, u.skype as skypeu, 
	u.id_pays as idpu, u.ville as villeu, 
	u.date_creation as dcu, u.date_dernier_modif as ddmu, p.id_pays as idpp,
	p.nom as nomp
	FROM utilisateur u, pays p
	where u.id_pays = p.id_pays and u.id_utilisateur=".$_SESSION["id_utilisateur"]; //echo $req1;
	try {
	$Resulats = $Mysql->TabResSQL($req1);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	foreach($Resulats as $row)
	{
?>

<table>
<tr>
<td>
<div class="mark_girse">
<div class="mark_girse">
<div class="box-body">
<div class="box-header clear">
<h2>Infos Personnelles</h2>
</div>
<div class="box-wrap clear" >
<font color="#0099FF">Utilisateur:</font><?php echo strtoupper($row["nomu"]).' '.$row["prenomu"];?></br>
<font color="#0099FF">Adresse:</font><?php echo $row["adru"];?></br>
<font color="#0099FF">Pays:</font>
<?php echo $row["nomp"];?></br>
<font color="#0099FF">Ville:</font>
<?php echo $row["villeu"];?>
</div>
</div>
</div>
</div>
</td>
<td>
<div class="mark_girse">
<div class="mark_girse">
<div class="box-body">
<div class="box-header clear">
<h2>Infos de Connexion</h2>
</div>
<div class="box-wrap clear">
<font color="#0099FF">Cr&eacute;ation:</font><?php echo date_fr($row["dcu"]);?></br>
<font color="#0099FF">Derni&egrave;re modification:</font><?php echo date_fr($row["ddmu"]);?></br>
<font color="#0099FF">Identifiant:</font><?php echo $row["loginu"];?></br>
<font color="#0099FF">Type:</font><?php echo $row["typeu"];?></br>
</div>
</div>
</div>
</div>
</td>
<td>
<div class="mark_girse">
<div class="mark_girse">
<div class="box-body">
<div class="box-header clear">
<h2>Infos de Contact</h2>
</div>
<div class="box-wrap clear">
<font color="#0099FF">Email:</font><?php echo $row["mailu"];?></br>
<font color="#0099FF">T&eacute;l&eacute;phone:</font><?php echo $row["telu"];?></br>
<font color="#0099FF">Skype:</font><?php echo $row["skypeu"];?></br>
</div>
</div>
</div>
</div>
</td>
</tr>
</table>
<?php
}	
?>
<p align="right"><a id="m<?php echo $_SESSION["id_utilisateur"];?>" href="insertion/modif-utilisateur.php?id=<?php echo $_SESSION["id_utilisateur"];?>" class="button blue size-80" title="Modification de profil" >Modifier</a>

 <a id="mod<?php echo $_SESSION["id_utilisateur"];?>" href="insertion/modif-pass.php?id=<?php echo $_SESSION["id_utilisateur"];?>" class="button red size-80" title="Modification du mot de passe" >Mot de passe</a>
	<script type="text/javascript">
		$("#m<?php echo $_SESSION["id_utilisateur"];?>").fancybox({
		'width'				: '64%',
		'height'			: '84%',
		'type'				: 'iframe',
		'onClosed': function(e)
		{
		parent.location.reload(true);
		}
		});
		
		$("#mod<?php echo $_SESSION["id_utilisateur"];?>").fancybox({
		'width'				: 410,
		'height'			: 230,
		'type'				: 'iframe',
		'onClosed': function(e)
		{
		parent.location.reload(true);
		}
		});
	</script>
</p>
</br>
<div class="col1-2">
<h2>Statistiques</h2>
<table class="basic" cellspacing="0">
<tbody>
<tr>
<td><img src="images/ball_black_16.png" class="block" alt="" /></td>
<th>Nombre de Projets</th>
<td class="value right">
<?php
	$req1= "SELECT* FROM projet where realiser=".$_SESSION["id_utilisateur"];
	try {
	$Resulatscont = $Mysql->TabResSQL($req1);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	$nbprojet= count($Resulatscont);
	echo $nbprojet;
?>
</td>
<td><img src="images/ball_green_16.png" class="block" alt="" /></td>
<th class="full">Nombre de T&acirc;ches</th>
<td class="value right">
<?php
	$req1= "SELECT* FROM tache where realiser=".$_SESSION["id_utilisateur"];
	try {
	$Resulatscomp = $Mysql->TabResSQL($req1);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	$nbtache= count($Resulatscomp);
	echo $nbtache;
?>
</td>
</tr>
<tr>
<td><img src="images/ball_purple_16.png" class="block" alt="" /></td>
<th>Projets en cours</th>
<td class="value right">
<?php
	$req1= "SELECT* FROM projet where etat!= 'Fini' AND realiser=".$_SESSION["id_utilisateur"];
	try {
	$Resulatscont = $Mysql->TabResSQL($req1);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	$nbprojet= count($Resulatscont);
	echo $nbprojet;
?>
</td>
<td><img src="images/ball_yellow_16.png" class="block" alt="" /></td>
<th>T&acirc;ches en cours</th>
<td class="value right">
<?php
	$req1= "SELECT* FROM tache where etat!= 'Fini' AND realiser=".$_SESSION["id_utilisateur"];
	try {
	$Resulatsuti = $Mysql->TabResSQL($req1);
	}
	catch (Erreur $e) {
	echo $e -> RetourneErreur();
	}
	$nbtache= count($Resulatsuti);
	echo $nbtache;
?>
</td>
</tr>
</tbody>
</table>
</div>
</br></br></br></br></br>
</br></br>	
<div class="box-wrap clear">
<table class="style1">
<tbody>
<tr class="box-slide-head">
<td></td>
<td><h2>T&acirc;ches de <?php echo strtoupper($_SESSION["nom"]);?> </h2>
<p class="description">&nbsp;</p></td>
<td class="vcenter slide-but"><span>Plus</span></td>
</tr>
<tr>
<td colspan="4" class="box-slide-body ln-normal">
<div id="data-table">
<table class="style1 datatable">
<thead>
<tr>
<th>N&deg;</th>
<th>Etat</th>
<th>Affect&eacute;e par</th>
<th>R&eacute;alis&eacute;e par</th>
<th>Compte</th>
<th>Projet</th>
<th>D&eacute;tails</th>
<th>Mod.</th>
</tr>
</thead>
<tbody>
<?php
	$req1= "SELECT* FROM tache where realiser=".$_SESSION["id_utilisateur"];
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
	$req3= "SELECT* FROM utilisateur where id_utilisateur=".$row["creer"];
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
	$req3= "SELECT* FROM utilisateur where id_utilisateur=".$row["realiser"];
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
	$req2= "SELECT* FROM compte where id_compte=".$row["id_compte"];
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
<td>
<?php
	$req1= "SELECT* FROM projet where id_projet=".$row["id_projet"];
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
?> 
</td>
<td>
<a id="dtache<?php echo $row["id_tache"];?>" href="#form-detail-<?php echo $row["id_tache"];?>"title="details tache"><img src="images/icon-32-new.png" width="16" /></a>
<script type="text/javascript">
$("#dtache<?php echo $row["id_tache"];?>").fancybox({
'width': '60%',
'height': '100%',
});
</script>
</td>

<td><a id="mtache<?php echo $row["id_tache"];?>" href="#form-modifier-tache-<?php echo $row["id_tache"];?>"title="Modifier l'etat de ce tache"><img src="images/ico_edit_16.png"  width="16" /></a>
	<script type="text/javascript">
		$("#mtache<?php echo $row["id_tache"];?>").fancybox({
		'width'				: '68%',
		'height'			: '70%',
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
	$req1= "SELECT* FROM tache";
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
<form id="form-modifier-tache-<?php echo $row["id_tache"];?>" style="width:300px;" method="post" action="" class="notification note-success">
<center>
Modifier l'&eacute;tat de cette t&agrave;che ? <br />
<br />
<select name="etattache" id="etattache"  style="width:200px" >
	<option value="<?php echo $row["etat"];?>"><?php echo $row["etat"];?></option>
	<option value="Non commenc&eacute;e">Non commenc&eacute;e</option>
	<option value="En cours">En cours</option>
	<option value="Fini">Fini</option>
	<option value="Abandonn&eacute;e">Abandonn&eacute;e</option>
	<option value="Suspendue">Suspendue</option>
</select>
<input type="hidden" name="idt" value="<?php echo $row["id_tache"];?>"/>
<input type="submit" id="validertache" name="validertache" value="val ider"/>
<br />
&nbsp;
</center>
</form>
</div>
<div id="detail" style="width:400px; display:none" >
<form id="form-detail-<?php echo $row["id_tache"];?>"   class="mark_blueciel add-category" >
<table>
<tr><td><font color="red">Etat:</font></td><td><?php echo $row["etat"];?></td>
<td><font color="red">Ech&eacute;ance:</font></td><td><?php echo $row["echeance"];?></td></tr>
<tr><td><font color="red">Priorit&eacute;:</font></td><td><?php echo $row["priorite"];?></td><td><font color="red">T&acirc;che:</font></td><td><?php echo $row["description"];?></td></tr>
<tr>
<td><font color="red">Compte:</font></td><td>
<?php
	$req2= "SELECT* FROM compte where id_compte=".$row["id_compte"];;
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
<tr><td><font color="red">Affect&eacute;e par:</font></td>
<td>
<?php
	$req2= "SELECT* FROM utilisateur where id_utilisateur=".$row["creer"];
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
<td>&nbsp;<font color="red">Realis&eacute;e par:</font></td>
<td>
<?php
	$req2= "SELECT* FROM utilisateur where id_utilisateur=".$row["realiser"];
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
	if(isset($_POST['validertache']))
	{
	$etat=$_POST['etattache'];
	
	$req="update tache SET `etat` = '$etat' WHERE `id_tache` = ".$_POST["idt"];
	
	try {
	$Resulats = $Mysql->ExecuteSQL($req);
	}
	catch (Erreur $e)
	{
	echo $e -> RetourneErreur();
	}
	//header("location:index.php?page=profile");
	}
?>       
</td>
</tr>
<?php 
	$type=$_SESSION["type"];
	if($type!="Simple Manager")
	{
?>
<tr class="box-slide-head">
<td></td>
<td>
<h2>Projets de <?php echo strtoupper($_SESSION["nom"]);?></h2>
<p class="description">&nbsp;</p></td>
<td class="vcenter slide-but"><span>Plus</span></td>
</tr>
<tr>
<td colspan="4" class="box-slide-body hidden ln-normal">
<div id="data-table">
<table class="style1 datatable">
<thead>
	<tr>
		<th>N&deg;</th>
		<th>Etat</th>
		<th>Projet</th>
		<th>D&eacute;but</th>
		<th>Ech&eacute;ance</th>
		<th>Affect&eacute; par</th>
		<th>R&eacute;alis&eacute; par</th>
		<th>Compte</th>
		<th>D&eacute;tails</th>
		<th>T&acirc;che</th>
		<th>Mod.</th>
	</tr>
</thead>
<tbody>
<?php
	$req1= "SELECT* FROM projet where realiser=".$_SESSION["id_utilisateur"];
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
<td>
<?php
	$req2= "SELECT* FROM utilisateur where id_utilisateur=".$row["creer"];
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
?>
</td>
<td>
<?php
	$req3= "SELECT* FROM utilisateur where id_utilisateur=".$row["realiser"];
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
	$req4= "SELECT* FROM compte where id_compte=".$row["id_compte"];
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
?>
</td>
<td><a id="dprojet<?php echo $row["id_projet"];?>" href="#form-detailp-<?php echo $row["id_projet"];?>" title="D&eacute;tails du projet"><img src="images/icon-32-new.png" width="16" /></a>
	<script type="text/javascript">
		$("#dprojet<?php echo $row["id_projet"];?>").fancybox({
		'width': '60%',
		'height': '100%',
		});
	</script>
</td>

<td><a href="index.php?page=taches-projet-profil&id=<?php echo $row["id_projet"];?>&nom=<?php echo $row["nom"];?>&idc=<?php echo $row["id_compte"];?>" > <img src="images/tache.png" title="T&acirc;ches li&eacute;es &agrave; ce projet" width="16" /></a> </td>




<td><a id="mprojet<?php echo $row["id_projet"];?>" href="#form-modifier-projet-<?php echo $row["id_projet"];?>" title="Modifier ce projet" > <img src="images/ico_edit_16.png"  width="16" /></a>
	<script type="text/javascript">
		$("#mprojet<?php echo $row["id_projet"];?>").fancybox({
		'width'  : '63%',
		'height': '80%',
		
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
	$req6= "SELECT* FROM projet";
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
<form id="form-modifier-projet-<?php echo $row["id_projet"];?>" style="width:300px;" method="post" action="" class="notification note-error">
<center>
Modifier l'&eacute;tat de ce  projet ? <br />
<br />
<select name="etatprojet" id="etatprojet"   >
<option value="<?php echo $row["etat"];?>"><?php echo $row["etat"];?></option>
<option value="Planifi&eacute;">Planifi&eacute;</option>
<option value="Provisoire">Provisoire</option>
<option value="Fini">Fini</option>
<option value="Non fini">Non fini</option>
<option value="Abandonn&eacute;">Abandonn&eacute;</option>
</select>
<input type="hidden" name="idp" value="<?php echo $row["id_projet"];?>"/>
<input type="submit" id="validerprojet" name="validerprojet" value="valider" />
<br />
</center>
</form>
</div>

<div id="detailp" style="width:400px; display:none" >
<form id="form-detailp-<?php echo $row["id_projet"];?>"   class="mark_blueciel add-category" >
<table>
<tr><td><font color="#E80000">Projet:</font></td><td><?php echo $row["description"];?></td><td><font color="#E80000">Etat:</font></td><td><?php echo $row["etat"];?> </td></tr>
<tr><td><font color="#E80000">D&eacute;but</font></td><td><?php echo $row["debut"];?></td><td><font color="#E80000">Ech&eacute;ance:</font></td><td><?php echo $row["echeance"];?></td></tr>
<tr><td><font color="#E80000">Compte:</font></td><td>
<?php
	$req2= "SELECT* FROM compte where id_compte=".$row["id_compte"];;
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
<tr> <td><font color="#E80000">Aff&eacute;cter par:</font></td>
<td>
<?php
	$req2= "SELECT* FROM utilisateur where id_utilisateur=".$row["creer"];
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
<?php
 }
?>
</td>
</tr>
<tr><td><font color="#E80000">
R&eacute;aliser par:</font></td>
<td>
<?php
	$req2= "SELECT* FROM utilisateur where id_utilisateur=".$row["realiser"];
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
	if(isset($_POST['validerprojet']))
	{
	$etat=$_POST['etatprojet'];
	
	$req="update projet SET `etat` = '$etat' WHERE `id_projet` = ".$_POST["idp"];
	
	try {
	$Resulats = $Mysql->ExecuteSQL($req);
	}
	catch (Erreur $e)
	{
	echo $e -> RetourneErreur();
	}
	//header("location:index.php?page=profil");
	}
?>
</td>
</tr>
<?php }?>
</tbody>
</table>
</div>