<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>
    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">Patient's Information</p>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="padding: 16px;">
                <img src="../../images/icons8-triangular_bandage.png" alt="" class="imgprofile">
                
                <p style="font-size: 1.3em; color: black"><b>Firstname Middlename Lastname</b> </p>
                
                <div class="row">
                   <div class="col-md-6">
                       <p>Patient ID</p>
                       <p>Gender</p>
                       <p>Birth Date</p>
                       <p>Age</p>
                       <p>Address</p>
                       <p>Phone</p>
                   </div>
                   
                   <div class="col-md-6">
                       <p>Patient ID</p>
                       <p>Gender</p>
                       <p>Birth Date</p>
                       <p>Age</p>
                       <p>Address</p>
                       <p>Phone</p>
                   </div>
               </div>
               
               <a href="#" class="btn btn-outline-dark btn-block" style="float: right;">View Medical History</a>
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
                    <p>Temperature</p>
                    <p>Weight</p>
                    <p>O2 Saturation</p>
                    <p>Pulse</p>
                    <p>Blood Pressure</p>
                    <p>Respiration</p>
                </div>
            </div>
            
            <button type="button" class="btn btn-outline-dark btn-block" id="phyExam_Btn_nurse" style="float: right;">Add Physical Examination</button>
        </div>
    </div>
            
             <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            Medicine
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                   <h6>Medicine</h6>
                    <p>Panadol</p>
                    <p>Paracetamol</p>
                    <p>Amoxilin</p>
                    
                </div>
                
                <div class="col-md-3">
                   <h6>Quantity</h6>
                    <p>10</p>
                    <p>20</p>
                    <p>10</p>
                    
                </div>
                <div class="col-md-3">
                   <h6>Dozage</h6>
                    <p>2*1</p>
                    <p>1*1</p>
                    <p>1*3</p>
                    
                </div>
            </div>
            
            <button type="button" class="btn btn-outline-dark btn-block" id="phyExam_Btn_nurse" style="float: right;">Add Physical Examination</button>
        </div>
    </div>
       
       
       
       
        </div>
    </div>
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
        <div class="card-header">
            Medicine
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                   <h6>Medicine</h6>
                    <p>Panadol</p>
                    <p>Paracetamol</p>
                    <p>Amoxilin</p>
                    
                </div>
                
                <div class="col-md-3">
                   <h6>Quantity</h6>
                    <p>10</p>
                    <p>20</p>
                    <p>10</p>
                    
                </div>
                <div class="col-md-3">
                   <h6>Dozage</h6>
                    <p>2*1</p>
                    <p>1*1</p>
                    <p>1*3</p>
                    
                </div>
            </div>
            
            <button type="button" class="btn btn-outline-dark btn-block" id="phyExam_Btn_nurse" style="float: right;">Add Physical Examination</button>
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
                             
                <div class="modal-body">
                    <form action="" class="form-group">
                        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Templature">
            </div>
            
            
            <div class="col">
                <input type="text" class="form-control" placeholder="Weight">
            </div>
            
            <div class="col">
                <input type="text" class="form-control" placeholder="O2 Saturation">
            </div>
        </div>
        
        <div class="row" style="margin-top: 16px;">
            <div class="col">
                <input type="text" class="form-control" placeholder="Blood Pressure">
            </div>
            
            
            <div class="col">
                <input type="text" class="form-control" placeholder="Respiration">
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
     
     

</body>

</html>