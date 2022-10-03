<?php
header ( ' Content - Type : application / json ' ) ;
$hote = 'localhost';
$nom_bdd = 'u701780604_scmbdd';
$utilisateur = 'u701780604_scm';
$mot_de_passe ='Tipuce57!';

try {
	//On test la connexion à la base de donnée
    $pdo = new PDO('mysql:host='.$hote.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);

} catch(Exception $e) {
	//Si la connexion n'est pas établie, on stop le chargement de la page.
	reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();

}

    $requete = $pdo->prepare("SELECT * FROM partenaires");
    $requete->execute();
    $resultats = $requete->fetchAll();
    
    $retour = $resultats;
	


echo json_encode ( $retour ) ; 

?>