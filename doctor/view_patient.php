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

    if(isset($_POST['Send'])) {

        //declare variables
        $patient_id = $_GET['patient_id']; //PATIENT id
        $doctorid = $row['user_id'];
        $radiologyTest_id = $_POST['radiologyTest_id'];
        $rad_desc = $_POST['rad_description'];
        $date = date("Y-m-d H:i:s");

        $sql = mysqli_query($conn, "INSERT INTO radioogytest(test_id,patient_id,doctor_id,radiologyType_id,description,dateCreated) VALUES('','$patient_id','$doctorid','$radiologyTest_id','$rad_desc','$date')");

        if($sql) {
            echo "<script>alert('Radiology Inserted')</script>";
        }

        else {
            echo "<script>alert('Radiology Not Inserted')</script>";
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
            
            <!-- <button class="btn btn-secondary btn-block">Add Vital Sign</button> -->
        </div>
    </div>
        </div>
    </div>
    
    
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
       
       <!-- Tab links -->
<div class="tab">

      <button class="tablinks" onclick="openMedical(event, 'TO SUBMIT')">TO SUBMIT</button>
      <button class="tablinks" onclick="openMedical(event, 'SUBMITED')">SUBMITED</button>
      <button class="tablinks" onclick="openMedical(event, 'APPROVED')">APPROVED</button>
      <button class="tablinks" onclick="openMedical(event, 'REFUSED')">REFUSED</button>
      <button class="tablinks" onclick="openMedical(event, 'CANCEL')">CANCEL</button>
</div>

        <!-- Tab content -->
    <div id="Family Health" class="tabcontent">
  <div class="row">
        <div class="col-md-8">
            <h3>Family Health</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="family_health_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
    </div>
   
   <div id="Chief Complaints" class="tabcontent">
  <div class="row">
        <div class="col-md-8">
            <h3>Chief Complaints</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="cheaf_complaints_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
</div>
    









<div id="History Of The Present Illness" class="tabcontent">
    <div class="row">
        <div class="col-md-8">
            <h3>History Of The Present Illness</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="history_illness_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
</div>

    <div id="Allergy" class="tabcontent">
  <div class="row">
        <div class="col-md-8">
            <h3>Allergy</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="allergy_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
    </div>

    <div id="Vaccine" class="tabcontent">
  <div class="row">
        <div class="col-md-8">
            <h3>Vaccine</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="vaccine_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
    </div>
  
    </div>
    
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
       
       <!-- Tab links for Examinations -->
    <div class="tab">

      <button class="tablinks" onclick="openMedical(event, 'General Examination')">General Examination</button>
      <button class="tablinks" onclick="openMedical(event, 'Systemic Examination')">Systemic Examination</button>
      <button class="tablinks" onclick="openMedical(event, 'Preliminary Diagnosis')">Preliminary Diagnosis</button>
      
</div>

        <!-- Tab content for Examinations -->
    <div id="General Examination" class="tabcontent">
  <div class="row">
        <div class="col-md-8">
            <h3>General Examination</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="general_exam_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
    </div>
   
   <div id="Systemic Examination" class="tabcontent">
  <div class="row">
        <div class="col-md-8">
            <h3>Systemic Examination</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="systemic_exam_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
</div>
    
    <div id="Preliminary Diagnosis" class="tabcontent">
    <div class="row">
        <div class="col-md-8">
            <h3>Preliminary Diagnosis</h3>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success btnpblock" id="preliminary_diagnosis_Btn_Doct" style="float: right;">Add</button>
        </div>
    </div>
  
      <p>Content will be here...</p>
</div>

    
  
    </div>
    
    
    <div class="row">
        <div class="col">
            <div class="card" style="padding: 16px; margin-top: 16px;">
        
        <div class="card-header">
            <img src="../../images/icons8-microscope.png" alt="" width="15%;"> Laboratory Investigation
            
            
            <button type="button" class="btn btn-outline-success btnpblock" id="lab_investigation_Btn_Doct" style="float: right;">Add</button>
            
        </div>
        
        <div class="card-body">
<!--            prescription put here...-->
        </div>
  
    </div>
        </div>
        
        
        <div class="col">
            <div class="card" style="padding: 16px; margin-top: 16px;">
        
        <div class="card-header">
            <img src="../../images/icons8-microbeam_radiation_therapy.png" alt="" width="15%;"> Radiology Investigation
            
            <button type="button" class="btn btn-outline-success btnpblock" id="radiology_investigation_Btn_Doct" style="float: right;">Add</button>
        </div>
        
        <div class="card-body">
<!--            prescription put here...-->
        </div>
  
    </div>
        </div>
    </div>
    
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
        
        <div class="card-header">
            Medical Results
            
            
        </div>
        
        <div class="card-body">
<!--            prescription put here...-->
        </div>
  
    </div>
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
        
        <div class="card-header">
            Final Diagnosis
            <button type="button" class="btn btn-outline-dark btnpblock" id="diagnosis_Btn_Doct" style="float: right;">Add Diagnosis</button>
            
        </div>
        
        <div class="card-body">
<!--            prescription put here...-->
        </div>
  
    </div>
    
    
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
        
        <div class="card-header">
            Prescription
            
            <button type="button" class="btn btn-outline-dark btnpblock" id="prescription_Btn" style="float: right;">Add Prescription</button>
        </div>
        
        <div class="card-body">
<!--            prescription put here...-->
        </div>
    </div>
    
    </div>
    
    

</div> 

 

<div class="modal" id="diagnosis_Doct_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Final Diagnosis
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
     <div class="modal" id="prescriptionModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        Prescription
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
<!--     tabs models here...-->
     
     <div class="modal" id="history_illnesModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        History Of The Present Illness
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     <div class="modal" id="chief_complaintsModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        Cief Complaints
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     <div class="modal" id="family_HealthModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        Family Health
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
     <div class="modal" id="allergyModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        Allergy
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     <div class="modal" id="vaccineModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        Vaccine
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
<!--     model for tab examinations second tabs-->


<div class="modal" id="general_exam_Doct_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        General Examination
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
<div class="modal" id="systemic_exam_Doct_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Systemic Examination
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
<div class="modal" id="preliminary_diagnosis_Doct_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Preliminary Diagnosis
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body">
                    <form action="" class="form-grpup">
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </form>
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>
     
     
     
<div class="modal" id="lab_Investigation_Doct_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Laboratory Investigation
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 

                        if(isset($_POST['InputLabTest'])){

                            $diagnosisTest =  $_POST['diagnosisTest'];
                            $diaLabDia = "";
                            foreach($diagnosisTest as $diagnosisLabTest) {
                                    $diaLabDia .= $diagnosisLabTest;
                            }
                            
                            $doctor_id =  $_SESSION['doctorLogin'];  //doctor id
                            $patient_id = $_GET['patient_id'];
                            $date = date("Y-m-d H:i:s");
                            $sqllabInput = $conn->query("INSERT INTO laboratoryTest(lab_id,patient_id,doctor_id,dia_id,dateCreated) VALUES('','$patient_id','$doctor_id','$diaLabDia','$date')");

                            if($sqllabInput) {
                                echo "<script>alert('laboratory Test sent')</script>";
                            }
                        }

            ?>
            <form action="" method="POST" class="form-group">   
                <div class="modal-body">
        
                    
                       <div class="row">
                       <?php
                       
                            $sqlLabDiagnosis = $conn->query("SELECT * FROM diagnosis");
                            while($row = $sqlLabDiagnosis->fetch_array()) {
                                $diagnosisTest = $row['dia_id'];
                                echo "
                                <div class='col'>
                                <div class='form-check form-check-inline'>
                                     <input type='checkbox' name='diagnosisTest[]' class='form-check-input' id='' value=' " . $row['dia_id'] . " '>
                                     <label for='' class='form-check-label' form=''> " . $row['dia_name'] . "  </label>
                                 </div>
                                </div>
                                ";
                            }
                       
                       
                       ?>

                       <!-- <input type="checkbox" name="diagnosisTest[]" id="" value="1"> One
                       <input type="checkbox" name="diagnosisTest[]" id="" value="2"> Two -->
                  
                        
                       </div>
                        
                        
                        <div class="row">
                            
                        
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                   
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="submit" name="InputLabTest" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div> 
     </div>
     
     
     
     
<div class="modal" id="radiology_Investigation_Doct_Model" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Radiology Investigation
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 

                if(isset($_POST['submitRadiology'])){

                    // Input Declaration
                    $RadiologyTest =  $_POST['radiologyTest'];
                    $radiologyDia_id = "";
                    foreach($RadiologyTest as $diagnosisRadTest) {
                            $radiologyDia_id .= $diagnosisRadTest;
                    }
                    
                    $doctor_id =  $_SESSION['doctorLogin'];  //doctor id
                    $patient_id = $_GET['patient_id'];
                    $date = date("Y-m-d H:i:s");

                    // Insert to the database
                    $sqlRadInput = $conn->query("INSERT INTO radiologyTest(radTest_id,patient_id,doctor_id,radDia_id,dateCreated) VALUES('','$patient_id','$doctor_id','$radiologyDia_id','$date')");

                    if($sqlRadInput) {
                        echo "<script>alert('Radiology Test sent')</script>";
                    }

                    else {
                        echo "<script>alert('Radiology Not Test sent')</script>";
                    }
                }

                ?>

            <form action="" class="form-grpup" method="POST"> 
                <div class="modal-body">
                   <h4 style="margin-bottom: 16px;">Ultrasound Test</h4>
                  
                      <div class="row">
                     
                          <?php 
                          
                          $sqlDiaCat = $conn->query("SELECT * FROM raddiacategories WHERE radioloyDia_id = 1");
                          while($rowDiaCat = $sqlDiaCat->fetch_array()) {
                              echo "
                              <div class='col'>
                                 <div class='form-check form-check-inline'>
                                    <input type='checkbox' class='form-check-input' name='radiologyTest[]' id='obstetric' value=' " . $rowDiaCat['diaCat_id'] . " '>
                                    <label for='obstetric' class='form-check-label' form=''> " . $rowDiaCat['name'] . " </label>
                                 </div>
                            </div>
                          <br>
                              ";
                          }
                        
                        
                        ?>
                        
                        
                      </div>
                       
                        <div class="row">
                           
                        
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        <h4 style="margin-top: 16px;">X-Ray</h4>
                        
                        <p>Upper Extrimities</p>
                        
                        <div class="row">
                            
                                <?php 
                            
                            $sqlDiaCat = $conn->query("SELECT * FROM raddiacategories WHERE radioloyDia_id = 2");
                            while($rowDiaCat = $sqlDiaCat->fetch_array()) {
                                echo "
                                <div class='col'>
                                        <div class='form-check form-check-inline'>
                                                <input type='checkbox' class='form-check-input' name='radiologyTest[]' id='obstetric' value=' " . $rowDiaCat['name'] . " '>
                                                <label for='obstetric' class='form-check-label' form=''> " . $rowDiaCat['name'] . " </label>
                                                
                                        </div>
                                       
                                </div>
                                <br>
                                ";
                            }
                            
                            
                            ?>
                        </div>
                        
                        
                        
                        <div class="row">
                                
                        </div>
                        
                        
                        
                        <div class="row">
                      
                        </div>
                        
                        
                        
                        
                        
                        
                         
                        
                        
                        
                        <!-- <p style="margin-top: 16px;">Lower Extrimities</p> -->
                        
                   
                        
                        
                        
            
                        
                        
                        
                        <div class="row">
                    
                        </div>
                        
                        
                        
                        
                        
                        
                 
                </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="submit" name="submitRadiology" class="btn btn-primary">Save</button>
                </div>

                </form>
            </div>
        </div> 
     </div>
     
     

<script type="text/javascript">
         
         var btn = document.getElementById("diagnosis_Btn_Doct");
         
         var modal = document.getElementById("diagnosis_Doct_Model");
         
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
             
             if(event.target == modal4){
                 modal4.style.display = "none";
             }
             
             if(event.target == modal5){
                 modal5.style.display = "none";
             }
             
             if(event.target == modal6){
                 modal6.style.display = "none";
             }
             
             if(event.target == modal7){
                 modal7.style.display = "none";
             }
             
             if(event.target == modal8){
                 modal8.style.display = "none";
             }
             
             
             if(event.target == modal9){
                 modal9.style.display = "none";
             }
             
             
             if(event.target == modal10){
                 modal10.style.display = "none";
             }
             
             if(event.target == modal11){
                 modal11.style.display = "none";
             }
             
             if(event.target == modal12){
                 modal12.style.display = "none";
             }
             
             
         }
         
//        Prescription Model Start Here
         
         var btn2 = document.getElementById("prescription_Btn");
         
         var modal2 = document.getElementById("prescriptionModel");
         
         var span2 = document.getElementsByClassName("close")[0];
         
         btn2.onclick = function(){
             modal2.style.display = "block";
            
         }
         
         span2.onclick = function(){
             modal2.style.display = "none";
            
         }
         
         
         
//         History illnes Model events Ends here
         var btn3 = document.getElementById("history_illness_Btn_Doct");
         
         var modal3 = document.getElementById("history_illnesModel");
         
         var span3 = document.getElementsByClassName("close")[0];
         
         btn3.onclick = function(){
             modal3.style.display = "block";
            
         }
         
         span3.onclick = function(){
             modal3.style.display = "none";
            
         }
         
//         Chief Complaints Model events Ends here
         var btn4 = document.getElementById("cheaf_complaints_Btn_Doct");
         
         var modal4 = document.getElementById("chief_complaintsModel");
         
         var span4 = document.getElementsByClassName("close")[0];
         
         btn4.onclick = function(){
             modal4.style.display = "block";
            
         }
         
         span4.onclick = function(){
             modal4.style.display = "none";
            
         }
         
         
//         Family Health Model events Ends here
         var btn5 = document.getElementById("family_health_Btn_Doct");
         
         var modal5 = document.getElementById("family_HealthModel");
         
         var span5 = document.getElementsByClassName("close")[0];
         
         btn5.onclick = function(){
             modal5.style.display = "block";
            
         }
         
         span5.onclick = function(){
             modal5.style.display = "none";
            
         }
         
         
//         Allergy Model events Ends here
         var btn6 = document.getElementById("allergy_Btn_Doct");
         
         var modal6 = document.getElementById("allergyModel");
         
         var span6 = document.getElementsByClassName("close")[0];
         
         btn6.onclick = function(){
             modal6.style.display = "block";
            
         }
         
         span6.onclick = function(){
             modal6.style.display = "none";
            
         }
         
         
//        Vaccine Model events Ends here
         var btn7 = document.getElementById("vaccine_Btn_Doct");
         
         var modal7 = document.getElementById("vaccineModel");
         
         var span7 = document.getElementsByClassName("close")[0];
         
         btn7.onclick = function(){
             modal7.style.display = "block";
            
         }
         
         span7.onclick = function(){
             modal7.style.display = "none";
            
         }
         
         
 //        General Examination Model events Ends here
         var btn8 = document.getElementById("general_exam_Btn_Doct");
         
         var modal8 = document.getElementById("general_exam_Doct_Model");
         
         var span8 = document.getElementsByClassName("close")[0];
         
         btn8.onclick = function(){
             modal8.style.display = "block";
            
         }
         
         span8.onclick = function(){
             modal8.style.display = "none";
            
         }
         
         
//        Systemic Examination Model events Ends here
         var btn9 = document.getElementById("systemic_exam_Btn_Doct");
         
         var modal9 = document.getElementById("systemic_exam_Doct_Model");
         
         var span9 = document.getElementsByClassName("close")[0];
         
         btn9.onclick = function(){
             modal9.style.display = "block";
            
         }
         
         span9.onclick = function(){
             modal9.style.display = "none";
            
         }
         
         
//        Preliminary Diagnosis Model events Ends here
         var btn10 = document.getElementById("preliminary_diagnosis_Btn_Doct");
         
         var modal10 = document.getElementById("preliminary_diagnosis_Doct_Model");
         
         var span10 = document.getElementsByClassName("close")[0];
         
         btn10.onclick = function(){
             modal10.style.display = "block";
            
         }
         
         span10.onclick = function(){
             modal10.style.display = "none";
            
         }
         
         
         
//        Lab Investigation Model events Ends here
         var btn11 = document.getElementById("lab_investigation_Btn_Doct");
         
         var modal11 = document.getElementById("lab_Investigation_Doct_Model");
         
         var span11 = document.getElementsByClassName("close")[0];
         
         btn11.onclick = function(){
             modal11.style.display = "block";
            
         }
         
         span11.onclick = function(){
             modal11.style.display = "none";
            
         }
         
         
//       Radiology Investigation Model events Ends here
         var btn12 = document.getElementById("radiology_investigation_Btn_Doct");
         
         var modal12 = document.getElementById("radiology_Investigation_Doct_Model");
         
         var span12 = document.getElementsByClassName("close")[0];
         
         btn12.onclick = function(){
             modal12.style.display = "block";
            
         }
         
         span12.onclick = function(){
             modal12.style.display = "none";
            
         }
         
//         window.onclick = function(event){
//             
//             if(event.target == modal2){
//                 modal2.style.display = "none";
//             }
//         }
         
         
         
         
//         tabs function all here
         
         function openMedical(evt, medicalName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(medicalName).style.display = "block";
  evt.currentTarget.className += " active";
}
    </script>

</body>

</html>