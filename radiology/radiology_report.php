<?php include("../includes/config/conn.php"); ?>
<?php 
// include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>


    <div class="paraoverview">
       <div class="row">
          <div class="col-md-3">
              <button class="btn btn-outline-success" style="float: left;">Back To Dashboard</button>
          </div>
           <div class="col-md-6">
               <p style="font-size: 1.3em;">Records</p>
           </div>
           
           <div class="col-md-3">
               <button class="btn btn-outline-success" style="float: right;">Print</button>
           </div>
       </div>
        
        
    </div>
    
    <div class="card" style="padding: 16px;">
      
      <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                   <th scope="col">#</th>
                   <th scope="col">Investigation Ordered</th>
                   <th scope="col">Total Patients</th>
                   <th scope="col">Price</th>
                   <th scope="col">Total Price</th>
                   <th scope="col">Action</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                      <th scope="row">1</th>
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                   </tr>
                   
                   
                   <tr>
                      <th th colspan="3">Total</th>
                      <td>0.00</td> 
                      <td>0.00</td> 
                      <td></td> 
                      
                   </tr>
               </tbody>
           </table>
       
    </div>
    
    
    
    </div>
    

</div> 



</body>

</html>