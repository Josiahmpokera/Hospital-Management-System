<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>


    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">Unattendend Patients</p>
    </div>
    
    <div class="card" style="padding: 16px;">
      
    <table class="table mt-5">
               <thread>
                   <th>#</th>
                   <th>Registration No</th>
                   <th>First Name</th>
                   <th>Middle Name</th>
                   <th>Last Name</th>
                   <th>View/not View</th>
                   <th>Action</th>
                 
               </thread> 

               <?php 

                $date = date("Y-m-d");

                $doctorLogin = $_SESSION['doctorLogin']; 
                $sql = $conn->query("SELECT * FROM patients WHERE DATE(dateCreated) = CURDATE() AND doctor_id = '$doctorLogin'");

                $cnt = 1;
                if($sql->num_rows > 0 ) {
                   
                    while($row = $sql->fetch_array()) {
                        // $sqlnurse = $conn->query("SELECT * FROM virtual_sign WHERE");
                        $patient_id = $row['patientid'];
                    ?>


                        <tbody>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo  $row['regno'];  ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['middlename']; ?></td>
                                <td><?php echo $row['lastname'] ?></td>
                                <td>
                                    <?php
                                    
                                    $sqlvitual = $conn->query("SELECT * FROM virtualsign WHERE pat_id = '$patient_id'");
                                    if($sqlvitual->num_rows > 0) {
                                        echo  "approved";
                                    }
                                    else {
                                        echo  "Pending"; 
                                    } 
            
                                    ?>
                                    
                                
                                </td>
                                <td><a href='view_patient.php?patient_id=<?php  echo $row['patientid']; ?>' title='view'><img style='width: 20px;' src='../assets/images/eye.png' alt=''></a></td>

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
        <p style="font-size: 1.3em;">Ongoing Patients</p>
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


<?php include("includes/footer.php"); ?>

