<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>
<?php

include("../includes/classes/Patient.php");
?>

<?php 

$patient_id = $_GET['patient_id']; //PATIENT id
    if(isset($_POST['save'])) {
        //declare variables
        $nurseLogin = $_SESSION['nurseLogin']; 
        $temparature = $_POST['temparature'];
        $weight = $_POST['weight'];
        $saturation = $_POST['saturation'];
        $bloodpressure = $_POST['bloodpressure'];
        $respiration = $_POST['respiration'];
        $pulse = $_POST['pulse'];
        $date = date("Y-m-d H:i:s");



        $sql = mysqli_query($conn, "INSERT INTO virtualsign(sig_id,pat_id,nur_id,pat_weight,pat_templature,pat_pulse,pat_blood_pressure,pat_respiration,pat_saturation,dateCreated) VALUES('','$patient_id','$nurseLogin','$weight','$temparature','$pulse','$bloodpressure','$respiration','$saturation','$date')");

        if($sql) {
            echo "<script>alert('Virtual sign Inserted')</script>";
        }

        else {
            echo "<script>alert('Virtual sign Not Inserted')</script>";
        }

    }


?>

<style>
    .patientinfo  {
        font-size: 12px;
    }
</style>



    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">Patient's Information</p>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="padding: 16px;">
                <img src="../assets/images/icons8-triangular_bandage.png" alt="" class="imgprofile">
                <?php 
                
                $patient_id = $_GET['patient_id'];
                $patient = new Patients($conn, $patient_id);
                
                ?>
                
                <p style="font-size: 1.3em; color: black"><b><?php echo $patient->getFirstname() . " " . $patient->getMiddlename() . " " . $patient->getLastname();  ?></b> </p>
                <div class="row">
                <div class="col-md-6">
                       <p class="patientinfo">Patient ID</p>
                       <p class="patientinfo">Insuarance Type</p>
                       <p class="patientinfo">Insuarance Number</p>
                       <p class="patientinfo">Gender</p>
                       <p class="patientinfo">Birth Date</p>
                       <p class="patientinfo">Age</p>
                       <p class="patientinfo">Phone</p>
                       <p class="patientinfo">Address</p>
                       <p class="patientinfo">city</p>
                    
                   </div>
                   
                   <div class="col-md-6">
                       <p class="patientinfo"><?php echo $patient->getRegNo();  ; ?></p>
                       <p class="patientinfo"><?php echo $patient->getInsuaranceType();  ?></p>
                       <p class="patientinfo"><?php echo $patient->getInsuaranceNumber();  ?></p>
                       <p class="patientinfo"><?php echo $patient->getPatientGender();  ?></p>
                       <p class="patientinfo"><?php  echo $patient->getAge(); ?></p>
                       <p class="patientinfo">
                       
                       <?php

                            //Create a Datetime object using the users date of birth
                            $dob = new DateTime($patient->getAge());

                            //We need to compre user's date of birth with today's date
                            $now = new DateTime();

                            //Calculate the difference between the two dates 
                            $difference = $now->diff($dob);

                            //Get the difference in years, as we are lookimg for the users age
                            $age = $difference->y;

                            //print it out 
                            echo $age;

                        ?>
                                    </p>
                       <p class="patientinfo"><?php echo $patient->getPhonenumber();  ?></p>
                       <p class="patientinfo"><?php echo $patient->getAddress();  ?></p>
                       <p class="patientinfo"><?php echo $patient->getCity(); ?></p>
                       <p class="patientinfo"><?php  ?></p>
                   </div>
               </div>
               
               <!-- <a href="#" class="btn btn-outline-dark btn-block" style="float: right;">View Medical History</a> -->
            </div>
        </div>
        
        <div class="col-md-8">
             <div class="card" style="padding: 16px;">
        <div class="card-header">
            Vital Signs
        </div>
        <div class="card-body">
        <div class="row">
                <div class="col-md-4">
                    <p>Temperature</p>
                    <p>Weight</p>
                    <p>O2 Saturation</p>
                    <p>Pulse</p>
                    <p>Blood Pressure</p>
                    <p>Respiration</p>
                </div>
                
                <div class="col-md-8">
                    <?php
                        $sqlvirtual = $conn->query("SELECT * FROM virtualsign WHERE pat_id = '$patient_id'");
                        $query = $sqlvirtual->fetch_array();
                        if($sqlvirtual->num_rows > 0) {
                            echo "
                            <p>" . $query['pat_templature'] . "</p>
                            <p>" . $query['pat_weight'] . "</p>
                            <p>" . $query['pat_saturation'] . "</p>
                            <p>" . $query['pat_pulse'] . "</p>
                            <p>" . $query['pat_blood_pressure'] . "</p>
                            <p>" . $query['pat_respiration'] . "</p>
                            
                            ";
                        } else {
                            echo "<p style='font-size: 40px'>No Virtual Sign for that Patients</p>";
                        }
                    
                    ?>
                  
                </div>
            </div>
            
            <button type="button" class="btn btn-outline-dark btn-block" id="phyExam_Btn_nurse" style="float: right;">Add Physical Examination</button>
        </div>
    </div>
       
       
       <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            
            <div class="row">
                <div class="col">
                    Reason for Present Illness | Emergency
                </div>
                
                <div class="col">
                    <button type="button" class="btn btn-outline-dark" id="phyExam_Btn_nurse" style="float: right;">Add Illness</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            
            
        </div>
    </div>
       
       
       <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            
            <div class="row">
                <div class="col">
                    Preliminary Symptoms
                </div>
                
                <div class="col">
                    <button type="button" class="btn btn-outline-dark" id="phyExam_Btn_nurse" style="float: right;">Add Illness</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            
            
        </div>
    </div>
      
      
      
      <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            
            <div class="row">
                <div class="col">
                    Emergency Diagnosis
                </div>
                
                <div class="col">
                    <button type="button" class="btn btn-outline-dark btnpblock" id="diagnosis_Btn_nurse" style="float: right;">Add Diagnosis</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            
            
        </div>
    </div>
       
       
       <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            
            <div class="row">
                <div class="col">
                    Emergency Treatment
                </div>
                
                <div class="col">
                    <button type="button" class="btn btn-outline-dark btnpblock" id="medication_Btn_nurse" style="float: right;">Add Medication</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            
            
        </div>
    </div>
       
       <div class="row" style="margin-bottom: 16px;">
           <div class="col">
               <button class="btn btn-outline-success btn-block" style="margin-top: 16px;">Send</button>
           </div>
           
           <div class="col">
               <button class="btn btn-outline-success btn-block" style="margin-top: 16px;">Send</button>
           </div>
       </div>
       
        </div>
    </div>
    
    
    
    </div>
    

