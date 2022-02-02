<?php

class Account{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getReceptionLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT rec_id FROM reception WHERE rec_username = '$uname' AND rec_password = '$pass'");
        return $sql;
    } 


    public function getNurseLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT nur_id FROM nurse WHERE nur_username = '$uname' AND nur_password = '$pass'");
        return $sql;
    } 

    public function getDoctorLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT doc_id FROM doctors WHERE doc_username = '$uname' AND doc_password = '$pass'");
        return $sql;
    } 

    public function getRadiologistLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT rad_id FROM radiology WHERE rad_username = '$uname' AND rad_password = '$pass'");
        return $sql;
    } 

    public function getLaboratoristLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT lab_id FROM laboratorist WHERE lab_username = '$uname' AND lab_password = '$pass'");
        return $sql;
    } 

    public function getPhamacistLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT pha_id FROM phamacist WHERE pha_username = '$uname' AND pha_password = '$pass'");
        return $sql;
    } 


    public function getAdminLogin($uname,$pass) {
        $sql = mysqli_query($this->conn, "SELECT admin_id FROM admin WHERE username = '$uname' AND password = '$pass'");
        return $sql;
    } 

    public function getRememberMe(){
        if(!empty($_POST["remember"])) {
            //COKIES for Registration number
            setcookie ("user_login", $_POST['username'],time() + (10 * 365 * 24 * 60 * 60));

            //COOKIES for password
            setcookie("userpassword", $_POST["password"],time() + (10 * 365 * 24 * 60 * 60));

        }else {
            if(isset($_COOKIE["user_login"])) {
                setcookie("user_login", "");
                if(isset($_COOKIE["userpassword"])) {
                    setcookie ("userpassword","");
                }
            }

        }
    }
}



?>