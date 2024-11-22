<?php

namespace App\Admin;

use PDOException;

class Nurse {

    public $table = "nurses";

    public function add($data, $image) {

        global $db;

        $status =  0;

        if(empty($data['username']) || empty($data['password'])) {
            $message = "Username and Password fields are required";
        } elseif($db->table($this->table)->where('username', $data['username'])->first()) {
            $message = "Username Already taken pls change another one";
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

                try {
                    $db->table($this->table)->insert($data);
                    $status = 1;
                    $message = "Successfully Added ";
                } catch(PDOException $e) {
                    $message = "Error Occur: ".$e->getMessage();
                }
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