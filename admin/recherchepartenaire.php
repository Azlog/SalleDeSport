<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_admin']=="1"){

   $pdo = pdo_connect_mysql();
   $stmt= $pdo->prepare('SELECT * FROM partenaires ');
   $stmt->execute();
   $structure = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   $selected ='shipping';
   $admin_links = '
        <a href="dashboard.php"' . ($selected == 'dashboard' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        <a href="desactivationcompte.php"' . ($selected == 'products' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Désactiver un compte</a>
        <a href="ajoutpartenaire.php"' . ($selected == 'categories' ? ' class="selected"' : '') . '><i class="fas fa-list"></i>Ajouter un partenaire</a>
        <a href="ajoutstructure.php"' . ($selected == 'accounts' ? ' class="selected"' : '') . '><i class="fas fa-users"></i>Ajouter une structure</a>
        <a href="recherchepartenaire.php"' . ($selected == 'shipping' ? ' class="selected"' : '') . '><i class="fas fa-shipping-fast"></i>Rechercher un partenaire</a>
        <a href="recherchestructure.php"' . ($selected == 'discounts' ? ' class="selected"' : '') . '><i class="fas fa-tag"></i>Rechercher une structure</a>
        <a href="emailtemplates.php"' . ($selected == 'emailtemplates' ? ' class="selected"' : '') . '><i class="fas fa-envelope"></i>Email Templates</a>
    ';

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
                <div class="space-between"><center><h1>Rechercher un partenaire</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>

<body>
    <style>
        .container {
    padding: 40px;
    margin: 0 auto;
    max-width: 1000px;
    text-align: center;
}

#charactersList {
    padding-inline-start: 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    grid-gap: 20px;
}

.character {
    list-style-type: none;
    background-color: #eaeaea;
    border-radius: 3px;
    padding: 10px 20px;
    display: grid;
    grid-template-columns: 3fr 1fr;
    grid-template-areas:
        'name image'
        'house image';
    text-align: left;
}

.character > h2 {
    grid-area: name;
    margin-bottom: 0px;
}

.character > p {
    grid-area: house;
    margin: 0;
    margin-top: -18px;
}

.character > img {
    max-height: 100px;
    grid-area: image;
}

#searchBar {
    width: 100%;
    height: 32px;
    border-radius: 3px;
    border: 1px solid #eaeaea;
    padding: 5px 10px;
    font-size: 12px;
}

#searchWrapper {
    position: relative;
}

#searchWrapper::after {
    content: '🔍';
    position: absolute;
    top: 7px;
    right: 15px;
}
    </style>
<section class="py-1 mt-1">

<!-- Barre de recherche -->

        <div class="container">
            <div id="searchWrapper">
                <input
                    type="text"
                    name="searchBar"
                    id="searchBar"
                    placeholder="Chercher un partenaire"
                />
            </div>
            <ul id="charactersList"></ul>
        </div>

<!-- Fin Barre de recherche -->

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
<!-- Fin Barre de recherche Script -->
</body>
<script src="app.js"></script>
</html>
<?php } else { header('Location:/'); }?>