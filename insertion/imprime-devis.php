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
<body>
<form >
  <?php
         $devis=$_GET["id"];
		 require("../connect.php");
		 $req= "SELECT* FROM `devis` where id_devis=$devis";
		  $Resulats = $Mysql->TabResSQL($req);
		 foreach($Resulats as $row)
                {
				 
        $id_compte=$row["id_compte"]
    ?>
  <img src="../images/logo/lolgoo.png" width="64" align="left"/>
  <p align="right"> Djerba le <?php echo  date_fr($row["date_devis"]);?><br/>
					R&eacute;ferance:<?php echo $row["reference"];?>
	</p><br/>
  <?php					
	           }	
          $req2= "SELECT* FROM `compte` where id_compte=$id_compte";
		  $Resulats2 = $Mysql->TabResSQL($req2);	
		  foreach($Resulats2 as $row)
		       {
		    ?>
        <p align="left">Compte:&nbsp;<?php echo $row["compte"];?><br/>
						T&eacute;l:&nbsp;<?php echo $row["telephone"];?><br/>
            
						Fax:&nbsp;<?php echo $row["fax"];?><br/>
						E-mail:&nbsp;<?php echo $row["mail"];?>
      </p>
  <p align="center"> l&acute;Aimable Attention de Monsieur:</p>
   <p align="left"> Monsieur,</p>
 
  <p align="left">Suite &agrave; votre demande nous avons le plaisir de vous communiquer notre meilleure offre</p>
  
  <p align="left"> de prix pour l&acute;ensemble des travaux relatifs &agrave; la consultation re&ccedil;ue </p>
  <?php
		  }
		$req3= "SELECT* FROM `ligne_devis` where id_devis=$devis";
		$Resulats3 = $Mysql->TabResSQL($req3);
							?>
  <div style="float:left;margin-right:32px;width:800px;padding:45px;">
    <div id="data-table">
      <table  class="style1 datatable">
        <thead>
          <tr>
            <th>D&eacute;signation:</th>
            <th>Qte:</th>
            <th>Prix U:</th>
            <th>Prix Tot H.T</th>
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
            <td><?php echo $row2["nom_produit"] ?></td>
            <td><?php echo $row["qte"] ?></td>
            <td><?php echo $row2["prix"] ?></td>
            <td><?php echo $row2["prix"]*$row["qte"] ?></td>
          </tr>
          <?php
							}
							}

			?>
      </table>
      <br/>
      <br/>
      <p align="left">Dante l&acute;attente de votre bon de commande, ESPEEDY CONSULTANT; votre enti&egrave;re disposition pour en parler. </p>

      <br/>
      <br/>
      <p align="center"><a href="javascript:window.print()" title="Imprimer ce devis" class="button grey size-30">Imprimer</a></p>
    </div>
  </div>
  </div>
</form>
</body>
</html>
