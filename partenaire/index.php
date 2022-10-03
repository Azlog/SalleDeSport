<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_partenaire']=="1"){

   $pdo = pdo_connect_mysql();
   $id= $_SESSION['account_id'];
   $stmt= $pdo->prepare('SELECT * FROM structure WHERE partenaire = ?');
   $stmt->execute([$id]);
   $structure = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   $stmt= $pdo->prepare('SELECT * FROM partenaires WHERE id = ?');
   $stmt->execute([$id]);
   $partenaire = $stmt->fetch(PDO::FETCH_ASSOC);
   
   $selected='dashboard';
   $partenaire_links = '
        <a href="index.php"' . ($selected == 'dashboard' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        <a href="structure.php"' . ($selected == 'structure' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Gérer une structure</a>
        <a href="parametres.php"' . ($selected == 'parametre' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Gérer les parametres</a>
        <a href="reset.php"' . ($selected == 'reset' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Réinitialiser votre mot de passe</a>
    ';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Admin - Panel</title>
        <link rel="icon" type="image/png" href="../favicon.png">
		<link href="../admin/admin.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="admin">
        <aside class="responsive-width-100 responsive-hidden">

            <h1>Dashboard</h1>
            <?=$partenaire_links ?>
        </aside>
        <main class="responsive-width-100">
            <header>
                <a class="responsive-toggle" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <div class="space-between"><center><h1>Dashboard</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>

<body>
<section class="py-1 mt-1">
        <div class="container py-4 py-xl-5 mt-5 bg-light border border-dark text-dark" style="border-radius: 16px;">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col d-flex flex-column justify-content-center p-5">
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse</h4>
                            <p><?=$partenaire['padresse']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-phone">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                            </svg></div>
                        <div>
                            <h4>Téléphone</h4>
                            <p><?=$partenaire['ptelephone']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-laptop">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse mail</h4>
                            <p><?=$partenaire['pemail']?></p>
                        </div>
                    </div>
                </div>
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