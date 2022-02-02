<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>

<?php include("../includes/classes/Patient.php"); ?>
<?php include("../includes/classes/Virtual.php"); ?>

    
<?php 

$patient_id = $_GET['patient_id'];
$patient = new Patients($conn,$patient_id);
$visualSign = new Virtual($conn, $patient_id);



?>
    <div class="paraoverview">
        <p style="font-size: 1.3em;">Medical Test</p>
    </div>
    
    
     <div class="row">
        <div class="col-md-4">
            <div class="card" style="padding: 16px;">
                <img src="../assets/images/icons8-triangular_bandage.png" alt="" class="imgprofile">
                
                <p style="font-size: 1.3em; color: black"><b><?php echo $patient->getFirstname() . " " . $patient->getMiddlename()  . " " . $patient->getLastname()?></b> </p>
                
                <div class="row">
                   <div class="col-md-6">
                       <p style="font-size: 12px;">Patient ID</p>
                       <p style="font-size: 12px;">Gender</p>
                       <p style="font-size: 12px;">Birth Date</p>
                       <p style="font-size: 12px;">Age</p>
                       <p style="font-size: 12px;">Address</p>
                       <p style="font-size: 12px;">Phone</p>
                   </div>
                   
                   <div class="col-md-6">
                       <p style="font-size: 12px;"><?php echo $patient->getRegNo(); ?></p>
                       <p style="font-size: 12px;"><?php echo $patient->getPatientGender(); ?></p>
                       <p style="font-size: 12px;"><?php echo $patient->getAge(); ?></p>
                       <p style="font-size: 12px;">
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
                       <p style="font-size: 12px;"><?php echo $patient->getAddress(); ?></p>
                       <p style="font-size: 12px;"><?php echo $patient->getPhonenumber(); ?></p>
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
                <div class="col-md-6">
                    <p>Temperature</p>
                    <p>Weight</p>
                    <p>O2 Saturation</p>
                    <p>Pulse</p>
                    <p>Blood Pressure</p>
                    <p>Respiration</p>
                </div>
                
                <div class="col-md-6">
                    <p><?php echo $visualSign->getTemplature(); ?></p>
                    <p><?php echo $visualSign->getWeight(); ?></p>
                    <p><?php echo $visualSign->getSaturation(); ?></p>
                    <p><?php echo $visualSign->getPulse(); ?></p>
                    <p><?php echo $visualSign->getBlood(); ?></p>
                    <p><?php echo $visualSign->getRespiration(); ?></p>
                </div>
            </div>
            
            
        </div>
    </div>
       
       <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            Required Diagnosis
        </div>
        <div class="card-body">
           
           <?php
           
           $sql = $conn->query("SELECT * FROM laboratorytest WHERE patient_id = '$patient_id'  AND DATE(dateCreated) = CURDATE()");
                ;
               
                
     
                while($fetchLaboratory = $sql->fetch_array()) {
                    $diagnosis_id = $fetchLaboratory['dia_id'];
                    $sqlDiagnosis = $conn->query("SELECT * FROM diagnosis WHERE dia_id = '$diagnosis_id'");
                     $fetchDiagnosis = $sqlDiagnosis->fetch_array();
                    $diagnosisLaboratory =  $fetchDiagnosis['dia_name'];
                    echo "<p>". $diagnosisLaboratory ."</p>";
                }
                
               
              


            ?>
        
           
            
            
            <button type="button" class="btn btn-outline-dark btn-block" id="add_result_lab" style="float: right;">Add Results</button>
        </div>
    </div>
        </div>
    </div>
    
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
       
       <!-- Tab links -->
    <div class="tab">

      <button class="tablinks" onclick="openMedicalResustTabRadio(event, 'Comparison')">Comparison</button>
      <button class="tablinks" onclick="openMedicalResustTabRadio(event, 'Findings')">Findings</button>
      <button class="tablinks" onclick="openMedicalResustTabRadio(event, 'Impression')">Impression</button>
      <button class="tablinks" onclick="openMedicalResustTabRadio(event, 'Recommendation')">Recommendation</button>
      
</div>

        <!-- Tab content -->
    <div id="Comparison" class="tabcontent">
  <h3>Comparison</h3>
  <p>London is the capital city of England.</p>
</div>
   
   <div id="Findings" class="tabcontent">
  <h3>Findings</h3>
  <p>London is the capital city of England.</p>
</div>
    
    <div id="Impression" class="tabcontent">
  <h3>Impression</h3>
  <p>London is the capital city of England.</p>
</div>

    <div id="Recommendation" class="tabcontent">
  <h3>Recommendation</h3>
  <p>Paris is the capital of France.</p>
</div>

    
</div>
    
    
    
    </div>
    

</div> 


<div class="modal" id="lab_results_Modal" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Radiology Results
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
            <div class="modal-body" style="height: 70vh; overflow-y: auto;">
                <form action="" class="form-group">
                      
                    <p>Comparison</p>
                       
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        
                    <p>Findings</p>
                       
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        
                    <p>Impression</p>
                       
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        
                    <p>Recommendation </p>
                       
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                </form>
            </div>
                             
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dimiss="modal">Close</button>
                                 
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div> 
     </div>

<script type="text/javascript">
         
         var btn = document.getElementById("add_result_lab");
         
         var modal = document.getElementById("lab_results_Modal");
         
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

         
         
         
         function openMedicalResustTabRadio(evt, medicalNameRadioResult) {
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
  document.getElementById(medicalNameRadioResult).style.display = "block";
  evt.currentTarget.className += " active";
}
    </script>

</body>

</html>