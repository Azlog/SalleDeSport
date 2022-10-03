<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_admin']=="1"){
   $pdo = pdo_connect_mysql();
   
   if (isset($_POST['create'], $_POST['email'], $_POST['telephone'], $_POST['password'], $_POST['adresse'], $_POST['image'])) {
       
    $stmt = $pdo->prepare('SELECT * FROM structure WHERE email = ?');
    $stmt->execute([ $_POST['email'] ]);
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($account) {
        // Account exists!
        echo("<script>alert(\"L'email est déjà utilisé !\")</script>");
    } else {
    $pemail = $_POST["email"];
    $image = $_POST["image"];
    $padresse = $_POST["adresse"];
    $ptelephone = $_POST["telephone"];
    $pass = $_POST['password'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    
    $stmt = $pdo->prepare("INSERT INTO `comptes` SET cid=NULL, cemail='$pemail', password='$password', admin=0, partenaire=0, structure=1, isActive=1, firstco=0");
    $stmt->execute([$pemail,$password]);
    
    $stmt = $pdo->prepare("SELECT * FROM `comptes` WHERE cemail='$pemail'");
    $stmt->execute([$pemail]);
    $idc= $stmt->fetch();
    $idcomptes=$idc['cid'];
    
    $part = $_POST['emailp'];
    $stmt = $pdo->prepare("SELECT * FROM `comptes` WHERE cemail='$part'");
    $stmt->execute([$part]);
    $ic= $stmt->fetch();
    $parte=$ic['cid'];
    
    $stmt = $pdo->prepare("SELECT * FROM `paramin` WHERE partenaire='$idcomptes'");
    $stmt->execute([$idcomptes]);
    $ic= $stmt->fetch();
    
    $check1 = $ic['members_read'];
    $check2 = $ic['members_write'];
    $check3 = $ic['members_payement_schedule_read'];
    $check4 = $ic['members_products_read'];
    $check5 = $ic['members_schedules_red'];
    $check6 = $ic['members_add'];
    $check7 = $ic['payemment_schedules_need'];
    $check8 = $ic['payement_schedule_write'];
    $check9 = $ic['members_statistics_read'];
    $check10 = $ic['payement_day_read'];
    
    $stmt = $pdo->prepare("INSERT INTO `structure` SET id='$idcomptes', email='$pemail', adresse='$padresse', telephone='$telephone', image='$image', partenaire='$parte',`members_read`='$check1',`members_write`='$check2',`members_payement_schedule_read`='$check3',`members_products_read`='$check4',`members_schedules_red`='$check5',`members_add`='$check6',`payement_schedules_need`='$check7',`payement_schedules_write`='$check8',`members_statistics_read`='$check9',`payement_day_read`='$check10';");
    $stmt->execute([$idcomptes,$pemail,$padresse,$telephone,$image,$parte,$check1,$check2,$check3,$check4,$check5,$check6,$check7,$check8,$check9,$check10]);
    
    //mail
         $to = $pemail;
         $from = $mail_from;
         $fromName = $mail_name;
         
         $subject = "Votre compte a était crée !";
         $headers = 'From: '.$fromName.'<'.$from.'>';
         
        $htmlContent = file_get_contents('mail.txt');
 
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        $headers .= 'Cc: '.$part["pemail"] . "\r\n";
            
         if(mail($to, $subject, $htmlContent, $headers)){ 
           echo 'Email has sent successfully.'; 
        }else{ 
           echo 'Email sending failed.'; 
        }
        //fin mail
    
// insert a row

    $error = "Compte créé !";
   }
}
   $selected ='accounts';
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
                <div class="space-between"><center><h1>Ajouter une structure</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>

<body>
<section class="py-5 mt-5">
        <div class="container py-2">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                </div>
            </div>
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-9">
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-xl-6">
                            <div class="card mb-8">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                        </svg></div>

           
                                    <form class="text-center" action=""  method="post">
                                        <div class="mb-3"><input class="form-control" type="email" name="email" id="email" placeholder="Email" required></div>
                                        <div class="mb-3"><input class="form-control" type="password" name="password" id="password" placeholder="Password" required ></div>
                                        <div class="mb-3"><input class="form-control" type="tel" name="telephone" id="telephone" placeholder="Téléphone" required ></div>
                                        <div class="mb-3"><input class="form-control" type="text" name="adresse" id="adresse" placeholder="Adresse Postale" required ></div>
                                        <div class="mb-3"><input class="form-control" type="email" name="emailp" id="emailp" placeholder="Email Partenaire" required></div>
                                        <div class="mb-3"><input class="form-control" type="text" name="image" id="image" placeholder="image.jpg" required ></div>
                                        <div class="mb-3"><input class="btn btn-primary d-block w-100" name="create" id="create" type="submit" value="Créer" onclick="javascript:return confirm('Confirmez votre choix');"></div>

                                    </form>
                                    <?php if ($error): ?>
                                        <p class="error"><?=$error?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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