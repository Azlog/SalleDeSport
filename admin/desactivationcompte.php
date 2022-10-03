<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_admin']=="1"){

   $pdo = pdo_connect_mysql();
   if (isset($_POST['delete'], $_POST['email'])){
    $stmt = $pdo->prepare('UPDATE comptes SET isActive=0 WHERE cemail=?');
    $stmt->execute([$_POST['email']]);
    
    //mail
         $to = $_POST['email'];
         $from = $mail_from;
         $fromName = $mail_name;
         
         $subject = "Votre compte a était desactivé !";
         $headers = 'From: '.$fromName.'<'.$from.'>';
         
        $htmlContent = ' 
            <html> 
              <head> 
                  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="../assets/css/styles.css">
                <link href="admin.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
              </head> 
             
              <body>
                <div class="bg-black">
                  <div class="container">
                    <h1 class="ax-center text-white text-center mb-10">Il y a eu du changements !</h1>
                    <p class="ax-center max-w-96 lh-lg text-white text-center text-2xl mb-10">
                      Votre compte est désactivé. Contactez le service technique pour le réactiver.
                    </p>
                  </div>
                </div>
              </body>
              </html>'; 
 
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            
         if(mail($to, $subject, $htmlContent, $headers)){ 
           echo 'Email has sent successfully.'; 
        }else{ 
           echo 'Email sending failed.'; 
        }
        //fin mail
   }
   $selected ='products';
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
                <div class="space-between"><center><h1>Désactiver de compte</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>
   

<section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                </div>
            </div>
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-5">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                        </svg></div>

           
                                    <form class="text-center" action=""  method="post">
                                        <div class="mb-3"><input class="form-control" type="email" name="email" required="required" placeholder="Email"></div>
                                        <div class="mb-3"><input class="btn btn-primary d-block w-100" name="delete" type="submit" value="Désactiver le compte" onclick="javascript:return confirm('Confirmez votre désactivation');"></div>
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