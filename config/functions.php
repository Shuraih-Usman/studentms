<?php

function Redirect($path) {
    header("location: $path");
}



/**
 * Retrieve and sanitize input from request superglobals ($_POST, $_GET).
 * 
 * @param string|null $key The key to search for in the request data. If null, return all sanitized data.
 * @param mixed $default Optional. Default value to return if the key is not found.
 * @param array $sources Optional. An array of sources to search through. Defaults to ['POST', 'GET'].
 * @param int $filter Optional. The filter to apply (e.g., FILTER_SANITIZE_SPECIAL_CHARS).
 * 
 * @return mixed The sanitized value for the key or an array of all sanitized values if key is null.
 */

 function Input($key = null, $request = 'POST', $default = null, $filter = FILTER_SANITIZE_SPECIAL_CHARS) {
    // Define the mapping of sources to their respective superglobals

    $superglobals = [
        'POST' => $_POST,
        'GET' => $_GET
    ];

    if($request === 'POST') {

        if($key === null) {

            $data = [];

            foreach($superglobals['POST'] as $inputKey => $inputValue) {
                $data[$inputKey] = filter_var($inputValue, $filter);
            }
            return $data;
        } else {
            return filter_var($superglobals['POST'][$key], $filter);
        }
    } else if($request === 'GET') {
        if($key === null) {

            $data = [];

            foreach($superglobals['GET'] as $inputKey => $inputValue) {
                $data[$inputKey] = filter_var($inputValue, $filter);
            }
            return $data;
        } else {
            return filter_var($superglobals['GET'][$key], $filter);
        }
    }
    return $default;
}

function UploadImage($dir, $imageData) {

    $folder = PUBLIC_PATH.'/thumb/'.$dir;
    if(!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $imageName = $imageData['name'];
    $ext = pathinfo($imageName, PATHINFO_EXTENSION);
    $filename = rand(1000, 9999).time().'.'.$ext;
    $target =$folder.'/'.$filename;

    if(move_uploaded_file($imageData['tmp_name'], $target)) {
        $ne_name =  $dir.'/'.$filename;
        $_SESSION['image'] = $ne_name;
        return $ne_name;
    } else {
        return false;
    }
}