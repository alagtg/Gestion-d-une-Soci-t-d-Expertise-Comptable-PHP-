<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ESPEEDY CONSULTANT - Connexion</title>
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="login-header">
        <div id="commentaire" style="color:#0a0a0b; text-align: center; font-weight: bold">
            Bienvenue sur ESPEEDY CONSULTANT
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-5">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="login" class="text" id="user" placeholder="Identifiant" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="text" id="password" placeholder="Mot de passe" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Se connecter">
                                    </form>

                                    <?php    
                                    if (isset($_POST['submit'])) {
                                        include("connect.php");
                                        $con = mysqli_connect($Serveur, $Identifiant, $Mdp, "crm");

                                        if (!$con) {
                                            die("Échec de la connexion : " . mysqli_connect_error());
                                        }

                                        // Récupération des identifiants
                                        $id = addslashes($_POST["login"]);
                                        $mdp = addslashes($_POST["password"]); // Utilisez md5() si nécessaire

                                        // Préparer la requête
                                        $req = "SELECT * FROM `utilisateur` WHERE `login` = ? AND `password` = ?";
                                        $stmt = mysqli_prepare($con, $req);
                                        mysqli_stmt_bind_param($stmt, "ss", $id, $mdp);
                                        mysqli_stmt_execute($stmt);
                                        $resultat = mysqli_stmt_get_result($stmt);
                                        $n = mysqli_num_rows($resultat);

                                        if ($n != 0) {
                                            session_start();
                                            $ligne = mysqli_fetch_array($resultat);
                                            $_SESSION["id_utilisateur"] = $ligne["id_utilisateur"];
                                            $_SESSION["prenom"] = $ligne["prenom"];
                                            $_SESSION["nom"] = $ligne["nom"];
                                            $_SESSION["duree"] = $ligne["duree_session"];
                                            $_SESSION["type"] = $ligne["type"];
                                            $_SESSION["start"] = time();

                                            // Mise à jour de l'état de l'utilisateur
                                            $updateReq = "UPDATE utilisateur SET `etat` = 'V' WHERE `id_utilisateur` = ?";
                                            $updateStmt = mysqli_prepare($con, $updateReq);
                                            mysqli_stmt_bind_param($updateStmt, "i", $_SESSION["id_utilisateur"]);
                                            mysqli_stmt_execute($updateStmt);

                                            header("Location: index.php");
                                            exit();
                                        } else {
                                            echo "<script type='text/javascript'>document.getElementById('commentaire').innerHTML = 'Identifiant et/ou Mot de passe incorrect';</script>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="login-links">
                    <p><strong>&copy; 2022</strong> Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
