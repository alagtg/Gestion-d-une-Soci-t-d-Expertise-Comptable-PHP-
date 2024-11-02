<div class="head pagesize">
<div class="head_top">
<div class="topbuts">
<ul class="clear">

<?php
 
 if (empty(session_id())) {
    session_start(); // if no active session we start a new one
}

$type=$_SESSION["type"];



if($type=="Simple Manager"|| $type=="Manager")
{
?>
<li><a href="index.php?page=configuration" >-----</a></li>
<li> <a href="#">---------</a></li>
<li> <a  href="#" >--------</a></li>

<li><a href="index.php?page=profil">Profil</a></li>

<li><a href="logout.php?id=<?php echo $_SESSION["id_utilisateur"];?>" class="red">Deconnection</a></li>
<?php

}else
{
?>                    	

<li> <a href="index.php?page=gerer-utilisateurs">Utilisateurs</a></li>
<li> <a  href="document/index.php" id="document" target="_blank">Documents</a></li>

<li><a href="index.php?page=profil">Profil</a></li>

<li><a href="logout.php?id=<?php echo $_SESSION["id_utilisateur"];?>" class="red">Déconnextion</a></li>
<?php }?>
</ul>
<?php		
require("logo.php");
?>
</div>

<div class="logo clear">
<!-- /></a><span ><img src="images/logo/lolgoo-removebg-preview_ccexpress.png" /></td>-->
  <!-- Sidebar - Brand -->
  <!--<a class="sidebar-brand d-flex align-items-center justify-content-left" href="index.php?page=chart">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ESPEEDY CONSULTANT <sup></sup></div>
            </a>
 />-->
 <br>
</a><span class="title">ESPEEDY CONSULTANT</span>
</div>
</div>

<?php
require("menutop.php");
?>
</div>
