<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_structure']=="1"){

   $id=$_SESSION['email'];
   $pdo = pdo_connect_mysql();
   $stmt= $pdo->prepare('SELECT * FROM comptes WHERE cemail = ?');
   $stmt->execute([$id]);
   $structure = $stmt->fetch(PDO::FETCH_ASSOC);

   if (isset($_POST['submit'],$_POST['apassword'],$_POST['npassword']))
   {
       $apassword = password_hash($_POST['apassword'], PASSWORD_DEFAULT);
       $npassword = password_hash($_POST['npassword'], PASSWORD_DEFAULT);
       
       if($structure['password']=$apassword){
       $id=$_SESSION['email'];
       $password = password_hash($_POST['cpassword'], PASSWORD_DEFAULT);
       $stmt= $pdo->prepare("UPDATE comptes SET password='$npassword' WHERE cemail = '$id'");
       $stmt->execute([$npassword,$id]);
       header('Location: partenaire/');
       }else{
           $error = "L'ancien mot de passe est incorrect !";
       }
   }
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
        <main class="responsive-width-100">
            <header>
                    <a href="/structure/"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 29 29"><path d="M14.5 2A12.514 12.514 0 0 0 2 14.5 12.521 12.521 0 0 0 14.5 27a12.5 12.5 0 0 0 0-25Zm7.603 19.713a8.48 8.48 0 0 0-15.199.008A10.367 10.367 0 0 1 4 14.5a10.5 10.5 0 0 1 21 0 10.368 10.368 0 0 1-2.897 7.213ZM14.5 7a4.5 4.5 0 1 0 4.5 4.5A4.5 4.5 0 0 0 14.5 7Z"/></svg></a>
                <div class="space-between"><center><h1>Changer votre mot de passe</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>

<body>
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
                                        <div class="mb-3"><input class="form-control" type="password" name="apassword" required="required" placeholder="Ancien password"></div>
                                        <div class="mb-3"><input class="form-control" type="password" name="npassword" required="required" placeholder="Nouveau password"></div>
                                        <div class="mb-3"><input class="btn btn-primary d-block w-100" name="submit" type="submit" value="Changer votre mot de passe" onclick="javascript:return confirm('Confirmez votre changement de mot de passe');"></div>
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
            </body>
            </html>
            <?php } else { header('Location:/'); }?>