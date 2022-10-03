<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
$pdo = pdo_connect_mysql();

if ($_SESSION['account_admin']=="1"){
$selected='dashboard';
   $admin_links = '
        <a href="dashboard.php"' . ($selected == 'dashboard' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        <a href="desactivationcompte.php"' . ($selected == 'products' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Désactiver un compte</a>
        <a href="ajoutpartenaire.php"' . ($selected == 'categories' ? ' class="selected"' : '') . '><i class="fas fa-list"></i>Ajouter un partenaire</a>
        <a href="ajoutstructure.php"' . ($selected == 'accounts' ? ' class="selected"' : '') . '><i class="fas fa-users"></i>Ajouter une structure</a>
        <a href="recherchepartenaire.php"' . ($selected == 'shipping' ? ' class="selected"' : '') . '><i class="fas fa-shipping-fast"></i>Rechercher un partenaire</a>
        <a href="recherchestructure.php"' . ($selected == 'discounts' ? ' class="selected"' : '') . '><i class="fas fa-tag"></i>Rechercher une structure</a>
        <a href="emailtemplates.php"' . ($selected == 'emailtemplates' ? ' class="selected"' : '') . '><i class="fas fa-envelope"></i>Email Templates</a>
    ';
    
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM comptes');
    $stmt->execute();
    $totalcompte = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM partenaires');
    $stmt->execute();
    $totalpartenaire = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM structure');
    $stmt->execute();
    $totalstructure = $stmt->fetchColumn();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Admin - Panel</title>
        <link rel="icon" type="image/png" href="../favicon.png">
		<link href="admin.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
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
                <div class="space-between"><center><h1>Dashboard</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>

<div class="dashboard">
    <div class="content-block stat">
        <div>
            <h3>Nombre de structure</h3>
            <p><?=$totalstructure?></p>
        </div>
    </div>

    <div class="content-block stat">
        <div>
            <h3>Nombre de partenaire</h3>
            <p><?=$totalpartenaire?></p>
        </div>
    </div>

    <div class="content-block stat">
        <div>
            <h3>Total Comptes</h3>
            <p><?=$totalcompte?></p>
            
        </div>
    </div>

</div>

        <script>
        document.querySelectorAll(".admin .details").forEach(function(detail) {
            detail.onclick = function() {
                let display = this.nextElementSibling.style.display == 'table-row' ? 'none' : 'table-row';
                this.nextElementSibling.style.display = display;
            };
        });
        </script>
        
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
    </div>
</div>
</main>
</body>
</html>
<?php }
else{
    header('Location:/');
}?>
