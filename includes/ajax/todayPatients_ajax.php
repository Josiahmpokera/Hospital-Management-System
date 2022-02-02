<?php 

include "../../includes/config/conn.php";

//fetch data from patients tables

$output = "";
if(isset($_POST['query'])) {
    $search = mysqli_real_escape_string($conn, $_POST['query']);
    $sql = $conn->query("SELECT * FROM patients WHERE firstname LIKE '%$search%' || middlename LIKE '%$search%' || lastname LIKE '%$search%' || regno LIKE '%$search%'");

}else {
    $sql = $conn->query("SELECT * FROM patients WHERE DATE(dateCreated) = CURDATE()");
}

$cnt = 1;
if($sql->num_rows > 0 ) {
    $output .="
            <table class='table mt-5'>
            <thread>
                <th>#</th>
                <th>Registration No</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Action</th>
            
            </thread> 
    ";

 
    while ($row = mysqli_fetch_assoc($sql)) {
        $output .="<tbody>
        <td>". $cnt ."</td>
        <td>". $row['regno'] ."</td>
        <td>". $row['firstname'] ."</td>
        <td>". $row['middlename'] ."</td>
        <td>". $row['lastname'] ."</td>
        <td><a href='view_patient?patient_id = " . $row['patientid'] . "'' title='view'><img style='width: 20px;' src='../assets/images/eye.png' alt=''></a></td>
    </tbody>";

    $cnt = $cnt + 1;
    }

    
    $output .="</table>";
    echo $output;
}else {
    echo "<h5 class='text-center text-success display-4'>No record found</h5>";
}




?>