
# Site de gestion

Voici le projet de site de gestion pour votre entreprise.

Vous aurez accès en tant que technicien au panel admin par l'url : votresite.com/admin/dashboard.php

Vous aurez accès en tant que partenaire au panel partenaire par l'url : votresite.com/partenaire/index.php

Vous aurez accès en tant que structure au panel structure par l'url : votresite.com/structure/index.php

Lorsque vous vous connecterez sur votre url : votresite.com, vous arriverez sur une page de connexion.


Installation du site :

    Creation de la base de donnée:

    Dans votre panneau de gestion de base de donnée, vous allez créer une nouvelle base de donnée, 
    lorsque cette base de donnée est créer, vous allez cliquer sur le bouton importer et vous allez importer
    le fichier sql nommer bdd.sql

    Il vous reste plus qu'a créer votre compte administrateur en ajoutant cette ligne dans l'onglet SQL : 
    
    INSERT INTO `comptes` (`cemail`, `password`, `cid`, `admin`, `partenaire`, `structure`, `isActive`, `firstco`) VALUES
    (`votreemail@email.fr`, `votre mot de passe hasher (1234 = $2y$10$0USQWFCRytpK37JETn93TugxrTaux14XX3y/ydWSVVbp1KWlDXI7q`, `1`, `0`, `1`, `1`, `1`);


    Installation des fichiers : 

    Connectez vous a votre interface, mettez les fichiers sur votre serveur.


    Changement du nom de domaine : 

    Dans les fichier suivants, vous devrez changer les noms de domaines de site_url et mettre le votre :

    config.php
    admin/config.php

    Changement de l'adresse mail : 

    Dans les fichier suivants, vous devrez changer l'email de mail_from et mettre le votre :

    config.php
    admin/config.php

    Changement du nom de l'adresse mail: 

    Dans les fichier suivants, vous devrez changer le nom de votre mail dans mail_name et mettre le votre :

    config.php
    admin/config.php

Vous êtes pret à lancer votre site.

/!\ Attention ce site est en bêta, il peut y avoir des bugs, si vous avez un probleme, contactez moi a l'adresse suivante : maxime.frt@icloud.com.



