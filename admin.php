<?php
session_start();
if (isset($_SESSION['connect']) && ($_SESSION['account_admin']))//On vérifie que le variable existe.
{
        $connect=$_SESSION['connect'];//On récupère la valeur de la variable de session.
        $partenaire=$_SESSION['account_admin'];
}
else
{
        $connect=0;//Si $_SESSION['connect'] n'existe pas, on donne la valeur "0".
        $partenaire=0;
}
       
if ($connect == "1" && $partenaire == "1") // Si le visiteur s'est identifié.
{
// On affiche la page cachée.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
<title>Site super</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 
   <!-- Lien vers la favicon -->               
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
   <!-- Ci-dessous le design "par défaut" du site -->
<link rel="stylesheet" media="screen" type="text/css" title="design" href="design_par_defaut.css" />
   </head>
 
   <body>
       <div id="en_tete">           
       </div>
          
        <div id="menus">
        </div>
 
       <!-- Le corps -->
 
       <div id="corps">
 
 
<h1>Admin</h1>
<p>Que du blabla sur mon site</p>
 
       </div>
 
       <!-- Le pied de page -->
 
       <div id="pied_de_page">
           
       </div>
 
   </body>
</html>

<?php
}
 
else // Le mot de passe n'est pas bon.
{ 
    header('Location: https://'.site_url.'/');
    exit;
} // Fin du else.
 
// Fin du code. :)
?>