</div> 

<!--    Medication Model Start Here-->
<div class="modal" id="medicationModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Medication
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Medication">
                            </div>
                            
                            
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Dosage">
                            </div>
                        </div>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
<!--    Medication Model Ends Here-->

<!--    Diagnosis Model Start Here-->
<div class="modal" id="diagnosis_Nurce_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Request Diagnosis
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-group">
                        <div class="row">
              <div class="col-md-4">
                 
                 <select name="" id="" class="custom-select mr-sm-2">
                    <option selected>Departments</option>
                     <option value="1">Radiology</option>
                     <option value="1">Laboratory</option>
                 </select>
                 </div>
                 
                 <div class="col auto my-1">
                 
                 <input type="text" class="form-control" placeholder="Medical test: Eg: X-ray, Blood">
                 
                 
                 </div>
                  
                
           </div>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
        <!--    Diagnosis Model Ends Here-->
     
     
<!--    Physical Examination Model Starts Here-->
     <div class="modal" id="PhyExam_Nurce_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Vital Signs | Physical Examination
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <form action="" class="form-group" method="POST">
                        <div class="modal-body">
                        
                        <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Templature" name="temparature" required>
                                </div>
                                
                                
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Weight" name="weight" required>
                                </div>
                                
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="O2 Saturation" name="saturation" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Pulse" name="pulse" required>
                                </div>
                        </div>
        
                        <div class="row" style="margin-top: 16px;">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Blood Pressure" name="bloodpressure" required>
                            </div>
                            
                            
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Respiration" name="respiration" required>
                            </div>
                            
                        </div>
                    
                </div>
                             
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                        
                            <button type="submit" class="btn btn-primary" name="save">Add Virtual</button>
                    </div>
                </form>
            </div>
        </div> 
     </div>
 
    <!--    Physical Examination Model Ends Here-->
     
     <script type="text/javascript">
         
         var btn = document.getElementById("medication_Btn_nurse");
         
         var modal = document.getElementById("medicationModel");
         
         var span = document.getElementsByClassName("close")[0];
         
         btn.onclick = function(){
             modal.style.display = "block";
            
         }
         
         span.onclick = function(){
             modal.style.display = "none";
            
         }
         
         
         
//         All window Event Here
         
         window.onclick = function(event){
             
             if(event.target == modal){
                 modal.style.display = "none";
             }
             
             if(event.target == modal2){
                 modal2.style.display = "none";
             }
             
             if(event.target == modal3){
                 modal3.style.display = "none";
             }
             
             
         }
         
//        Diagnosis Model Start Here
         
         var btn2 = document.getElementById("diagnosis_Btn_nurse");
         
         var modal2 = document.getElementById("diagnosis_Nurce_Model");
         
         var span2 = document.getElementsByClassName("close")[0];
         
         btn2.onclick = function(){
             modal2.style.display = "block";
            
         }
         
         span2.onclick = function(){
             modal2.style.display = "none";
            
         }
         
//         Diagnosis Model events Ends here
         
         
         var btn3 = document.getElementById("phyExam_Btn_nurse");
         
         var modal3 = document.getElementById("PhyExam_Nurce_Model");
         
         var span3 = document.getElementsByClassName("close")[0];
         
         btn3.onclick = function(){
             modal3.style.display = "block";
            
         }
         
         span3.onclick = function(){
             modal3.style.display = "none";
            
         }
//         window.onclick = function(event){
//             
//             if(event.target == modal2){
//                 modal2.style.display = "none";
//             }
//         }
    </script>
    
    <script type="text/javascript">
         
         
    </script>
     
     
<?php include("includes/footer.php"); ?>
