<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_admin']=="1"){
    
    $contents = file_get_contents('mail.txt');

   
   $selected ='emailtemplates';
   $admin_links = '
        <a href="dashboard.php"' . ($selected == 'dashboard' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        <a href="desactivationcompte.php"' . ($selected == 'products' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Désactiver un compte</a>
        <a href="ajoutpartenaire.php"' . ($selected == 'categories' ? ' class="selected"' : '') . '><i class="fas fa-list"></i>Ajouter un partenaire</a>
        <a href="ajoutstructure.php"' . ($selected == 'accounts' ? ' class="selected"' : '') . '><i class="fas fa-users"></i>Ajouter une structure</a>
        <a href="recherchepartenaire.php"' . ($selected == 'shipping' ? ' class="selected"' : '') . '><i class="fas fa-shipping-fast"></i>Rechercher un partenaire</a>
        <a href="recherchestructure.php"' . ($selected == 'discounts' ? ' class="selected"' : '') . '><i class="fas fa-tag"></i>Rechercher une structure</a>
        <a href="emailtemplates.php"' . ($selected == 'emailtemplates' ? ' class="selected"' : '') . '><i class="fas fa-envelope"></i>Email Templates</a>
    ';
if (isset($_POST['contentmail'], $_POST['submit'])) {
    
    $file = fopen("mail.txt", "r+");
    $contents = file_get_contents('mail.txt');
    $contents = $_POST['contentmail'];
    file_put_contents($file, $contents);
    fclose($file);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
	<body class="admin">
        <aside class="responsive-width-100 responsive-hidden">

            <h1>Dashboard</h1>
            <?=$admin_links ?>
        </aside>
        <main class="responsive-width-100">
            <header>
                <a class="responsive-toggle" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <div class="space-between"><center><h1>Template Email</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>

<body>

<section class="py-1 mt-1">
    <div class="container py-1 py-xl-1 mt-1" id="alldata" style="border-radius: 16px;">
<div class="content-block">
    <form action="" method="post">
        <label for="emailtemplate">Email Template:</label>
        <div class="form-outline mb-4">
          <textarea class="form-control" id="textAreaExample6" name="contentmail" rows=26"><?=$contents?></textarea>
        </div>
        
        <input type="submit" value="Save">
    </form>
    
</div>
</div>
</section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        document.querySelector(".responsive-toggle").onclick = function(event) {
            event.preventDefault();
            let aside = document.querySelector("aside"), main = document.querySelector("main"), header = document.querySelector("header");
            let asideStyle = window.getComputedStyle(aside);
            if (asideStyle.display == "none") {
                aside.classList.remove("closed", "responsive-hidden");
                main.classList.remove("full");
                header.classList.remove("full");
            } else {
                aside.classList.add("closed", "responsive-hidden");
                main.classList.add("full");
                header.classList.add("full");
            }
        };
        </script>
</body>

</html>
<?php } else { header('Location:/'); }?>