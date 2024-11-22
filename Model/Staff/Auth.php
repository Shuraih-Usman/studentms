<?php

namespace App\Staff;
use PDOException;

class Auth {

    public $table = "Teachers";

    public function Login($username, $password, $db)
    {
        $s = 0;
        $user = $db->table($this->table)->where('username', $username)->first();

        if($user) {
            if(!password_verify($password, $user['password'])) {
                $m = "Invalid Password";
            } else {
                $_SESSION['StaffID'] = $user['id'];
                $_SESSION['StaffName'] = $user['username'];
                $m = "Successfully Login";
                $s =1;
            }
        } else {
            $m = "Invalid User";
        }

        return ['s' => $s, 'm' => $m];
    }

    public function isLogin() {

        if(isset($_SESSION['StaffID']) && isset($_SESSION['StaffName'])) {
            global $db;

            $user = $db->table($this->table)->where('id', $_SESSION['StaffID'])->first();

            if($user) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function edit($data, $image) 
    {
        global $db;
        $status = 0;
        $id = $_SESSION['StaffID'];
        $filename = $data['old_image'];
        unset($data['old_image']);
        if(empty($data['username']) || empty($data['full_name'])) {
            $message = "username and Name cannot be blank";
        } else if($db->table($this->table)->where('id', $id)->count() > 1) {

        } else {

            if($image['name']) {

                $filename = UploadImage($this->table, $image);

                if($filename === false) {
                    $error = "Image Upload fail";
                }
            }

            if(isset($error)) {
                $message = $error;
            } else {

                $data['image'] = $filename;

                try {

                    $db->table($this->table)->where('id', $id)->update($data);
                    $status = 1;
                    $message = "TEacher detail updated successfully ";
    
                } catch(PDOException $e) {
                    $message = 'Error: '.$e->getMessage();
                }

            }


        }

        return ['m' => $message, 's' => $status];
    }

    public function changePassword($data)
    {
        global $db;
        $status = 0;

        $id = $_SESSION['StaffID'];
        $admin = (new \App\General)->getRow($this->table, 'id', $id);

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
        unset($_SESSION['StaffID']);
        unset($_SESSION['StaffName']);
        session_destroy();
    }
}