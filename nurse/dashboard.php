<?php include("../includes/config/conn.php"); ?>
<?php 
include("session.php"); 
?>
<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/navigation.php"); ?>

 
    
    <div class="paraoverview">
       <img src="../assets/images/icons8-doctor_female.png" alt="">
        <p style="font-size: 1.3em;">Dashboard | Overview</p>
        
    </div>
    
    
    <div class="overview">
        
        
        <div class="row">
            <div class="col-md-3">
               <a href="manage_today_patients.php">
                <div class="card_overview">
                    <img src="../assets/images/icons8-triangular_bandage.png" alt="" width="25%">
                            <h4>
                                    <?php 
                                            // $patient_id = $_GET['patient_id'];
                                            $sql = $conn->query("SELECT * FROM patients WHERE DATE(dateCreated) = CURDATE()");
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
                    <img src="../assets/images/icons8-health_checkup.png" alt="" width="25%">
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
                    <img src="../assets/images/icons8-hospital.png" alt="" width="25%">
                    <h4>37</h4>
                    <p>Total</p>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/footer.php"); ?>
    
