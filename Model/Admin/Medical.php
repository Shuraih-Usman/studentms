<?php

namespace App\Admin;

use PDOException;
use App\General;
class Medical extends General {

    public $table = "medical_records";

    public function add($data) {

        global $db;

        $status =  0;

        if(empty($data['appointment_id'])) {
            $message = "All fields are required";
        } else  {

            $appointmentData = $this->getRow('appointments', 'id', $data['appointment_id']);

            if(!$appointmentData) {
                $message = "Appoinment not found";
            } else {

                $data['patient_id'] = $appointmentData['patient_id'];
                $data['doctor_id'] = $appointmentData['doctor_id'];
                $data['record_date'] = date('Y m d');
                unset($data['appointment_id']);

                try {
                    $db->table($this->table)->insert($data);
                    $status = 1;
                    $message = "record Successfully added";
                } catch(PDOException $e) {
                    $message = "Error : ".$e->getMessage();
                }
            }




        }

        return ['m' => $message, 's' => $status];

    }

    public function edit($data, $id) {

        global $db;

        $status =  0;

        if(empty($id)) {
            $message = "id are required";
        } else  {

           $row = $db->table($this->table)->where('id', $id)->first();

           if(!$row) {
            $message = "Record not found";
           } else {

            try {
                $db->table($this->table)->where('id', $id)->update($data);
                $status = 1;
                $message = "Record updated successfully";
            } catch(PDOException $e) {
                $message = "Error ". $e->getMessage();
            }
           }



        }

        return ['m' => $message, 's' => $status];

    }
}