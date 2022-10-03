<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_partenaire']=="1"){


   $id=$_SESSION['account_id'];
   $pdo = pdo_connect_mysql();
   $stmt= $pdo->prepare('SELECT * FROM paramin WHERE partenaire = ?');
   $stmt->execute([$id]);
   $structure = $stmt->fetch(PDO::FETCH_ASSOC);
   
if(isset($_POST['submit']))
         {
        
         $check1 = isset($_POST['choice1']) ? "checked" : "unchecked";
         $check2 = isset($_POST['choice2']) ? "checked" : "unchecked";
         $check3 = isset($_POST['choice3']) ? "checked" : "unchecked";
         $check4 = isset($_POST['choice4']) ? "checked" : "unchecked";
         $check5 = isset($_POST['choice5']) ? "checked" : "unchecked";
         $check6 = isset($_POST['choice6']) ? "checked" : "unchecked";
         $check7 = isset($_POST['choice7']) ? "checked" : "unchecked";
         $check8 = isset($_POST['choice8']) ? "checked" : "unchecked";
         $check9 = isset($_POST['choice9']) ? "checked" : "unchecked";
         $check10 = isset($_POST['choice10']) ? "checked" : "unchecked";
         if($check1=="unchecked"){
            $c1=0;
         }else{
            $c1=1;
         }
         if($check2=="unchecked"){
            $c2=0;
         }else{
            $c2=1;
         }
         if($check3=="unchecked"){
            $c3=0;
         }else{
            $c3=1;
         }
         if($check4=="unchecked"){
            $c4=0;
         }else{
            $c4=1;
         }
         if($check5=="unchecked"){
            $c5=0;
         }else{
            $c5=1;
         }
         if($check6=="unchecked"){
            $c6=0;
         }else{
            $c6=1;
         }
         if($check7=="unchecked"){
            $c7=0;
         }else{
            $c7=1;
         }
         if($check8=="unchecked"){
            $c8=0;
         }else{
            $c8=1;
         }
         if($check9=="unchecked"){
            $c9=0;
         }else{
            $c9=1;
         }
         if($check10=="unchecked"){
            $c10=0;
         }else{
            $c10=1;
         }
         $stmt = $pdo->prepare('UPDATE `paramin` SET `members_read`=?,`members_write`=?,`members_payement_schedule_read`=?,`members_products_read`=?,`members_schedules_red`=?,`members_add`=?,`payement_schedules_need`=?,`payement_schedules_write`=?,`members_statistics_read`=?,`payement_day_read`=? WHERE id=?');
         $stmt->execute([$c1,$c2,$c3,$c6,$c7,$c8,$c9,$c10,$c4,$c5,$id]);
         
         }
   $selected='parametre';
   $admin_links = '
        <a href="index.php"' . ($selected == 'dashboard' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        <a href="structure.php"' . ($selected == 'structure' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Gérer une structure</a>
        <a href="parametres.php"' . ($selected == 'parametre' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Gérer les parametres</a>
        <a href="reset.php"' . ($selected == 'reset' ? ' class="selected"' : '') . '><i class="fas fa-box-open"></i>Reinitialiser votre mot de passe</a>
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
            <?=$admin_links ?>
        </aside>
        <main class="responsive-width-100">
            <header>
                <a class="responsive-toggle" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <div class="space-between"><center><h1>Gérer les parametres</h1></center></div>
                <a href="logout.php" class="right"><i class="fas fa-sign-out-alt"></i></a>
            </header>
<body>
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }
    .switch input {display:none;}
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;}

</style>

    <div class="container py-1 py-xl-1">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col p-1">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg>
                    </div>
                        <div>
                            <h4>Membres Read</h4>
                            <label class="switch">
                                <input type="checkbox" name="choice1" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?> >
                                <span class="slider round"></span>
                                </label>
                    <div>
                </div>
            </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Write</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice2" <?php if ($structure['members_write']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Payement Schedule Read</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice3" <?php if ($structure['members_payement_schedule_read']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
               </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Statistics Read</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice4" <?php if ($structure['members_statistics_read']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
               </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Payement Day Read</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice5" <?php if ($structure['members_day_read']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col d-flex flex-column justify-content-center p-1">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Products Read</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice6" <?php if ($structure['members_products_read']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Schedule Read</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice7" <?php if ($structure['members_schedules_red']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Add</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice8" <?php if ($structure['members_add']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
               </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Payement Schedule Need</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice9" <?php if ($structure['members_schedules_need']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
               </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Payement Schedule Write</h4>
                        <label class="switch">
                            <input type="checkbox" name="choice10" <?php if ($structure['members_schedules_write']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                            </label>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
        <center><input type="submit" name="submit" value="Submit" class="btn btn-danger btn-lg btn-block"></center>
                    </form>

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