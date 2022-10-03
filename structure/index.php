<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_structure']=="1"){

$id=$_SESSION['email'];
   $pdo = pdo_connect_mysql();
   $stmt= $pdo->prepare('SELECT * FROM comptes WHERE cemail = ?');
   $stmt->execute([$id]);
   $structure = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    if($structure['firstrco'] != 0){
        header('Location : /resetpassword.php');
    }else{

   $id=$_SESSION['email'];
   $pdo = pdo_connect_mysql();
   $stmt= $pdo->prepare('SELECT * FROM structure WHERE email = ?');
   $stmt->execute([$id]);
   $structure = $stmt->fetch(PDO::FETCH_ASSOC);
   
   $selected='dashboard';
   $partenaire_links = '
        <a href="index.php"' . ($selected == 'dashboard' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        <a href="reset.php"' . ($selected == 'reset' ? ' class="selected"' : '') . '><i class="fas fa-tachometer-alt"></i>Reset</a>
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

        <div class="container py-4 py-xl-5 mt-5 bg-light border border-dark text-dark" style="border-radius: 16px;">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col"><img class="rounded w-100 h-100 fit-cover" style="min-height: 300px;" src="../imgs/<?=$structure['image']?>"></div>
                <div class="col d-flex flex-column justify-content-center p-2">
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse</h4>
                            <p><?=$structure['adresse']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-phone">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                            </svg></div>
                        <div>
                            <h4>Téléphone</h4>
                            <p><?=$structure['telephone']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-laptop">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse mail</h4>
                            <p><?=$structure['email']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="container py-4 py-xl-5">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col p-4">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Membres Read</h4>
                        <label class="switch">
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?> >
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_write']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_payement_schedule_read']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_statistics_read']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_day_read']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col d-flex flex-column justify-content-center p-4">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                        </svg></div>
                    <div>
                        <h4>Members Products Read</h4>
                        <label class="switch">
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_products_read']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_schedules_red']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_add']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_schedules_need']==1){echo "checked='checked'";} ?>>
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
                            <input type="checkbox" disabled="disabled" <?php if ($structure['members_schedules_write']==1){echo "checked='checked'";} ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>

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
<?php } ?>
<?php } else { header('Location:/'); }?>