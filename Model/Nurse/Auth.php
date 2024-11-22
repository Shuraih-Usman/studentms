<?php

namespace App\Nurse;
use PDOException;

class Auth {

    public $table = "nurses";

    public function Login($username, $password, $db)
    {
        $s = 0;
        $user = $db->table('nurses')->where('username', $username)->first();

        if($user) {
            if(!password_verify($password, $user['password'])) {
                $m = "Invalid Password";
            } else {
                $_SESSION['NurseID'] = $user['id'];
                $_SESSION['NurseName'] = $user['username'];
                $m = "Successfully Login";
                $s =1;
            }
        } else {
            $m = "Invalid User";
        }

        return ['s' => $s, 'm' => $m];
    }

    public function isLogin() {

        if(isset($_SESSION['NurseID']) && isset($_SESSION['NurseName'])) {
            global $db;

            $user = $db->table('admins')->where('id', $_SESSION['NurseID'])->first();

            if($user) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function edit($data, $image, $id) {

        global $db;

        $status =  0;


        $user = $db->table($this->table)->where('id', $_SESSION['NurseID'])->count();
            
            if(!$user) {
                $message = "Nurse acccount cannot be found";
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



        

        return ['m' => $message, 's' => $status];

    }

    public function changePassword($data)
    {
        global $db;
        $status = 0;

        $id = $_SESSION['NurseID'];
        $admin = (new \App\General)->getRow('nurses', 'id', $id);

        if(empty($data['oldpassword']) || empty($data['newpassword']) || empty($data['confirmpassword'])) {
            $message = " All fields are required";
        } else {
            if(!password_verify($data['oldpassword'], $admin['password'])) {
                $message = "Invalid old password";
            } else if($data['newpassword'] !== $data['confirmpassword']) {
                $message = "new and confirm password does not match";
            } else {

                try {
                    $passwordN = password_hash($data['newpassword'], PASSWORD_DEFAULT);
                    $db->table($this->table)->where('id', $id)->update(['password' => $passwordN]);
                    $message = "Password change successfully";
                    $status = 1;
                } catch(PDOException $e) {
                    $message = "Error: ".$e->getMessage();
                }
            }
        }

        return [
            'm' => $message,
            's' => $status,
        ];
    }

    public function logout()
    {
        unset($_SESSION['NurseID']);
        unset($_SESSION['NurseName']);
        session_destroy();
    }
}