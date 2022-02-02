<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>

<?php include("../includes/classes/Patient.php"); ?>

    <div class="paraoverview">
        <p style="font-size: 1.3em;">Unattendend Patients</p>
    </div>
    
    <div class="card" style="padding: 16px;">
      
      <table class="table">
               <thread>
                   <th>#</th>
                   <th>RedNo</th>
                   <th>Firstname</th>
                   <th>Middlename</th>
                   <th>lastname</th>
                   <th>Action</th>
               </thread>

               <?php 

$date = date("Y-m-d");

$sql = $conn->query("SELECT * FROM radiologytest WHERE DATE(dateCreated) = CURDATE()");

$cnt = 1;
if($sql->num_rows > 0 ) {
   
    while($row = $sql->fetch_array()) {
        // $sqlnurse = $conn->query("SELECT * FROM virtual_sign WHERE");
        $patient_id = $row['patient_id'];
        $Patient = new Patients($conn,$patient_id);

    ?>


        <tbody>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $Patient->getRegNo();  ?></td>
                <td><?php echo $Patient->getFirstname(); ?></td>
                <td><?php echo $Patient->getMiddlename(); ?></td>
                <td><?php echo $Patient->getLastname(); ?></td>
                
            
                <td><a href='view_patient.php?patient_id=<?php  echo $Patient->getPatientId() ?>' title='view'><img style='width: 20px;' src='../assets/images/eye.png' alt=''></a></td>

            </tbody>

            <?php
            $cnt = $cnt + 1;
    }

   

   
}else {
    echo "<p class='text-center text-success display-3'>No Patients Today</p>";
}


?>
           </table>
       
    </div>
    
    
    
    
    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">Attendend Patients</p>
    </div>
    
    <div class="card" style="padding: 16px;">
      
      <table class="table">
               <thread>
                   <th>#</th>
                   <th>First Name</th>
                   <th>Middle Name</th>
                   <th>Last Name</th>
                   <th>Gender</th>
                   <th>Registered Date</th>
                   <th>Action</th>
               </thread>
           </table>
       
    </div>
    
    </div>
    

</div> 



</body>

</html>