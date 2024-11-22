<?php

namespace App\Admin;

use PDOException;

class Patient {

    public $table = "patients";

    public function add($data, $image) {

        global $db;

        $status =  0;

        if(empty($data['first_name']) || empty($data['last_name'])) {
            $message = "Firstname and Last name fields are required";
        } else  {

            $filename = '';
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
                $db->startTransaction();
                try {
                    $id = $db->table($this->table)->insert($data);

                    try {
                        $pid = "HMS-".date('m-y-').str_pad($id, 5, "0", STR_PAD_LEFT);
                        $db->table($this->table)->where('id', $id)->update(['pid' => $pid]);
                        $status = 1;
                        $message = "Successfully Added ";
                        $db->commit();

                    }  catch(PDOException $e) {
                        $message = "PID $pid  not generation: ".$e->getMessage();
                        $db->rollback();
                    }
                } catch(PDOException $e) {
                    $message = "Error Occur: ".$e->getMessage();
                    $db->rollback();
                }
            }

        }

        return ['m' => $message, 's' => $status];

    }

    public function edit($data, $image, $id) {

        global $db;

        $status =  0;

        if(empty($data['first_name']) || empty($data['last_name']) || empty($data['date_of_birth'])) {
            $message = "All fields  are required";
        } else  {

          
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

        return ['m' => $message, 's' => $status];

    }
}