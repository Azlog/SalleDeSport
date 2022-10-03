<?php
include_once('../config.php');
include_once('../functions.php');
session_start();
if ($_SESSION['account_admin']=="1"){
   $id=$_GET['id'];
   $pdo = pdo_connect_mysql();

   

   $stmt= $pdo->prepare('SELECT * FROM structure WHERE id = ?');
   $stmt->execute([$id]);
   $structure = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   
   if(!empty($_POST['submit'])) {
    $var = $_POST['members_read'];
    $members_write = $_POST['members_write'];
    $members_payement_schedule_read = $_POST['members_payement_schedule_read'];
    $members_products_read = $_POST['members_products_read'];
    $members_schedule_read = $_POST['members_schedule_read'];
    $members_add = $_POST['members_add'];
    $payement_schedules_need = $_POST['payement_schedules_need'];
    $payement_schedules_write = $_POST['payement_schedules_write'];
    $members_statistics_read = $_POST['members_statistics_read'];
    $payement_day_read = $_POST['payement_day_read'];
    
    if(isset($var)){
        $v1='1';
    }else{
        $v1='0';
    } 
    
    if(isset($members_write)){
        $v2='1';
    }else{
        $v2='0';
    }
     
    if(isset($members_payement_schedule_read)){
        $v3='1';
    }else{
        $v3='0';
    }
     
    if(isset($members_products_read)){
        $v4='1';
    }else{
        $v4='0';
    }
     
    if(isset($members_schedule_read)){
        $v5='1';
    }else{
        $v5='0';
    }
     
    if(isset($members_add)){
        $v6='1';
    }else{
        $v6='0';
    }
     
    if(isset($payement_schedules_need)){
        $v7='1';
    }else{
        $v7='0';
    }
     
    if(isset($payement_schedules_write)){
        $v8='1';
    }else{
        $v8='0';
    }
     
    if(isset($members_statistics_read)){
        $v9='1';
    }else{
        $v9='0';
    }
     
    if(isset($payement_day_read)){
        $v10='1';
    }else{
        $v10='0';
    }
    
    $stmt = $pdo->prepare('UPDATE `structure` SET `members_read`=?,`members_write`=?,`members_payement_schedule_read`=?,`members_products_read`=?,`members_schedules_red`=?,`members_add`=?,`payement_schedules_need`=?,`payement_schedules_write`=?,`members_statistics_read`=?,`payement_day_read`=? WHERE id=?');
    $stmt->execute([$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$_GET['id']]);
    }

  
   ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Partenaire</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
<section class="py-4 mt-5">
        
        <?php foreach ($structure as $v): ?>
        <div class="container py-4 py-xl-5 mt-5" style="background: var(--bs-pink);border-radius: 16px;">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col"><img class="rounded w-100 h-100 fit-cover" style="min-height: 300px;" src="../imgs/<?=$v['image']?>"></div>
                <div class="col d-flex flex-column justify-content-center p-2">
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse</h4>
                            <p><?=$v['adresse']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-phone">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                            </svg></div>
                        <div>
                            <h4>Téléphone</h4>
                            <p><?=$v['telephone']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-phone">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse mail</h4>
                            <p><?=$v['email']?></p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-laptop">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Partenaire</h4>
                            <p><?=$v['cemail']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
         <?php endforeach; ?>

<style>
                           /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
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
  border-radius: 50%;
}
</style>


         <form class="text-center" action=""  method="post">
         <div class="container py-4 py-xl-5">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col p-4">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    
                    <div>
                        <h4>Membres Read</h4>
                        <label class="switch">

                          <input type="checkbox" name="members_read" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    
                    <div>
                        <h4>Members Write</h4>
                        <label class="switch">
                          <input type="checkbox" name="members_write"<?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    
                    <div>
                        <h4>Members Payement Schedule Read</h4>
                        <label class="switch">
                          <input type="checkbox" name="members_payement_schedule_read" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
               </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    
                    <div>
                        <h4>Members Products Read</h4>
                        <label class="switch">
                          <input type="checkbox" name="members_products_read" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
               </div>
               <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    
                    <div>
                        <h4>Members Schedules Read</h4>
                        <label class="switch">
                          <input type="checkbox" name="members_schedules_read" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col d-flex flex-column justify-content-center p-4">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    
                    <div>
                        <h4>Members Add</h4>
                        
                        <label class="switch">
                          <input type="checkbox" name="members_add" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    
                    <div>
                        <h4>Payement Schedules Need</h4>
                        <label class="switch">
                          <input type="checkbox" name="payement_schedules_need" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    
                    <div>
                        <h4>Payement Schedules Write</h4>
                        <label class="switch">
                          <input type="checkbox" name="payement_schedules_write" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    
                    <div>
                        <h4>Members Statistics Read</h4>
                        <label class="switch">
                          <input type="checkbox" name="members_statistics_read" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                </div>
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                    
                    <div>
                        <h4>Payement Day Read</h4>
                        <label class="switch">
                          <input type="checkbox" name="payement_day_read" <?php if ($structure['members_read']==1){echo "checked='checked'";} ?>>
                          <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <input class="btn btn-primary d-block w-300" name="submit" type="submit" value="Valider" onclick="javascript:return confirm('Confirmez votre choix');">
    </form>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php } else { header('Location:/'); }?>