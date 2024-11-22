<?php
use App\Admin\Score;
use App\Admin\Student;

$table = 'Students';
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = Input('action');

    if($action === 'add') {
        
        $image = $_FILES['image'];
       
        $data = [

            'first_name' => Input('first_name'),
            'last_name' => Input('last_name'),
            'dob' => Input('dob'),
            'class' => Input('class'),
            'country' => Input('country'),
            'lga' => Input('lga'),
            'state' => Input('state'),
            'phone' => Input('phone'),
            'email' => Input('email'),
            'address' => Input('address'),
            'gender' => Input('gender'),
            'religion' => Input('religion'),
            'tribe' => Input('tribe'),
            'blood' => Input('blood'),
            'genotype' => Input('genotype'),
            'disability' => Input('disability'),
            'password' => password_hash(1234, PASSWORD_DEFAULT),
            
        ];

        $instance= new Student();
        
        $response = $instance->add($data, $image);
        echo json_encode($response);
    } elseif($action === 'list') {
       

        $draw = $_POST['draw'];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];

        $orderCI = $_POST['order'][0]['column'];
        $orderCD = $_POST['order'][0]['dir'];

        $db->table($table);

        // filtering

        if(Input('filterData') === 'showActive') {
            $db->where('status', 1);
        } else if(Input('filterData') === 'showDeactive') {
            $db->where('status', 0);
        }

        //search

        if(!empty($searchValue)) {
            $db->search(['first_name', 'last_name', 'reg_number'], $searchValue);
        }

        // columns
        $columns = ['id', 'image', 'reg_number', 'first_name', 'status', 'created_at'];
        $orderColumn = $columns[$orderCI] ?? $columns[0];
        $orderDirection = isset($orderCD) ? $orderCD : 'desc';

        $db->orderBy($orderColumn, $orderDirection)->offset((int)$start)->limit((int)$length);
        $results = $db->get();

        $totalRecords = $db->table($table)->count();

        $totalFiltered = (!empty($searchValue)) ? count($results) : $totalRecords;

        $columnTitles = 0;
        $data = array();

        foreach($results as $key => $row) {


            $add_result_button = '<button type="button" data-class="'.$row['class'].'" data-id="'.$row['id'].'" class="btn btn-primary mx-1 add"> 
            <i class="fa fa-plus"></i> </button>';

            $view =  $add_result_button.'<button type="button" class="btn btn-success view mx-1"';
            foreach ($row as $field => $value) {

                if (in_array($field, ['password'])) {
                    continue;
                }
                $view .= ' data-' . $field . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
            }
        
            $view .= '><i class="fa fa-eye"></i></button>';

            $action = $view .'<button type="button" class="btn btn-primary edit mx-1"';
            foreach ($row as $field => $value) {

                if (in_array($field, ['password', 'reg_number'])) {
                    continue;
                }
                $action .= ' data-' . $field . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
            }
        
            $action .= '><i class="fa fa-pen"></i></button>';



            $action .= $row['status'] == 1 ? '<button type="button" class="btn btn-warning deactivate m-1" data-id="'.$row['id'].'"><i class="fa fa-trash"></i> </button>' : '<button type="button" class="btn btn-success activate m-1" data-id="'.$row['id'].'"><i class="fa fa-arrow-alt-circle-up"></i> </button>';
            $action .= '<button type="button" class="btn btn-danger delete m-1" data-id="'.$row['id'].'"><i class="fa fa-trash-alt"></i> </button>';

            

            $image = '<img src='.PUBLIC_URL.'/thumb/'.$row['image'].' width="60px" height="60px"/>';
            $status = $row['status'] == 1 ? '<span class="badge bg-success">Active </span>' : '<span class="badge bg-danger">Inactive </span>';
            $rowData = [
                $row['id'],
                $image,
                $row['reg_number'],
                $row['first_name'].' '.$row['last_name'],
                $row['class'],
                $status,
                $action,
                date('D m Y', strtotime($row['created_at'])),

            ];

            $rowData = array_combine(range(0, count($rowData) -1), array_values($rowData));
            $data[] = $rowData;
        }

        $response = [
            'draw' => (int)$draw,
            'recordsTotal' => (int)$totalRecords,
            'recordsFiltered' => (int)$totalFiltered,
            'columns' => $columnTitles,
            'data' => $data

        ];

        echo json_encode($response);
    } elseif($action === 'SettingStatus') {

        $status = Input('status');
        $s = 0;
        $ids = $_POST['id'];
        if($status == 'activate') {
            
            try {

                $db->table($table)->where('id', $ids)->update(['status' => 1]);
                $m = "Successfully Activated";
                $s = 1;
            }  catch(PDOException $e) {
                $m = "Error Occure :".$e->getMessage();
            }
        } else if($status == 'deactivate') {
            
            try {

                $db->table($table)->where('id', $ids)->update(['status' => 0]);
                $m = "Successfully Deactivated";
                $s = 1;
            }  catch(PDOException $e) {
                $m = "Error Occure :".$e->getMessage();
            }
        } else if($status == 'delete') {
            
            try {
                $item = $db->table($table)->where('id', $ids)->first();
                if($item && !empty($item['image'])) {
                    
                $file = PUBLIC_PATH.'/thumb/'.$item['image'];
                    if(file_exists($file)) {
                        unlink($file);
                    }
                }
                $db->table($table)->where('id', $ids)->delete();
                $m = "Successfully Deleted";
                $s = 1;
            }  catch(PDOException $e) {
                $m = "Error Occure :".$e->getMessage();
            }
        } else if($status === 'activateAll') {

            $total = 0;
            $error = [];
            foreach($ids as $id) {
                try {
                    $db->table($table)->where('id', $id)->update(['status' => 1]);
                    $total++;
                } catch(PDOException $e) {
                    $error[] = "Unable to activate item with ID $id ".$e->getMessage();
                }
            }

            if(count($error) > 0) {
                $m = $error[0];
            } else {
                $s = 1;
                $m = "$total Item successfully Activated";
            }
        }  else if($status === 'deactivateAll') {

            $total = 0;
            $error = [];
            foreach($ids as $id) {
                try {
                    $db->table($table)->where('id', $id)->update(['status' => 0]);
                    $total++;
                } catch(PDOException $e) {
                    $error[] = "Unable to deactivate item with ID $id ".$e->getMessage();
                }
            }

            if(count($error) > 0) {
                $m = $error[0];
            } else {
                $s = 1;
                $m = "$total Item successfully Deactivated";
            }

        }  else if($status === 'deleteAll') {

            $total = 0;
            $error = [];
            foreach($ids as $id) {
                try {
                    $item = $db->table($table)->where('id', $id)->first();
                    if($item && !empty($item['image'])) {
                        
                    $file = PUBLIC_PATH.'/thumb/'.$item['image'];
                        if(file_exists($file)) {
                            unlink($file);
                        }
                    }
                    $db->table($table)->where('id', $id)->delete();
                    $total++;
                } catch(PDOException $e) {
                    $error[] = "Unable to delete item with ID $id ".$e->getMessage();
                }
            }

            if(count($error) > 0) {
                $m = $error[0];
            } else {
                $s = 1;
                $m = "$total Item successfully Deleted";
            }
        }

        $response = json_encode(['s' => $s, 'm' => $m]);
        echo $response;
    } else if($action === 'edit') {

        $image = $_FILES['image'];
        $image['old_image'] = Input('old_image');
        $id = Input('id');
       
        unset($_POST['action']);
        unset($_POST['old_image']);
        unset($_POST['id']);


        $data = Input();

        $instance= new Student();
        
        $response = $instance->edit($data, $image, $id);
        echo json_encode($response); 
    } else if($action === 'add_result') {

        unset($_POST['action']);

        $instance = new Score();

        $response = $instance->add(Input());
        echo json_encode($response);
    }
}