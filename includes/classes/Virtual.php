<?php

class Virtual {
    private $conn;
    private $patient_id;
    private $temparature;
    private $weight;
    private $saturation;
    private $pulse;
    private $blood;
    private $respiration;

    public function __construct($conn, $patient_id) {
        $this->conn = $conn;
        $this->patient_id = $patient_id;

        $sql = mysqli_query($this->conn, "SELECT * FROM virtualsign WHERE pat_id = '$patient_id'");
        $virtual = mysqli_fetch_array($sql);
        $this->temparature = $virtual['pat_templature'];
        $this->weight = $virtual['pat_weight'];
        $this->saturation = $virtual['pat_saturation'];
        $this->pulse = $virtual['pat_pulse'];
        $this->blood = $virtual['pat_blood_pressure'];
        $this->respiration = $virtual['pat_respiration'];


    }

    public function getTemplature() {
        return $this->temparature;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getSaturation() {
        return $this->saturation;
    }


    public function getPulse() {
        return $this->pulse;
    }

    public function getBlood() {
        return $this->blood;
    }

    public function getRespiration() {
        return $this->respiration;
    }

 

}



?>