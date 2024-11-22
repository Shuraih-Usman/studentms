<?php

namespace App\Admin;

use PDOException;

class Appointment {

    public $table = "appointments";

    public function add($data) {

        global $db;

        $status =  0;

        if(empty($data['patient_id']) || empty($data['doctor_id'])) {
            $message = "All fields are required";
        } else  {

            try {
                $db->table($this->table)->insert($data);
                $status = 1;
                $message = "Patient Successfully Appointed";
            } catch(PDOException $e) {
                $message = "Error : ".$e->getMessage();
            }

        }

        return ['m' => $message, 's' => $status];

    }

    public function edit($data, $image, $id) {

        global $db;

        $status =  0;

        if(empty($data['username'])) {
            $message = "Username are required";
        } else  {

            $user = $db->table($this->table)->where('username', $data['username'])->count();
            
            if($user > 1) {
                $message = "Username Already taken pls change another one";
            } else {

                $filename = $image['old_image'];
                if($image['name']) {
    
                    $filename = UploadImage($this->table, $image);
    
                    if($filename === false) {
                        $error = "Image Upload fail";
                    }
                }
    
                if(isset($error)) {
                    $message = $error;
                } else {
                    
                    $data['	image'] = $filename;
    
                    try {
                        $db->table($this->table)->where('id', $id)->update($data);
                        $status = 1;
                        $message = "Successfully Updated";
                    } catch(PDOException $e) {
                        $message = "Error Occur: ".$e->getMessage();
                    }
                }
            }



        }

        return ['m' => $message, 's' => $status];

    }
}