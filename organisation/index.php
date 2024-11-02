

<table>
<tr>
<td><div class="mark_violer ">
<div class="mark_violer">
<div class="box-body">
<div class="box-header clear">
<h2>Opportunit&eacute;s</h2>
</div>
<div class="box-wrap clear">
<?php
$req1= "SELECT* FROM `opportunite`";
try {
$Resulatscomp = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$nbcompte= count($Resulatscomp);

echo'<h1>'; echo $nbcompte;echo'</h1>';
?>
</div>
<!-- end of box-wrap -->
</div>
<!-- end of box-body -->
</div>
<!-- end of content-box -->
</div></td>
<td><div class="mark_red">
<div class="mark_red">
<div class="box-body">
<div class="box-header clear">
<h2>T&acirc;ches</h2>
</div>
<div class="box-wrap clear">
<?php

$req1= "SELECT* FROM `tache`";
try {
$Resulatscont = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$nbcontact= count($Resulatscont);

echo'<h1>'; echo $nbcontact;echo'</h1>';
?>
</div>
<!-- end of box-wrap -->
</div>
<!-- end of box-body -->
</div>
<!-- end of content-box -->
</div></td>
<td><div class="mark_grene	 ">
<div class="mark_grene	 ">
<div class="box-body">
<div class="box-header clear">
<h2>Projets</h2>
</div>
<div class="box-wrap clear">
<?php

$req1= "SELECT* FROM `projet`";
try {
$Resulatsuti = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$nbutilisateur= count($Resulatsuti);
echo'<h1>'; echo $nbutilisateur;echo'</h1>';
?>
</div>
<!-- end of box-wrap -->
</div>
<!-- end of box-body -->
</div>
<!-- end of content-box -->
</div></td>
</tr>
<tr>
<td><div class="mark_blueciel ">
<div class="mark_blueciel ">
<div class="box-body">
<div class="box-header clear">
<h2>Comptes</h2>
</div>
<div class="box-wrap clear">
<?php


$req1= "SELECT* FROM `compte`";
try {
$Resulatscomp = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$nbcompte= count($Resulatscomp);

echo'<h1>'; echo $nbcompte;echo'</h1>';
?>
</div>
<!-- end of box-wrap -->
</div>
<!-- end of box-body -->
</div>
<!-- end of content-box -->
</div></td>
<td><div class="mark_rose ">
<div class="mark_rose ">
<div class="box-body">
<div class="box-header clear">
<h2>Contacts</h2>
</div>
<div class="box-wrap clear">
<?php

$req1= "SELECT* FROM `contact`";
try {
$Resulatscont = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$nbcontact= count($Resulatscont);

echo'<h1>'; echo $nbcontact;echo'</h1>';
?>
</div>
<!-- end of box-wrap -->
</div>
<!-- end of box-body -->
</div>
<!-- end of content-box -->
</div></td>
<td><div class="mark_oranger ">
<div class="mark_oranger ">
<div class="box-body">
<div class="box-header clear">
<h2>Utilisateurs</h2>
</div>
<div class="box-wrap clear">
<?php

$req1= "SELECT* FROM `utilisateur`";
try {
$Resulatsuti = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}

$nbutilisateur= count($Resulatsuti);
echo'<h1>'; echo $nbutilisateur;echo'</h1>';
?>
</div>
<!-- end of box-wrap -->
</div>
<!-- end of box-body -->
</div>
<!-- end of content-box -->
</div></td>
</tr>
</table>
