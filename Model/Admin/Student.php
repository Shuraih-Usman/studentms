<?php

namespace App\Admin;

use PDOException;

class Student {

    public $table = "Students";

    public function add($data, $image) {

        global $db;

        $status =  0;
        
        if(empty($data['first_name']) || empty($data['last_name'])) {
            $message = "First and last name  fields are required";
        }  else if($db->table($this->table)->where('email', $data['email'])->get()) {
            $message = "Email already taken pls change another one";
        } else if($db->table($this->table)->where('phone', $data['phone'])->get()) {
            $message = "Phone Number already taken pls change another one";
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
                        $pid = "DSSI-".date('y-').str_pad($id, 2, "0", STR_PAD_LEFT);
                        $db->table($this->table)->where('id', $id)->update(['reg_number' => $pid]);
                        $status = 1;
                        $message = "Student Successfully Apply with Reg No.  $pid ";
                        $db->commit();

                    }  catch(PDOException $e) {
                        $message = "Reg No. $pid  not generation: ".$e->getMessage();
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

        if(empty($data['first_name']) || empty($data['last_name'])) {
            $message = "First name and Last name are required";
        } else  {

            $user1 = $db->table($this->table)->where('email', $data['email'])->count();
            $user2 = $db->table($this->table)->where('phone', $data['phone'])->count();
            
            if($user1 > 1) {
                $message = "Email Already taken pls change another one";
            } else if($user1 > 1) {
                $message = "Phone number Already taken pls change another one";
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