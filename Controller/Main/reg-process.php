<?php
use App\Admin\Student;

// Ensure the correct JSON header is set
header('Content-Type: application/json');

// Always initialize a default response structure
$response = ['s' => 0, 'm' => 'An unknown error occurred'];

// Validate request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (Input('action') === 'apply') {
        // Check if passwords match
        if(empty($_POST['password']) || empty($_POST['cpassword'])) {
            $response['m'] = "Password and confirmation field are required";
            echo json_encode($response);
            exit;
        }else if ($_POST['password'] !== $_POST['cpassword']) {
            $response['m'] = "Password and confirmation password do not match";
            echo json_encode($response);
            exit;
        } else {
            $image = $_FILES['image'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Modify POST data to be saved
            $_POST['password'] = $password;
            unset($_POST['cpassword']);
            unset($_POST['action']);
            $_POST['status'] = 0;

            // Create Student instance and add record
            $instance = new Student();

            // Check if the `add` function returns a response array
            $addResponse = $instance->add(Input(), $image);

            // Validate the response from the add function
            if ($addResponse && is_array($addResponse)) {
                echo json_encode($addResponse);
            } else {
                $response['m'] = 'Failed to add student record';
                echo json_encode($response);
            }
            exit;
        }
    } else {
        $response['m'] = 'Invalid action';
    }
} else {
    $response['m'] = 'Invalid request method';
}

// Output the final response in case of missing conditions
echo json_encode($response);
exit;
?>
