<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Imprimer Facture</title>
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="../css/jquery.ui.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="../css/demo_table_jui.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.datatables.js"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
</head>
<body >
<form >
<?php
$avoir=$_GET["id"];
require("../connect.php");
$req= "SELECT* FROM `avoir` where id_avoir=$avoir";
$Resulats = $Mysql->TabResSQL($req);
foreach($Resulats as $rowf)
{
$id_compte=$rowf["id_compte"] ?>
<img src="../images/logo/lolgoo.png" width="64" align="left"/>
<p align="right">Djerba<?php echo date_fr($rowf["date_avoir"]);?></p>
<p align="right"> R&eacute;ferance de Facture:<?php echo $rowf["reference"];?> <br />
Bon de Commande:<?php echo $rowf["bon_commande"];?> <br />
Bon de Livraison:<?php echo $rowf["bon_livraison"];?> </p>
<div style="float:left;">
<?php					
$req2= "SELECT* FROM `compte` where id_compte=$id_compte";
$Resulats2 = $Mysql->TabResSQL($req2);	
foreach($Resulats2 as $row)
{
?>
Compte:&nbsp;<?php echo $row["compte"];?> <br/>
</div>
<?php
}
$req3= "SELECT* FROM `ligne_avoir` where id_avoir=$avoir";
$Resulats3 = $Mysql->TabResSQL($req3);
?>
<div style="float:left;margin-right:32px;width:800px;padding:45px;">
<div id="data-table">
<table  class="style1 datatable">
<thead>
<tr>
<th>R&eacute;f: </th>
<th>D&eacute;signation:</th>
<th>Qte:</th>
<th>TVA:</th>
<th>PT.HT:</th>
</tr>
</thead>
<tbody>
<?php
foreach($Resulats3 as $row)
{
$prod=$row["ref"];
$req4= "SELECT* FROM `produits` where ref=$prod";
$Resulats4 = $Mysql->TabResSQL($req4);
foreach($Resulats4 as $row2)
{
?>
<tr>
<td><?php echo $row2["ref"] ?></td>
<td><?php echo $row2["nom_produit"] ?></td>
<td><?php echo $row["qte"] ?></td>
<td> 18% </td>
<td><?php echo $row2["prix"]*$row["qte"] ?></td>
</tr>
<?php
}
}

?>
</table>
<br/>
<br/>
<p align="left">Arr&acirc;t&eacute; la pr&eacute;sente avoirs à la somme de :</p>
<?php
echo ("<p align='right'><br>Total HT :&nbsp;".$rowf["total_ht"]) ;
echo ("<br>Total TVA :&nbsp;".$rowf["total_tva"]) ;
echo ("<br>Net &agrave; payer TTC:&nbsp;".$rowf["prix_totale"]) ;
echo ("<br><br>Montant remis:&nbsp;".$rowf["remis"]) ;
echo ("<br>Reste &agrave; payer:&nbsp;".$rowf["reste"]."</p>") ;
}?>
<p align="left"><A href="javascript:window.print()" class="button red" >Imprimer</A></p>
</div>
</div>
</div>
</form>
</body>
</html>
