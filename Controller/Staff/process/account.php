<?php
use App\Staff\Auth;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = Input('action');

    if($action === 'edit') {
        
        $data = Input();
        unset($data['action']);

        $class = new Auth;
        $image = $_FILES['image'];
        $instance = $class->edit($data, $image);

        echo json_encode($instance);

    } else if($action === 'password') {
        $data = $_POST;

        unset($data['password']);

        $instance = (new Auth)->changePassword($data);
        echo json_encode($instance);
    }
}