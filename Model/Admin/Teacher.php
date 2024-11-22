<?php

namespace App\Admin;

use PDOException;

class Teacher {

    public $table = "Teachers";

    public function add($data, $image) {

        global $db;

        $status =  0;
        $filename = '';
        if(empty($data['full_name']) || empty($data['username'])) {
            $message = "Name and username are required";
        } else if($db->table($this->table)->where('username', $data['username'])->get()) {
            $message = "This username is already taken";
        } else  {

           
            if($image['name']) {

                $filename = UploadImage($this->table, $image);
                $filename = $_SESSION['image'];

                if($filename === false) {
                    $error = "Image Upload fail";
                }
            }

            if(isset($error)) {
                $message = $error;
            } else {
                
                $data['image'] = $filename;

                try {

                    $db->table($this->table)->insert($data);
                    $status = 1;
                    $message = "Successfully Added";

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

        if(empty($data['full_name']) || empty($data['username'])) {
            $message = "Name and Username are required";
        } else  {

            $user1 = $db->table($this->table)->where('username', $data['username'])->count();
            
            if($user1 > 1) {
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