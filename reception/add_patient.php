
<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>


<?php 

$msg = NULL;
if(isset($_POST['add'])) {
    //declare variables

    $receptionLogin =  $_SESSION['receptionLogin'];
    $firstname = ucfirst($_POST['firstname']);
    $middlename = ucfirst($_POST['middlename']);
    $lastname = ucfirst($_POST['lastname']);
    $gender = $_POST['gender'];
    // $district = $_POST['district'];
    $doctorid = $_POST['doctorid'];
    $dob = $_POST['DOB'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $date = date("Y-m-d H:i:s");
    $regno  = "PAT/HOSP/" . rand(100000, 999999) . " ";
    // $status = "pending";
    $insuaranceType = $_POST['insuaranceType'];
    $insuaranceNumber = $_POST['insuarancenumber'];
    $cash = 0;

    $sql = $conn->query("INSERT INTO patients(patientid,doctor_id,regno,rec_id,firstname,middlename,lastname,phonenumber,address,city,DOB,gender,insuarance_type,insuarance_number,cash,dateCreated) VALUES('','$doctorid','$regno','$receptionLogin','$firstname','$middlename','$lastname','$phonenumber','$address','$city','$dob','$gender','$insuaranceType','$insuaranceNumber','$cash','$date')");

    if($sql) {
         $msg =  "Patient Added";
    }
    else {
        $msg =  "Patient Not Added";
    }


}

?>



    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">Add New Patient</p>
    </div>
    
    <div class="card" style="padding: 16px;">
    <p class="text-light bg-success ">
    <?php
            if(isset($msg)) {echo htmlentities($msg); }
     
     ?>
    
    </p>
        <form action="" class="form-group" method="POST">
        <p>Patient Infomation</p>
          <div class="row">
              <div class="col">
                  <input type="text" class="form-control" placeholder="First name" name="firstname">
              </div>
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Middle name" name="middlename">>
              </div>
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" name="lastname">
              </div>
          </div>
           
    
           <div class="row">
              <div class="col auto my-1">
                 
                 <select name="gender" id="" class="custom-select mr-sm-2">
                    <option selected>Gender...</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                 </select>
                 </div>
                 
                 <div class="col auto my-1">
                 
                 <select name="doctorid" id="" class="custom-select mr-sm-2">
                    <option selected>Choose Doctor</option>
                    <?php
                            $sqlusers = $conn->query("SELECT * FROM doctors");
                            while($row = $sqlusers->fetch_array()) {

                                ?>
                                        <option value="<?php echo $row['doc_id']; ?>"><?php echo $row['doc_firstname'] . " " . $row['doc_middlename'] . " " . $row['doc_lastname']; ?></option>
                                <?php
                            }
                        
                        ?>
                 </select>
                 </div>
                  
               <div class="col auto my-1">
                  <div class="form-control">
                      <div class="input-group date" id="datetimepicker1">
                       <input type="date" class="form-control" id="" name="DOB">
                       <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                       </span>
                   </div>
                  </div>
                  
                  <script type="text/javascript">
                $(function(){
                   $('#datetimepicker1').datetimepicker(); 
                });
            </script>
               </div>
               
                
           </div>
           
           <p>Home information</p>
           <div class="row">
               <div class="col">
                   <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber">
               </div>
               
               <div class="col">
                   <input type="text" class="form-control" placeholder="Address" name="address">
               </div>
               
               <div class="col">
                   <input type="text" class="form-control" placeholder="City" name="city">
               </div>
           </div>
           
           <p>Medical Information</p>
           <div class="row">
              <div class="col">
                   <select name="insuaranceType" id="" class="custom-select mr-sm-2">
                    <option selected>Insurance</option>
                     <option value="NHIF">NHIF</option>
                     <option value="AAR">AAR</option>
                     <option value="AAR">CHIB</option>
                     <option value="AAR">CHF</option>
                 </select>
               </div>
               <div class="col">
                   <input type="text" class="form-control" placeholder="Insuarance Card Number" name="insuarancenumber">
               </div>
               
               
               <div class="col">
                   <p class="btn btn-outline-dark btnpblock">Cash Payment</p>
               </div>
           </div>
           
           
           
           <button type="submit" class="btn btn-outline-success btn-block" name="add">Add Patient</button>
        </form>
    </div>
    
<?php include("includes/footer.php"); ?>