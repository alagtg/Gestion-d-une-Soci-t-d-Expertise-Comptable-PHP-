

<?php



$req1= "SELECT* FROM `compte` where `id_compte`=".$_GET["id_compte"];
try {
$Resulats = $Mysql->TabResSQL($req1);
}
catch (Erreur $e) {
echo $e -> RetourneErreur();
}
foreach($Resulats as $row) 
{
}
?>

<fieldset>
<table style="background-image:url(../images/carte/<?php   echo $row["image"];  ?>)">
<tr>
<td height="40" style="color:#480000 ;  font: bold italic large Palatino, serif ; "> <img src="images/carte/barre.jpg" width="149" height="48" /></td>

<td width="55" height="40" style="color:#906810; font: bold italic large Palatino, serif; "><?php   echo $row["compte"];  ?></td>


</tr>
<tr>
<td width="231" height="40" style="color:#906810; font: bold italic large Palatino, serif; " valign="top"> <?php echo $row["code"];?></td>


</tr>
<tr>
<td height="40" style="color:#906810; font: bold italic large Palatino, serif; " valign="top">Carte de fidélité</td>
</tr>
<tr>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expiré le:</td>
<td height="40" style="color:#906810; font: bold italic large Palatino, serif; "><?php echo"". strftime("%d/%m/20%y ",time()+210*24*3600)."<br>";

?>
</td>
</table></td>
</tr>
</table>
</fieldset>
</tr>