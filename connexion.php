<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Espace de Fidélisation</title>
		<link rel="stylesheet" href="insertion/css/validationEngine.jquery.css" 
		type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="insertion/css/template.css" type="text/css"
		 media="screen" title="no title" charset="utf-8" />
		<script src="insertion/js/jquery.js" type="text/javascript"></script>
		<script src="insertion/js/jquery.validationEngine-fr.js" type="text/javascript"></script>
		<script src="insertion/js/jquery.validationEngine.js" type="text/javascript"></script>
	</head>
	<body>
		<form id="formID" name="formID" class="formular" method="post" action="">
		<fieldset>
		<table>
		<tr>
		<td>
		<label> <span>Code carte: </span>
		<input class="validate[required] text-input" type="text" name="code" id="code" style="width:200px" />
		</label>
		</td>
		</tr>
		</table>
		</fieldset>
		<input class="submit" type="submit" name="submit" value="Valider" />
		</form>
		<?php
			require("connect.php");
			if(isset($_POST['submit']))
			{ 
			$id=$_POST["code"];
			$req="SELECT *
			FROM `compte`
			WHERE `code` = '$id' ";
		$con=mysqli_connect('127.0.0.1', 'root', '',"crm");
		$resultat=mysqli_query($con,$req) or die(mysql_error());
			$n=mysqli_num_rows($resultat);
			
			if($n!=0)
			{
			session_start();
			$ligne = mysqli_fetch_array($resultat);
			$_SESSION["code"] = $ligne["code"];
			$_SESSION["id_compte"] = $ligne["id_compte"];
			}
			else
			{
		?>
		<script language="javascript">
			parent.$.fancybox.close();
		</script>
		<?php
		}
		}
		
		if(!session_id()) {
			session_start();
		}
		$req1= "SELECT* FROM `compte` where `id_compte`=".$_SESSION["id_compte"];
		try {
		$Resulats = $Mysql->TabResSQL($req1);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $row) 
		{
		?>
		<form id="form1" name="form1"class="formular" method="post" action="">
		<fieldset>
		<table 
		<?php if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{
		?>style="background-image:url(upload_image/files/<?php   echo $row["image"];  ?>)"<?php
		}
		?> 
        >
		<tr>
		<td height="40" style="color:#480000 ;  font: bold italic large Palatino, serif ; ">
		<img src="images/carte/barre.jpg" width="120" height="48" /></td>
		<?php if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{
		?>
		<td width="55" height="40" style=" font: bold italic large Palatino, serif; ">
		<?php   echo $row["compte"];  ?></td>
		<?php
		}
		else
		{
		?>
		<td width="75" height="40" style=" font: bold italic large Palatino, serif; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<?php 
		}
		?>
		</tr>
		<tr>
		<?php if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{
		?>
		<td width="231" height="40" style=" font: bold italic large Palatino, serif;
		 " valign="top">
		<?php echo $row["code"];?></td>
		<?php
		}
		else
		{
		?>
		<td width="55" height="40" style=" font: bold italic large Palatino, serif; " 
		valign="top">!!!</td>
		<?php }?>
		</tr>
		<tr>
		<td height="40" style=" font: bold italic large Palatino, serif; " valign="top">
		Carte de fidélité</td>
		</tr>
		<tr>
		<?php if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{ ?>
		<td height="40" style=" font: bold italic large Palatino, serif; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expiré le:</td>
		<td height="40" style=" font: bold italic large Palatino, serif; ">
		<?php echo"". strftime("%d/%m/20%y ",time()+$row["date_validite"]*24*3600)."<br>";
		?></td>
		<?php
		}
		else
		{
		?>
		<td height="40" style=" font: bold italic large Palatino, serif; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expiré le:</td>
		<td height="40" style=" font: bold italic large Palatino, serif; ">!!!!!!!!</td>
		<?php }?>
		</table>
		</td>
		</tr>
		</table>
		</fieldset>
		</form>
		<form action="" method="post" class="formular" id="form2" name="form2" >
		<fieldset>
		<table >
		</tr>
		<?php if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{ ?>
		<tr>
		<td height="70" width="140" style="color:#906810; font: bold italic large Palatino, serif; ">Bonus:</td>
		<td height="40" style="color:#906810; font: bold italic large Palatino, serif; ">
		<?php   echo $row["bonus"];  ?></td>
		<?php
		}
		else
		{
		?>
		<tr><td height="40" style="color:#906810; font: bold italic large Palatino, serif; ">Bonus:</td>
		<td height="40" style="color:#906810; font: bold italic large Palatino, serif; "> !!!!!</td>
		</tr>   <?php }?>
		</table>
		</fieldset>
		</form>
		<?php
		}
		?> 
		<?php if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{ 
		?>
		<form action="" method="post" class="formular" id="form3" name="form3">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<fieldset>
		<table background="images/bonus.jpg">
		<tr><td>Transformer:</td> <td><input type="text" name="nombre" size="10" /> </td><td>points.</td></tr>
		</table>
		</fieldset>
		<input  class="submit" type="submit" name="transformer" value="transformer" />
		</form>
		<?php
		}
		?>
		<?php 
		if((isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{ 
		?>
		<form name="form4" id="form4"class="formular" method="post" action="" >
		<fieldset>
		<table width="356">
		<?php
		$req2= "SELECT* FROM `cadeau`";
		try {
		$Resulats = $Mysql->TabResSQL($req2);
		}
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
		}
		foreach($Resulats as $row)
		{
		?>
		<tr>
		<td width="292" valign="top">
		<?php
		echo $row["min"]; echo("---------->"); echo $row["max"]; echo(":"); echo $row["nom"];
		?>               </td>
		<td width="20" valign="top">
		<?php  
		if($row["min"] <= $_POST['nombre'])
		{
		?>   
		<input type="radio" name="choix" value="<?php  echo $row["nom"]; ?>" /> 
		</td>
		</tr>
		<?php                
		}	
		}
		?>                
		</table>
		</fieldset>
		<input class="submit" type="submit" name="offre" value="Valider L'offre"  />
		</form>
		<?php                
		}	
		?>
		<?php 
		if((isset($_POST['submit']))||(isset($_POST['transformer']))||(isset($_POST['offre']))) 
		{ 
		?>
		<form>
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<!-- 1a) Optional: add a theme file -->
		<script type="text/javascript" src="js/themes/grid.js"></script>
		<script type="text/javascript" src="js/themes/dark-blue.js"></script>
		<script type="text/javascript" src="js/themes/dark-green.js"></script>
		<script type="text/javascript" src="js/themes/grid.js"></script>
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="js/modules/exporting.js"></script>
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		var chart;
		$(document).ready(function() {
		chart = new Highcharts.Chart({
		chart: {
		renderTo: 'container',
		defaultSeriesType: 'spline'
		},
		title: {
		text: '<?php
		$req1= "SELECT* FROM `compte` where `id_compte`=".$_SESSION["id_compte"];
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
		echo $row["compte"];
		}?>'
		},
		subtitle: {
		text: 'CHARTS'
		},
		xAxis: {
		categories: [<?php $req6= "SELECT* FROM historique WHERE id_compte=".$_SESSION["id_compte"];
			try {
				$Resulats6 = $Mysql->TabResSQL($req6);
				}
				catch (Erreur $e) {
				echo $e -> RetourneErreur();
				}
				foreach($Resulats6 as $row6)
			    {?>'<?php echo $row6["date"];?>',<?php } ?>]
			},
		yAxis: {
		title: {
		text: 'CRM'
		},
		labels: {
		formatter: function() {
		return this.value +''
		}
		}
		},
		tooltip: {
		crosshairs: true,
		shared: true
		},
		plotOptions: {
		spline: {
		marker: {
		radius: 4,
		lineColor: '#666666',
		lineWidth: 1
		}
		}
		},
		series: [{
		name: 'Bonus',
		marker: {
		symbol: 'square'
		},
		data: [<?php $s=0;$i=0; foreach($Resulats6 as $row6)
						    {echo $row6["bonus"];?>,<?php $s=$s+$row6["bonus"]; $i++;} ?>{
		y: <?php echo round($s/$i,3);?>,
		}]
		}]
		});
		});
		</script>
		<div id="container" style="width: 750px; height: 210px; margin: 0 auto; float:right;">
		</div>
		</form>
		 <?php 
		}
		if(isset($_POST['offre']))
		{
		$req3= "SELECT* FROM `cadeau`";
		try {
		$Resulats3 = $Mysql->TabResSQL($req3);
		    }
		catch (Erreur $e) {
		echo $e -> RetourneErreur();
					}
		foreach($Resulats3 as $row3)
		{
		if($row3["nom"]==$_POST['choix'])
		{
		$min = $row3["min"];
		}
		}
		$req33= "SELECT* FROM `compte` where `id_compte`=".$_SESSION["id_compte"];
		try 
		{
		$Resulats33 = $Mysql->TabResSQL($req33);
		}
		catch (Erreur $e) 
		{
		echo $e -> RetourneErreur();
		}
		foreach($Resulats33 as $row33)
		{
		$b=$row33['bonus'];
		}	
		$bn=$b-$min;
		$test=false;
		if(($bn>=0)&&($min!=0) )
		{
		$req4= "update compte SET `bonus`='$bn' where `id_compte`=".$_SESSION["id_compte"];
		try 		
		{
		$Resulats4 = $Mysql->ExecuteSQL($req4);
		}
		catch (Erreur $e)   
		{
		echo $e -> RetourneErreur();
		 }
		$compte=$_SESSION["id_compte"];
		$cadeau=$_POST["choix"];
		$date=strftime("%d/%m/20%y %H:%M:%M",time());
		$req5="insert into historique(id_historique,id_compte,bonus,cadeau,date)
		values('','$compte','$min','$cadeau','$date')";
		try                  
		{
		$Resulats5 = $Mysql->ExecuteSQL($req5);
		}
		catch (Erreur $e)   
		{
		echo $e -> RetourneErreur();
		}
		}
		else
		{   
		}
		}
		?>
	</body>
</html>