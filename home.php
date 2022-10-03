<?php
// Prevent direct access to file
defined('shoppingcart') or exit;
include('config.php');

// User clicked the "Login" button, proceed with the login process... check POST data and validate email
if (isset($_POST['login'], $_POST['email'], $_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['connect']=0; //Initialise la variable 'connect'.
    // Check if the account exists
    $stmt = $pdo->prepare('SELECT * FROM comptes WHERE cemail = ?');
    $stmt->execute([ $_POST['email'] ]);
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
    // If account exists verify password
    if ($account && password_verify($_POST['password'], $account['password'])) {
        // User has logged in, create session data
        session_regenerate_id();
        $_SESSION['account_loggedin'] = TRUE;
        $_SESSION['connect']=1;
        $_SESSION['account_id'] = $account['cid'];
        $_SESSION['email'] = $account['cemail'];
        $_SESSION['account_admin'] = $account['admin'];
        $_SESSION['account_partenaire'] = $account['partenaire'];
        $_SESSION['account_structure'] = $account['structure'];
        $_SESSION['firstco'] = $account['firstco'];
        $_SESSION['isActive'] = $account['isActive'];
        
        if($_SESSION['account_admin']){
            header('Location: /admin/dashboard.php');
        }
        if(($_SESSION['account_partenaire']) && ($_SESSION['isActive'])){
            header('Location: /partenaire/index.php');
        }
        if(($_SESSION['account_structure']) && ($_SESSION['isActive']) && ($_SESSION['firstco'])=='0'){
            header('Location: /');
        }
        if(($_SESSION['account_structure']) && ($_SESSION['isActive']) && ($_SESSION['firstco'])=='1'){
            header('Location: /structure/index.php');
        }
    } else {
        $error = 'Incorrect Email/Password!';
    }
}

if (isset($_POST['deconnect'])){
    session_start();
    unset($_SESSION);
    session_destroy();
    session_write_close();
    header('Location: /');
    die;
}

$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$home_link = url('index.php');
$site_name = site_name;
$base_url = base_url;
$base_url = base_url;
$rewrite_url = rewrite_url ? 'true' : 'false';
$year = date('Y');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Stay Around The World</title>
        <link rel="icon" type="image/png" href="{$base_url}favicon.png">
		<link href="{<?$base_url?>}style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
        <?$head?>
	</head>
	<body>
        <header>
            <center><h2 class="display-1">Salle de sport</h2></center>
        </header>
        <main>
<section class="py-5 mt-5">
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <h2>Connectez-vous</h2>
                            <p class="w-lg-50">Connectez vous pour accéder a votre compte.</p>
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
                                        <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                        <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                        <div class="mb-3"><input class="btn btn-primary d-block w-100" name="login" type="submit" value="Login"></div>
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
            </main>
    </body>
</html>