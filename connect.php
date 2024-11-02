<?php

class Erreur  extends Exception {
    
    public function __construct($Msg) {
        parent :: __construct($Msg);
    }
    
    public function RetourneErreur() {
        $msg  = $this->getMessage();
       // $msg .= ' Ligne : ' . $this->getLine() ;
        return $msg;
    }
}

class Mysql
{
	private
		$Serveur     = '',
		$Bdd         = '',
		$Identifiant = '',
		$Mdp         = '',
		$Lien        = '',	
        $con        = '',
		$Debogue     = true,	
		$NbRequetes  = 0;



/**
* Constructeur de la classe
* Connexion aux serveur de base de donnée et sélection de la base
*
* $Serveur     = L'hôte (ordinateur sur lequel Mysql est installé)
* $Bdd         = Le nom de la base de données
* $Identifiant = Le nom d'utilisateur
* $Mdp         = Le mot de passe
*/ 
	public
		function __construct($Serveur = '', $Bdd = '', $Identifiant = '', $Mdp = ' ') 
		{
			$this->Serveur     = $Serveur;
			$this->Bdd         = $Bdd;
			$this->Identifiant = $Identifiant;
			$this->Mdp         = $Mdp;

			$this->Lien=mysqli_connect($this->Serveur, $this->Identifiant, $this->Mdp);
			if (!$this->Lien && $this->Debogue) throw new Erreur ('Erreur de connexion au serveur MySql.');				
				
			$Base = new PDO("mysql:host=$Serveur;dbname=crm", $Identifiant, $Mdp) ;
     		
			//if (!$Base && $this->Debogue) throw new Erreur ('Erreur de connexion à la base de donn&eacute;es.');
		}

/**
* Retourne le nombre de requêtes SQL effectué par l'objet
*/ 		
	public
		function RetourneNbRequetes() 
		{
			return $this->NbRequetes;
		}




/**
* Envoie une requête SQL et récupère le résultât dans un tableau pré formaté
*
* $Requete = Requête SQL
*/ 
	public
		function TabResSQL($Requete)
		{
			$i = 0;
//	mysqli_query('SET NAMES `utf8`');


    $con=mysqli_connect('127.0.0.1', 'root', '',"crm");
    $con -> character_set_name();
    $con -> set_charset("utf8");
    $con -> character_set_name();

			// $Ressource = mysqli_query($con,$Requete);
			$Ressource = $con -> query($Requete);

     		$TabResultat=array();

     		if (!$Ressource and $this->Debogue) throw new Erreur ('');
			while ($Ligne = mysqli_fetch_assoc($Ressource))
			{
				foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
				$i++;
			}

			mysqli_free_result($Ressource);
			
			$this->NbRequetes++;
			
			return $TabResultat;
		}
/**
* Retourne le dernier identifiant généré par un champ de type AUTO_INCREMENT
*
*/ 
	public
		function DernierId()
		{	
			return mysqli_insert_id($this->Lien);
		}
/**
* Envoie une requête SQL et retourne le nombre de table affecté
*
* $Requete = Requête SQL
*/ 
	public
		function ExecuteSQL($Requete)
		{
		//	mysqli_query('SET NAMES `utf8`');
		$con=mysqli_connect('127.0.0.1', 'root', '',"crm");
		$con -> set_charset("utf8");
			// $Ressource = mysqli_query($con,$Requete);
			$Ressource = $con -> query($Requete);

			
			
     		if (!$Ressource and $this->Debogue) throw new Erreur ('Erreur de requête');
			// $con  -> query($Requete) ;
			 $con -> affected_rows;
			$this->NbRequetes++;
			$NbAffectee = $con;
			
			return $NbAffectee;			
		}		
}
?>



<?php
function date_fr($d)
{
$tdt=explode(" ",$d);
$td=explode("-",$tdt[0]);

return $td[2]."/". $td[1]."/". $td[0];

}




 //Instanciation de la classe

try
{
    $Mysql = new Mysql($Serveur = '127.0.0.1', $Bdd = 'crm', $Identifiant = 'root', $Mdp = ''); 
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
} 
$servername = "127.0.0.1";
$username = "root";
$password = "";
/*
try {
  $conn = new PDO("mysql:host=$servername;dbname=crm", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}*/
?>
