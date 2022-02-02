<?php

    class Patients {
        private $conn;
        private $patient_id;
        private $firstname;
        private $middlename;
        private $lastname;
        private $phonenumber;
        private $regno;
        private $patientid;
        private $gender;
        private $age;       
        private $district;
        private $city;
        private $address;
        private $insuaranceType;
        private $insuaranceNumber;
        private $dateCreated;


        public function __construct($conn, $patient_id) {
            $this->conn = $conn;
            $this->patient_id = $patient_id;

            $sql = mysqli_query($this->conn, "SELECT * FROM patients WHERE patientid = '$this->patient_id'");
            $patient = mysqli_fetch_array($sql);
            $this->firstname =  $patient['firstname'];
            $this->middlename =  $patient['middlename'];
            $this->lastname =  $patient['lastname'];
            $this->phonenumber = $patient['phonenumber'];
            $this->regno = $patient['regno'];
            $this->patientid = $patient['patientid'];
            $this->gender = $patient['gender'];
            $this->age = $patient['DOB'];
            // $this->district = $patient['district'];
            $this->city = $patient['city'];
            $this->address = $patient['address'];
            $this->insuaranceType = $patient['insuarance_type'];
            $this->insuaranceNumber = $patient['insuarance_number'];
            $this->dateCreated = $patient['dateCreated'];
        }

        public function getPatientId() {
            return $this->patientid;
        }

        public function getRegNo() {
            return $this->regno;
        }


        public function getFirstname() {
            return $this->firstname;
        }

        public function getMiddlename() {
            return $this->middlename;
        }

        public function getLastname() {
            return $this->lastname;
        }

        public function getPhonenumber() {
            return $this->phonenumber;
        }

        public function getPatientGender() {
            return $this->gender;
        }

        public function getAge() {
            return $this->age;
        }

        public function getDistrict() {
            return $this->district;
        }

        public function getCity() {
            return $this->city;
        }

        public function getAddress() {
            return $this->address;
        }

        public function getInsuaranceType() {
            return $this->insuaranceType;
        }

        public function getInsuaranceNumber() {
            return $this->insuaranceNumber;
        }

        public function getRegistrationDate() {
            return $this->dateCreated;
        }

    }


?>