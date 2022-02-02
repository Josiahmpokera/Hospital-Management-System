<?php
include("includes/config/conn.php");  //connection to the database
include("includes/classes/Account.php");  //Account class

$account = new Account($conn);  
$error_array = array(); //this is for error array
if(isset($_POST['submit'])) {

    //variables inserted
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //RECEPTION LOGIN QUERY
     $query =  $account->getReceptionLogin($username,$password);
    $numreception =  mysqli_fetch_array($query);

    //NURSELOGIN QEURY
    $querynurse = $account->getNurseLogin($username,$password);
    $numNurse = $querynurse->fetch_array();

    
    //DOCTOR LOGIN QEURY
    $queryDoctor = $account->getDoctorLogin($username,$password);
    $numDoctor = $queryDoctor->fetch_array();

      //RADIOLOGICT LOGIN QEURY
      $queryRadiology = $account->getRadiologistLogin($username,$password);
      $numRadiology = $queryRadiology->fetch_array();

       //laboratory LOGIN QEURY
       $querylaboratory = $account->getLaboratoristLogin($username,$password);
       $numLaboratory = $querylaboratory->fetch_array();

    //laboratory LOGIN QEURY
    $queryPhamacist = $account->getPhamacistLogin($username,$password);
    $numPhamacist = $queryPhamacist->fetch_array();

    //ADMIN LOGIN QEURY
    $queryAdmin = $account->getAdminLogin($username,$password);
    $numAdmin = $queryAdmin->fetch_array();

    
    if($numreception > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['receptionLogin'] = $numreception['rec_id'];
        header("location: reception/dashboard.php");
    }

    elseif($numNurse > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['nurseLogin'] = $numNurse['nur_id'];
        header("location: nurse/dashboard.php");
    }

    elseif($numDoctor > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['doctorLogin'] = $numDoctor['doc_id'];
        header("location: doctor/dashboard.php");
    }

    elseif($numRadiology > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['RadiologyLogin'] = $numRadiology['rad_id'];
        header("location: radiology/dashboard.php");
    }

    elseif($numLaboratory > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['laboratoryLogin'] = $numLaboratory['lab_id'];
        header("location: lab/dashboard.php");
    }

    elseif($numPhamacist > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['phamacistLogin'] = $numPhamacist['pha_id'];
        header("location: pharmacy/dashboard.php");
    }

    elseif($numAdmin > 0) {
        $account->getRememberMe(); //this is remember me funtion
        $_SESSION['adminLogin'] = $numAdmin['admin_id'];
        header("location: admin/dashboard.php");
    }


    else {
        array_push($error_array, "Username or password is incorrect<br>");
    }


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  
  <div class="container">
      
       <div class="row">
           <div class="col">
               
           </div>
           
           <div class="col" style="margin-top: 10%">
               <center><img src="assets/images/icons8-microscope.png" alt="">
               <img src="assets/images/icons8-hospital_2.png" alt="">
               <img src="assets/images/icons8-microbeam_radiation_therapy.png" alt="" ></center>
               <p class="text-light bg-success">
               
                    <?php
                     if(in_array("Username or password is incorrect<br>", $error_array)) echo  "Username or password is incorrect<br>"; ?>
                   
                </p>
               <form action="" class="form-group" method="POST">
                   
                   <input type="text" class="form-control" placeholder="Username" name="username" value="<?php if(isset($_COOKIE["user_login"])) {echo $_COOKIE["user_login"]; } ?>" style="margin-top: 16px;">
                   
                   <input type="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["userpassword"])) {echo $_COOKIE["userpassword"]; } ?>" name="password" style="margin-top: 16px;">
                   
                   <div class="form-check" style="margin-top: 16px;">
                  
                  <input type="checkbox" name="remember" class="form-check-input1" pattern="checkbox" <?php if(isset($_COOKIE["user_login"])) {?> checked <?php  } ?>>
                  <label for="chreck">Remember Password</label>
                  
              </div>
                   
                   
                   <button class="btn btn-outline-success btn-block" name="submit" type="submit" style="margin-top: 16px">Login</button>
                   
                   <p style="margin-top: 16px;">For All Hospital Departments! <a href="">Pharmacy System here</a></p>
               </form>
               
           </div>
           
           <div class="col">
               
           </div>
           
           
       </div>
   </div>
   
</body>
</html>