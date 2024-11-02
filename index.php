
<?php
session_start();
if($_SESSION["id_utilisateur"])
{
$inactive =$_SESSION["duree"];
$session_life = time() - $_SESSION['start'];
if($session_life > $inactive)
{
$user=$_SESSION["id_utilisateur"];
header("Location:logout.php?id=$user");
}
?>
<?php
if(isset($_GET["page"]))
{
$page=$_GET["page"];
switch($page)
{
case "gerer-comptes":
$titre="Gestion des comptes";
$_SESSION['start']=time();
$fichier="organisation/compte.php";
break;
case "gerer-taches":
$titre="Gestion des t&acirc;ches";
$fichier="organisation/tache.php";
$_SESSION['start']=time();	  
break;

case "gerer-documents":
$titre="Gestion des documents";
$fichier="organisation/doc.php";
$_SESSION['start']=time();	  
break;
case "gerer-projets":
$titre="Gestion des projets";
$fichier="organisation/projet.php";
$_SESSION['start']=time();	
break;
case "gerer-opportunites":
$titre="Gestion des opportunit&eacute;es";
$fichier="organisation/opportuinite.php";
$_SESSION['start']=time();	
break;
case "demande-congée":
    $titre="demande de congée";
    $fichier="organisation/demande.php";
    $_SESSION['start']=time();	
    break;
case "suivi-compte":
$titre="suivi de compte";
$fichier="organisation/suivi-compte.php";
$_SESSION['start']=time();	
break;
case "suivi-utilisateur":
$titre="suivi de utilisateur";
$fichier="organisation/suivi-utilisateur.php";
$_SESSION['start']=time();	
break;
case "gerer-fatures":
$titre="Gestion des factures";
$fichier="organisation/facture.php";
$_SESSION['start']=time();	
break;
case "gerer-devis":
$titre="Gestion des devis";
$fichier="organisation/devis.php";
$_SESSION['start']=time();	
break;	
case "gerer-avoirs":
$titre="Gestion des avoirs";
$fichier="organisation/avoir.php";
$_SESSION['start']=time();	
break;	

case "gerer-contacts":
$titre="Gestion des contacts";
$fichier="organisation/contact.php";
$_SESSION['start']=time();	
break;	

case "configuration":

$titre="Configuration";
$fichier="organisation/setting.php";
$_SESSION['start']=time();	
break;
case "gerer-utilisateurs":
$titre="Gestion des utilisateurs";
$fichier="organisation/utilisateur.php";
$_SESSION['start']=time();	
break;
//pout gere la compte//





// pour gerer les taches lier de projet
case "taches-projet":
$titre="Taches - Projet";
$fichier="organisation/liste-tache-projet.php";
$_SESSION['start']=time();	
break;
case "taches-projet-utilisateur":
$titre="Taches - Projet - Utilisateur";
$fichier="organisation/liste-tache-projet-utilisateur.php";
$_SESSION['start']=time();	
break;
case "taches-projet-profil":
$titre="Taches - Projet - Profil";
$fichier="organisation/liste-tache-projet-Profil.php";
$_SESSION['start']=time();	
break;
case "taches-projet-compte":
$titre="Taches - Projet - Compte";
$fichier="organisation/liste-tache-projet-compte.php";
$_SESSION['start']=time();	
break;
// pour gere les villes lier de pays
case "pays":
$titre="Liste des pays";
$fichier="organisation/setting.php";
$_SESSION['start']=time();	
break;
case "entreprise":
$titre="Liste des entreprises";
$fichier="organisation/setting.php";
$_SESSION['start']=time();	
break;
case "en-ligne":
    $titre="Liste des en-ligne";
    $fichier="insertion/en-ligne.php";
    $_SESSION['start']=time();	
    break;
case "produits":
$titre="Liste des produits";
$fichier="cd";
$_SESSION['start']=time();	
break;

case "creer-facture":
$titre="Gestion des factures ";
$fichier="insertion/ajout-facture.php";
$_SESSION['start']=time();	
break;
case "creer-devis":
$titre="Gestion des devis";
$fichier="insertion/ajout-devis.php";
$_SESSION['start']=time();	
break;
case "creer-avoir":
$titre="Gestion des avoirs";
$fichier="insertion/ajout-avoir.php";
$_SESSION['start']=time();	
break;
case "profil":
$titre="Gestion de profil";
$fichier="organisation/profil.php";
$_SESSION['start']=time();	
break;	 


//a contenir pour les autre page

/// to be contuned

default:
$titre="Tableau de bord";
$fichier="organisation/index.php";
$_SESSION['start']=time();		
}
}
else
{
$page="chart";
$titre="Tableau de bord";
$fichier="organisation/index.php";
}  

?>								

<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<?php require("organisation/meta.php"); ?>

<title>ESPEEDY CONSULTANT <?php echo $titre; ?></title>

<?php 

 require("organisation/style.php"); 
require("organisation/scripts.php");
?>
</head>
<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
           <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=chart">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ESPEEDY CONSULTANT <sup></sup></div>
            </a>-->
            
            </a><span ><img src="images/logo/lolgoo-removebg-preview_ccexpress.png" /></td>

            </a><span >
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=chart">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><?php 
  echo "La date d'aujourd'hui :" . "<br>"; 
    
  echo date("d/m/Y") . "<br>"; 
 
?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="index.php?page=chart">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Statistiques</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="index.php?page=gerer-comptes">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Comptes</span></a>
                  
            </li>
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Activit&eacute;s</span>
                </a>
                      <div class="bg-white py-2 collapse-inner rounded" style="background-color: #4268d6!important;">       
                           <a class="collapse-item" style="color: white;text-decoration: none; white-space: nowrap; font-size: 107%;" href="index.php?page=gerer-opportunites">1- Opportunit&eacute;s</a>
                  </div>
                  <div class="bg-white py-2 collapse-inner rounded" style="background-color: #4268d6!important;">       
                           <a class="collapse-item" style="color: white;text-decoration: none; white-space: nowrap; font-size: 107%;"  href="index.php?page=gerer-projets">2- Projets</a>
                  </div>
                  <div class="bg-white py-2 collapse-inner rounded" style="background-color: #4268d680!important;">       
                           <a class="collapse-item" style="color: white;text-decoration: none; white-space: nowrap; font-size: 107%;" href="index.php?page=gerer-taches">3- T&acirc;ches</a>
                  </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Services Commerciaux</span></a>
                    <div class="bg-white py-2 collapse-inner rounded" style="background-color: #3a60d0!important;">       
                           <a class="collapse-item" style="color: white;text-decoration: none; white-space: nowrap; font-size: 107%;" href="index.php?page=gerer-fatures">1- Factures</a>
                  </div>
                  <div class="bg-white py-2 collapse-inner rounded" style="background-color: #3a60d0!important;">       
                           <a class="collapse-item" style="color: white;text-decoration: none; white-space: nowrap; font-size: 107%;"  href="index.php?page=gerer-devis">2- Devis</a>
                  </div>
               <!--    <div class="bg-white py-2 collapse-inner rounded" style="background-color: #3a60d0!important;">       
                           <a class="collapse-item" style="color: white;text-decoration: none; white-space: nowrap; font-size: 107%;" href="index.php?page=gerer-avoirs">3- Avoirs</a>
                  </div>-->
                
                  <li class="nav-item">
                <a class="nav-link"  href="index.php?page=demande-congée">
                    <i class="fas fa-fw fa-table"></i>
                    <span>demande de congé</span></a>

            
        <!-- <li class="nav-item">
                <a class="nav-link"  href="chat/chat-index.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Espace chat</span></a>
            </li> -->
            
            <li class="nav-item">
                <a class="nav-link"  href="chat/chat-index.php" id="chat" target="_blank">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Espace chat</span></a>
            </li>
            
      

            <!-- Divider -->
            <hr class="sidebar-divider">

         

          

            

           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

           
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
-->

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

<div class="pagetop" style="
    /* background-color: #4e73df; */
    background-color: #4e73df;
    background-image: linear-gradient(136deg,#4e73df 10%,#224abe 100%);
    background-size: cover;
    "
>
<?php require("organisation/header.php"); ?>
</div>
<!-- *** top menu *** -->
<!-- *** emplasement menu *** -->
<div class="main pagesize">
<!-- *** contenu *** -->
<div class="main-wrap">
<div class="page clear">
<div class="content-box clear">
<?php
require("organisation/carrusel.php");
?>
</div>
<div class="col2-3">
<!-- TABLE -->
<?php

require($fichier);		
?>
</div>
<!-- *** datatabe *** -->
<div class="col1-3 lastcol">
<!-- *** contene rigth *** -->
<?php
require("organisation/usersonligne.php");
require("organisation/notificationerreur.php");
require("organisation/notificationsucser.php");

 //require("organisation/notificationinfo.php");

//require("organisation/notificationatten.php");

//require("organisation/next.php");
//require("organisation/last.php");
?>
<!-- end of content-box -->
<!-- CONTENT BOX - NEXT CLOSED -->
<!-- CONTENT BOX - LAST CLOSED -->
</div>
</div>
</div>
<!-- end of page -->
</div>
<div class="footer">

</div>
</body>
</html>
<?php
}
else
{
header("location:login.php");
}
?>

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
  </footer>
            

        
            