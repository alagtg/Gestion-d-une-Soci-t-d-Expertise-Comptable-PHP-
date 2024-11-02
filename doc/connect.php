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
		function __construct($Serveur = '', $Bdd = '', $Identifiant = '', $Mdp = ' 	
') 
		{
			$this->Serveur     = $Serveur;
			$this->Bdd         = $Bdd;
			$this->Identifiant = $Identifiant;
			$this->Mdp         = $Mdp;

			$this->Lien=mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp);
     		
			if (!$this->Lien && $this->Debogue) throw new Erreur ('Erreur de connexion au serveur MySql.');				
				
			$Base = mysql_select_db($this->Bdd,$this->Lien);
     		
			if (!$Base && $this->Debogue) throw new Erreur ('Erreur de connexion à la base de donn&eacute;es.');
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
	mysql_query('SET NAMES `utf8`');
			$Ressource = mysql_query($Requete,$this->Lien);
			
     		$TabResultat=array();

     		if (!$Ressource and $this->Debogue) throw new Erreur ('Erreur de requ&ecirc;te. ');
			while ($Ligne = mysql_fetch_assoc($Ressource))
			{
				foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
				$i++;
			}

			mysql_free_result($Ressource);
			
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
			return mysql_insert_id($this->Lien);
		}
/**
* Envoie une requête SQL et retourne le nombre de table affecté
*
* $Requete = Requête SQL
*/ 
	public
		function ExecuteSQL($Requete)
		{
			mysql_query('SET NAMES `utf8`');
			$Ressource = mysql_query($Requete,$this->Lien);
			
     		if (!$Ressource and $this->Debogue) throw new Erreur ('Erreur de requête');
			
			$this->NbRequetes++;
			$NbAffectee = mysql_affected_rows();
			
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
?>
