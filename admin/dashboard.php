<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>

    
    
    
    
    <div class="paraoverview">
       <button type="button" class="btn btn-outline-dark btnpblock" id="addUser_Btn" style="float: right;">Add User</button>
        <p style="font-size: 1.3em;">Department</p>
        
    </div>
    
    
    <div class="overview">
        <div class="row">
            <div class="col-md-3">
                <div class="card_overview">
                   <img src="../assets/images/icons8-triangular_bandage.png" alt="" width="25%">
                    <p>Outpatients</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-microbeam_radiation_therapy.png" alt="" width="25%">
                    <p>Radiology</p>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-biomass.png" alt="" width="25%">
                    <p>Laboratory</p>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-pill.png" alt="" width="25%">
                    <p>Pharmacy</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card_overview">
                   <img src="../assets/images/icons8-doctor.png" alt="" width="25%">
                    <p>Doctors</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-doctor_female.png" alt="" width="25%">
                    <p>Nurse</p>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-biomass.png" alt="" width="25%">
                    <p>Laboratory</p>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="card_overview">
                    <img src="../assets/images/icons8-pill.png" alt="" width="25%">
                    <p>Pharmacy</p>
                </div>
            </div>
        </div>
    </div>
    
    
    <p style="font-size: 1.3em; margin-top: 16px;">Employee Online</p>
    
    <div class="card" style="padding: 16px; margin-top: 16px;">
      
      <table class="table">
               <thread>
                   <th>#</th>
                   <th>First Name</th>
                   <th>Middle Name</th>
                   <th>Last Name</th>
                   <th>Specialities</th>
                   <th>Status</th>
                   <th>Action</th>
               </thread>
           </table>
       
    </div>
    
    
    
    </div>
    
    

</div> 


<div class="modal" id="addUserModel" role="dialog">
                     
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prescriptionModel">
                        Add User
                    </h5>
                                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                             
                <div class="modal-body" style="height: 70vh; overflow-y: auto;">
                    
                    <form action="" class="form-group">
        <p>Personal Details</p>
         <input type="text" class="form-control" placeholder="User name" style="margin-bottom: 16px;">
          <div class="row">
              <div class="col">
                  <input type="text" class="form-control" placeholder="First name">
              </div>
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Middle name">
              </div>
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Last name">
              </div>
          </div>
           
    
           <div class="row" style="margin-top: 10px;">
              <div class="col auto my-1">
                 
                 <select name="" id="" class="custom-select mr-sm-2">
                    <option selected>Gender</option>
                     <option value="1">Male</option>
                     <option value="1">Female</option>
                 </select>
                 </div>
                 
                 <div class="col auto my-1">
                 
                 <select name="" id="" class="custom-select mr-sm-2">
                    <option selected>District</option>
                     <option value="1">Ilala</option>
                     <option value="2">Temeke</option>
                     <option value="3">Kinondoni</option>
                     <option value="4">Kigamboni</option>
                     <option value="5">Ubungo</option>
                 </select>
                 </div>
                  
               <div class="col auto my-1">
                  <div class="form-control">
                      <div class="input-group date" id="datetimepicker1">
                       <input type="text" class="form-control">
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
        
           <div class="row">
               <div class="col">
                   <input type="text" class="form-control" placeholder="Phone Number">
               </div>
               
               <div class="col">
                   <input type="text" class="form-control" placeholder="Address">
               </div>
               
               <div class="col">
                   <input type="text" class="form-control" placeholder="City">
               </div>
           </div>
           
           <p style="margin-top: 20px;">Academic Details</p>
           
            <div class="row">
              <div class="col auto my-1">
                 
                 <select name="" id="" class="custom-select mr-sm-2">
                    <option selected>Prefix</option>
                     <option value="1">Dr.</option>
                     <option value="1">Female</option>
                 </select>
                 </div>
                 
                 <div class="col auto my-1">
                 
                 <select name="" id="" class="custom-select mr-sm-2">
                    <option selected>Specialities</option>
                     <option value="1">Receptionist</option>
                     <option value="2">Nurse</option>
                     <option value="3">Doctor</option>
                     <option value="4">Radiologist</option>
                     <option value="5">Lab Technician</option>
                     <option value="5">Pharmarcist</option>
                 </select>
                 </div>
                  
               
           </div>
           
           <p style="margin-top: 20px;">Academic Details</p>
           
           <input type="text" class="form-control" placeholder="Course Name" style="margin-bottom: 16px;">
           <div class="row">
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="College Name">
              </div>
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Year">
              </div>
              
               
           </div>
           
           <p style="margin-top: 16px; margin-bottom: 10px;">Upload CV here...</p>
           
           <input type="file" class="form-control" placeholder="CV">
           
           <p style="margin-top: 16px; margin-bottom: 10px;">Enter Password</p>
           
           
           <div class="row">
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Password">
              </div>
              
              <div class="col">
                  <input type="text" class="form-control" placeholder="Confirm Password">
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
     

<script type="text/javascript">
         
         var btn = document.getElementById("addUser_Btn");
         
         var modal = document.getElementById("addUserModel");
         
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
         
         var btn2 = document.getElementById("prescription_Btn");
         
         var modal2 = document.getElementById("prescriptionModel");
         
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