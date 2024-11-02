<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Imprimer Facture</title>
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" 
		title="no title" charset="utf-8" />
		<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" 
		title="no title" charset="utf-8" />
		<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen"
		 title="no title" charset="utf-8" />
		<link rel="stylesheet" href="../css/jquery.ui.css" type="text/css" media="screen" 
		title="no title" charset="utf-8" />
		<link rel="stylesheet" href="../css/demo_table_jui.css" type="text/css" media="screen"
		 title="no title" charset="utf-8" />
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.datatables.js"></script>
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"
		 media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen"
		 title="no title" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
	</head>
	<body >
		<form>
			<?php
				$fact=$_GET["id"];
				require("../connect.php");
				$req= "SELECT* FROM `facture` where id_facture=$fact";
				$Resulats = $Mysql->TabResSQL($req);
				foreach($Resulats as $rowf)
				{
				$id_compte=$rowf["id_compte"] ?>
				<img src="../images/logo/lolgoo.png" width="64" align="left"/>
				<p align="right">Djerba <?php echo  date_fr($rowf["date_facture"]);?></p>
				<p align="right"> R&eacute;ferance de Facture:<?php echo $rowf["reference"];?> <br />
				
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
				$req3= "SELECT* FROM `ligne_facture` where id_facture=$fact";
				$Resulats3 = $Mysql->TabResSQL($req3);
			?>
			<div style="float:left;margin-right:32px;width:800px;padding:45px;">
			<div id="data-table">
			<table  class="style1 datatable">
				<thead>
					<tr>
					<th>Réf: </th>
					<th>Désignation:</th>
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
			<p align="left">Arrêté la présente facture à la somme de :</p>
			<?php
				echo ("<p align='right'><br>Total HT :&nbsp;".$rowf["total_ht"]) ;
				echo ("<br>Total TVA :&nbsp;".$rowf["total_tva"]) ;
				echo ("<br><br>Net à payer TTC:&nbsp;".$rowf["prix_totale"]."</p>") ;
				}
			?>
			<p align="center"><A href="javascript:window.print()" title="Imprimer cette facture"
			 class="button grey" 
			>		
			Imprimer</A></p>
			</div>
			</div>
			</div>
		</form>
	</body>
</html>
