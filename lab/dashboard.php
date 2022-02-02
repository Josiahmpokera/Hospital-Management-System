<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>


    <div class="paraoverview" >
       <img src="../assets/images/icons8-microscope.png" alt="">
        <p style="font-size: 1.3em;">Dashboard | Overview</p>
        
        
        
    </div>
    
    
    <div class="overview">
        
        
        <div class="row">
            <div class="col-md-3">
                <a href="view_today_patients.php">
                <div class="card_overview">
                   <img src="../assets/images/icons8-triangular_bandage.png" alt="" width="25%">
                   <h4>
                                    <?php 
                                            // $patient_id = $_GET['patient_id'];
                                            $sql = $conn->query("SELECT * FROM laboratorytest WHERE DATE(dateCreated) = CURDATE()");
                                            $patientToday = $sql->num_rows;
                                            echo $patientToday;

                                    ?>
                            </h4>
                    <p>Today | New</p>
                </div>
                </a>
            </div>
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-cast.png" alt="" width="25%">
                    <h4>30</h4>
                    <p>This Month</p>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../../images/icons8-health_checkup.png" alt="" width="25%">
                    <h4>7</h4>
                    <p>This Year</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-hospital_2.png" alt="" width="25%">
                    <h4>37</h4>
                    <p>Total</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card_overview">
                   <img src="../assets/images/icons8-counselor.png" alt="" width="25%">
                    <h4>30</h4>
                    <p>Today | Visits</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-therapy.png" alt="" width="25%">
                    <h4>30</h4>
                    <p>This Month</p>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-pulse.png" alt="" width="25%">
                    <h4>7</h4>
                    <p>This Year</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-health_book.png" alt="" width="25%">
                    
                    <p>Department Report</p>
                    <button type="button" class="btn btn-outline-success btn-block" id="lab_report_Btn">View</button>
                </div>
            </div>
        </div>
    </div>
    
    
    </div>
    
    

</div> 

<div class="modal" id="lab_reports_Modal" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicationModel">
                        Laboratory Records
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
            <div class="modal-body">
               
               <form action="" class="form-group">
                   <select name="" id="" class="custom-select mr-sm-2">
                    <option selected>Select Record</option>
                     <option value="1">Yesterday</option>
                     <option value="1">Today</option>
                     <option value="1">Weekly</option>
                     <option value="1">Monthly</option>
                     <option value="1">Half Yearly</option>
                     <option value="1">Yearly</option>
                 </select>
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
         
         var btn = document.getElementById("lab_report_Btn");
         
         var modal = document.getElementById("lab_reports_Modal");
         
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